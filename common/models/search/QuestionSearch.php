<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `backend\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_topic', 'question_level', 'question_format', 'type_question', 'created_by', 'updated_by', 'status', 'deleted', 'number_appear', 'admin'], 'integer'],
            [['content', 'created_time', 'updated_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Question::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'question_topic' => $this->question_topic,
            'question_level' => $this->question_level,
            'question_format' => $this->question_format,
            'type_question' => $this->type_question,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
            'deleted' => $this->deleted,
            'number_appear' => $this->number_appear,
            'admin' => $this->admin,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
