<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admin;

/**
 * AdminSearch represents the model behind the search form about `backend\models\Admin`.
 */
class AdminSearch extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'deleted', 'thumb_version', 'created_by', 'updated_by'], 'integer'],
            [['username', 'password', 'email', 'fullname', 'birthday', 'profession', 'created_time', 'updated_time', 'last_active_time', 'admin_group_ids'], 'safe'],
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
        $query = Admin::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'status' => $this->status,
            'deleted' => $this->deleted,
            'thumb_version' => $this->thumb_version,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'last_active_time' => $this->last_active_time,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'admin_group_ids', $this->admin_group_ids]);

        return $dataProvider;
    }
}
