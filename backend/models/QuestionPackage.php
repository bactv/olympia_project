<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class QuestionPackage extends \common\models\QuestionPackageBase
{
    public $obstacle_race_answer;

    public function rules()
    {
        $rules = parent::rules();
        $new_rule = [
            [['obstacle_race_answer'], 'required'],
        ];
        return array_merge($rules, $new_rule);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['updated_time']
                ]
            ]
        ];
    }

    public static function chooseQuestion($params)
    {
        $type_game = (!empty($params['type_game'])) ? Yii::$app->params['type_game'][$params['type_game']] : "";
        $package_finish = (!empty($params['package_finish'])) ? Yii::$app->params['package_finish'][$params['package_finish']] : "";
        $type = ($package_finish == "") ? $type_game : $package_finish;

        $p_easy = (int)round ($params['number_question'] * Yii::$app->params['question_probability'][$type]['easy']);
        $p_medium = (int)round ($params['number_question'] * Yii::$app->params['question_probability'][$type]['medium']);
        $p_hard = (int)round ($params['number_question'] * Yii::$app->params['question_probability'][$type]['hard']);

//        $p_easy = (int)round ($params['number_question'] * Yii::$app->params['question_level']['easy']);
//        $p_medium = (int)round ($params['number_question'] * Yii::$app->params['question_level']['medium']);
//        $p_hard = (int)round ($params['number_question'] * Yii::$app->params['question_level']['hard']);

        // Get all question_topic ids
        $question_topics = QuestionTopic::getAllQuestionTopic();
        $question_topics_ids = [];
        foreach ($question_topics as $topic) {
            $question_topics_ids[] = $topic->id;
        }

        // Get question hard
        $question_hard = Question::find()->where(['status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED,])
            ->andWhere(['number_appear' => 0])
            ->andWhere(['question_level' => 3])
            ->andWhere(['question_topic' => $question_topics_ids])
            ->groupBy('question_topic')
            ->limit($p_hard)
            ->all();
        $temp_count = (count($question_hard) < $p_hard) ? ($p_hard - count($question_hard)) : 0;
        $temp_arr_topic = [];
        $temp_arr_ids = [];
        foreach ($question_hard as $qus) {
            $temp_arr_topic[] = $qus->question_topic;
            $temp_arr_ids[] = $qus->id;
        }
        $p_medium += $temp_count;

        // Get question medium
        $question_medium = Question::find()->where(['status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED])
            ->andWhere(['number_appear' => 0])
            ->andWhere(['question_level' => 2])
            ->andWhere(['question_topic' => array_diff($question_topics_ids, $temp_arr_topic)])
            ->andWhere(['not in', 'id', $temp_arr_ids])
            ->groupBy('question_topic')
            ->limit($p_medium)
            ->all();


        $temp_count = (count($question_medium) < $p_medium) ? ($p_medium - count($question_medium)) : 0;
        $p_easy += $temp_count;
        foreach ($question_medium as $qus) {
            $temp_arr_topic[] = $qus->question_topic;
            $temp_arr_ids[] = $qus->id;
        }

        // Get question easy
        $question_easy = Question::find()->where(['status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED])
            ->andWhere(['number_appear' => 0])
            ->andWhere(['question_level' => 1])
            ->andWhere(['question_topic' => array_diff($question_topics_ids, $temp_arr_topic)])
            ->andWhere(['not in', 'id', $temp_arr_ids])
            ->groupBy('question_topic')
            ->limit($p_easy)
            ->all();

        foreach ($question_easy as $qus) {
            $temp_arr_ids[] = $qus->id;
        }

        // check if question not enough
        $temp_count = (count($question_easy) < $p_easy) ? ($p_easy - count($question_easy)) : 0;
        $question_easy2 = [];
        if ($temp_count != 0) {
            $question_easy2 = Question::find()->where(['status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED])
                ->andWhere(['not in', 'id', $temp_arr_ids])
                ->andWhere(['question_level' => 1])
                ->andWhere(['number_appear' => 0])
                ->limit($temp_count)
                ->all();
        }

        $questions = array_merge($question_easy2, $question_easy, $question_medium, $question_hard);

        return $questions;
    }
}