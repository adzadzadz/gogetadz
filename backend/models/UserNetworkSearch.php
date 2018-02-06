<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserNetwork;

/**
 * UserNetworkSearch represents the model behind the search form of `app\models\UserNetwork`.
 */
class UserNetworkSearch extends UserNetwork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sponsor', 'placement', 'position', 'id'], 'integer'],
            [['code'], 'safe'],
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
        $query = UserNetwork::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'sponsor' => $this->sponsor,
            'placement' => $this->placement,
            'position' => $this->position,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
