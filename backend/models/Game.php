<?php

namespace backend\models;

use Yii;


class Game extends \common\models\GameBase
{
    public static function choosePlayer($type_game)
    {
        $num_game = self::find()->select('num_game')->max('num_game');

        $arr_players_id_valid = [];

        $query = self::find();

        if ($num_game != null) {
            $query->where(['num_game' => $num_game]);
        }

        if ($type_game == Yii::$app->params['type_game']['game_month']) {
            $temp = $query->orderBy('date DESC')->limit(4)->all();
            if (!empty($temp->data_game)) {
                foreach ($temp->data_game as $dt) {
                    $arr_players_id_valid[] = $dt->user_id;
                }
            }
        } else if ($type_game == Yii::$app->params['type_game']['game_quarters']) {
            $temp = $query->andWhere(['type_game' => Yii::$app->params['type_game']['game_month']])->limit(4)->all();
            if (!empty($temp->data_game)) {
                foreach ($temp->data_game as $dt) {
                    $arr_players_id_valid[] = $dt->user_id;
                }
            }
        } else if ($type_game == Yii::$app->params['type_game']['game_year']) {
            $temp = $query->andWhere(['type_game' => Yii::$app->params['type_game']['game_quarters']])->limit(4)->all();
            if (!empty($temp->data_game)) {
                foreach ($temp->data_game as $dt) {
                    $arr_players_id_valid[] = $dt->user_id;
                }
            }
        } else if ($type_game == Yii::$app->params['type_game']['game_week']) {
            $temp = $query->all();

            $arr_user_play = [];
            if (!empty($temp)) {
                foreach ($temp as $tmp) {
                    $players = json_decode($tmp->data_game);
                    foreach ($players as $pl) {
                        $arr_user_play[] = $pl->user_id;
                    }
                }
            }

            $listPlayersDB = Student::getAllStudent();
            if (!empty($listPlayersDB)) {
                foreach ($listPlayersDB as $item) {
                    if (!in_array($item->id, $arr_user_play)) {
                        $arr_players_id_valid[] = $item->id;
                    }
                }
            }
            $arr_players_id_valid = array_slice($arr_players_id_valid, 0, 4);
        }
        $results = [];
        foreach ($arr_players_id_valid as $id) {
            $student = Student::getStudentById($id);
            $results[] = $student;
        }
        return $results;
    }
}