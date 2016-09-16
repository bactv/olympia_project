<?php

namespace backend\models;

use Yii;


class Game extends \common\models\GameBase
{
    /**
     * Choose player by type_game
     * @param $type_game
     * @return array
     */
    public static function choosePlayer($type_game)
    {
        $num_game = self::find()->select('num_game')->max('num_game');

        $arr_players_id_valid = [];

        $query = self::find();

        if ($num_game != null) {
            $query->where(['num_game' => $num_game]);
        }

        if ($type_game == 2) {      // neu la cuoc thu thang, lay 4 nguoi o 4 tuan truoc
            $temp = $query->orderBy('date DESC')->limit(4)->all();
            if (!empty($temp)) {
                foreach ($temp as $tmp) {
                    if ($tmp->type_game == 1) {
                        $players = json_decode($tmp->data);
                        $arr_players_id_valid[] = self::sortScoreCompetition($players)->user_id;
                    }
                }
            }
        } else if ($type_game == 3) { // neu la cuoc thi quy, lay 4 nguoi o cuoc thang
            $quaters_ago = $query->andWhere(['type_game' => 2])->limit(1)->one();       // lay id cuoc thi quy lan truoc
            $temp = $query->andWhere(['type_game' => 2])->limit(4)->all();
            if (!empty($temp)) {
                foreach ($temp as $tmp) {
                    if ((!empty($quaters_ago) && ($tmp->id > $quaters_ago->id)) || empty($quaters_ago)) {
                        $players = json_decode($tmp->data);
                        $arr_players_id_valid[] = self::sortScoreCompetition($players)->user_id;
                    }
                }
            }
        } else if ($type_game == 4) {
            $temp = $query->andWhere(['type_game' => 3])->limit(4)->all();
            if (!empty($temp)) {
                foreach ($temp as $tmp) {
                    $players = json_decode($tmp->data);
                    $arr_players_id_valid[] = self::sortScoreCompetition($players)->user_id;
                }
            }
        } else if ($type_game == 1) {
            $temp = $query->all();

            // danh sach cac hoc sinh da choi
            $arr_user_play = [];
            if (!empty($temp)) {
                foreach ($temp as $tmp) {
                    $players = json_decode($tmp->data_game);
                    foreach ($players as $pl) {
                        $arr_user_play[] = $pl->user_id;
                    }
                }
            }

            // danh sach cac hoc sinh trong bang student
            $listPlayersDB = Student::getAllStudent();
            if (!empty($listPlayersDB)) {
                foreach ($listPlayersDB as $item) {
                    if (!in_array($item->id, $arr_user_play)) {
                        $arr_players_id_valid[] = $item->id;
                    }
                }
            }

            // lay 4 nguoi choi trong sanh sach co the choi
            $arr_players_id_valid = array_slice($arr_players_id_valid, 0, 4);
        }
        $results = [];
        foreach ($arr_players_id_valid as $id) {
            $student = Student::getStudentById($id);
            $results[] = $student;
        }
        return $results;
    }

    public static function changePlayer($old_ids)
    {
        $num_game = self::find()->select('num_game')->max('num_game');

        $arr_players_id_valid = [];

        $query = self::find();

        if ($num_game != null) {
            $query->where(['num_game' => $num_game]);
        }

        $temp = $query->all();

        // danh sach cac hoc sinh da choi
        $arr_user_play = [];
        if (!empty($temp)) {
            foreach ($temp as $tmp) {
                $players = json_decode($tmp->data_game);
                foreach ($players as $pl) {
                    $arr_user_play[] = $pl->user_id;
                }
            }
        }

        // danh sach cac hoc sinh trong bang student
        $listPlayersDB = Student::getAllStudent();
        if (!empty($listPlayersDB)) {
            foreach ($listPlayersDB as $item) {
                if (!in_array($item->id, $arr_user_play)) {
                    $arr_players_id_valid[] = $item->id;
                }
            }
        }
        
        $arr = array_diff($arr_players_id_valid, $old_ids);

        $results = [];
        foreach ($arr as $id) {
            $student = Student::getStudentById($id);
            $results[] = $student;
        }
        return $results;
    }


    /**
     * Get user has max score
     * @param $arr_data
     * @return mixed
     */
    private static function sortScoreCompetition($arr_data)
    {
        $max = $arr_data[0]->score;
        $data_max = $arr_data[0];
        for ($i = 1; $i < count($arr_data); $i++) {
            if ($max < $arr_data[$i]->score) {
                $max = $arr_data[$i]->score;
                $data_max = $arr_data[$i];
            }
        }
        return $data_max;
    }
}