<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlayerList;

/**
 * PlayerListSearch represents the model behind the search form of `app\models\PlayerList`.
 */
class PlayerListSearch extends PlayerList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'feature1_value_basic', 'feature1_mod_throw', 'feature2_value_basic', 'feature2_mod_throw', 'feature3_value_basic', 'feature3_mod_throw', 'feature4_value_basic', 'feature4_mod_throw', 'feature5_value_basic', 'feature5_mod_throw', 'feature6_value_basic', 'feature6_mod_throw', 'damage'], 'integer'],
            [['feature1_name', 'feature2_name', 'feature3_name', 'feature4_name', 'feature5_name', 'feature6_name', 'items'], 'safe'],
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
        $query = PlayerList::find();

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
            'book_id' => $this->book_id,
            'feature1_value_basic' => $this->feature1_value_basic,
            'feature1_mod_throw' => $this->feature1_mod_throw,
            'feature2_value_basic' => $this->feature2_value_basic,
            'feature2_mod_throw' => $this->feature2_mod_throw,
            'feature3_value_basic' => $this->feature3_value_basic,
            'feature3_mod_throw' => $this->feature3_mod_throw,
            'feature4_value_basic' => $this->feature4_value_basic,
            'feature4_mod_throw' => $this->feature4_mod_throw,
            'feature5_value_basic' => $this->feature5_value_basic,
            'feature5_mod_throw' => $this->feature5_mod_throw,
            'feature6_value_basic' => $this->feature6_value_basic,
            'feature6_mod_throw' => $this->feature6_mod_throw,
            'damage' => $this->damage,
        ]);

        $query->andFilterWhere(['like', 'feature1_name', $this->feature1_name])
            ->andFilterWhere(['like', 'feature2_name', $this->feature2_name])
            ->andFilterWhere(['like', 'feature3_name', $this->feature3_name])
            ->andFilterWhere(['like', 'feature4_name', $this->feature4_name])
            ->andFilterWhere(['like', 'feature5_name', $this->feature5_name])
            ->andFilterWhere(['like', 'feature6_name', $this->feature6_name])
            ->andFilterWhere(['like', 'items', $this->items]);

        return $dataProvider;
    }
}
