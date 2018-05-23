<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tranzit;

/**
 * TranzitSearch represents the model behind the search form of `app\models\Tranzit`.
 */
class TranzitSearch extends Tranzit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paragraph_id', 'tranzit_number'], 'integer'],
            [['tranzit_text', 'condition_feature', 'condition_item', 'feature_change', 'item_change'], 'safe'],
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
        $query = Tranzit::find();

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
            'tranzit_number' => $this->tranzit_number,
        ]);

        $query->andFilterWhere(['like', 'tranzit_text', $this->tranzit_text])
            ->andFilterWhere(['like', 'condition_feature', $this->condition_feature])
            ->andFilterWhere(['like', 'condition_item', $this->condition_item])
            ->andFilterWhere(['like', 'feature_change', $this->feature_change])
            ->andFilterWhere(['like', 'item_change', $this->item_change]);

        return $dataProvider;
    }
}
