<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserData;

/**
 * UserDataSearch represents the model behind the search form about `backend\models\UserData`.
 */
class UserDataSearch extends UserData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'letters', 'notices', 'topics', 'comments', 'follows', 'fans', 'credits1', 'credits2', 'credits3', 'credits4', 'credits5', 'credits6', 'login_count', 'prev_login_time', 'prev_login_ip', 'last_login_time', 'last_login_ip', 'online_time', 'created_at'], 'integer'],
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
        $query = UserData::find();

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
            'letters' => $this->letters,
            'notices' => $this->notices,
            'topics' => $this->topics,
            'comments' => $this->comments,
            'follows' => $this->follows,
            'fans' => $this->fans,
            'credits1' => $this->credits1,
            'credits2' => $this->credits2,
            'credits3' => $this->credits3,
            'credits4' => $this->credits4,
            'credits5' => $this->credits5,
            'credits6' => $this->credits6,
            'login_count' => $this->login_count,
            'prev_login_time' => $this->prev_login_time,
            'prev_login_ip' => $this->prev_login_ip,
            'last_login_time' => $this->last_login_time,
            'last_login_ip' => $this->last_login_ip,
            'online_time' => $this->online_time,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }
}
