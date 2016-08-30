<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Student;

/**
 * StudentSearch represents the model behind the search form about `backend\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'deleted', 'thumb_version', 'number_play_game'], 'integer'],
            [['username', 'password', 'email', 'phone', 'fullname', 'birthday', 'school', 'address', 'created_time', 'updated_time', 'last_active_time'], 'safe'],
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
        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'last_active_time' => $this->last_active_time,
            'status' => $this->status,
            'deleted' => $this->deleted,
            'thumb_version' => $this->thumb_version,
            'number_play_game' => $this->number_play_game,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
