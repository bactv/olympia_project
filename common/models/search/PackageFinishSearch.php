<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PackageFinish;

/**
 * PackageFinishSearch represents the model behind the search form about `backend\models\PackageFinish`.
 */
class PackageFinishSearch extends PackageFinish
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number_question'], 'integer'],
            [['name', 'description', 'time_reply', 'score_question'], 'safe'],
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
        $query = PackageFinish::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'number_question' => $this->number_question,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'time_reply', $this->time_reply])
            ->andFilterWhere(['like', 'score_question', $this->score_question]);

        return $dataProvider;
    }
}
