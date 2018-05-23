<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enemy;

/**
 * EnemySearch represents the model behind the search form of `app\models\Enemy`.
 */
class EnemySearch extends Enemy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paragraph_id', 'hp', 'attack_feature', 'enemy_damage', 'count_throw', 'tranzit_win', 'tranzit_fail'], 'integer'],
            [['enemy_name'], 'safe'],
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
        $query = Enemy::find();

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
            'id' => $this->id,
            'paragraph_id' => $this->paragraph_id,
            'hp' => $this->hp,
            'attack_feature' => $this->attack_feature,
            'enemy_damage' => $this->enemy_damage,
            'count_throw' => $this->count_throw,
            'tranzit_win' => $this->tranzit_win,
            'tranzit_fail' => $this->tranzit_fail,
        ]);

        $query->andFilterWhere(['like', 'enemy_name', $this->enemy_name]);

        return $dataProvider;
    }
}
