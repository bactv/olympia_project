<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\QuestionPackage;

/**
 * QuestionPackageSearch represents the model behind the search form about `backend\models\QuestionPackage`.
 */
class QuestionPackageSearch extends QuestionPackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'part_game', 'status'], 'integer'],
            [['name', 'question_ids', 'created_time', 'updated_time'], 'safe'],
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
        $query = QuestionPackage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'part_game' => $this->part_game,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'question_ids', $this->question_ids]);

        return $dataProvider;
    }
}
