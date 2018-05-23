<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Challenge;

/**
 * ChallengeSearch represents the model behind the search form of `app\models\Challenge`.
 */
class ChallengeSearch extends Challenge
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paragraph_id', 'target_value', 'target_mod_throw', 'player_mod_value', 'player_mod_throw', 'tranzit_win', 'tranzit_fail'], 'integer'],
            [['test_feature', 'condition', 'feature_change_win', 'item_change_win', 'feature_change_fail', 'item_change_fail'], 'safe'],
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
        $query = Challenge::find();

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
            'target_value' => $this->target_value,
            'target_mod_throw' => $this->target_mod_throw,
            'player_mod_value' => $this->player_mod_value,
            'player_mod_throw' => $this->player_mod_throw,
            'tranzit_win' => $this->tranzit_win,
            'tranzit_fail' => $this->tranzit_fail,
        ]);

        $query->andFilterWhere(['like', 'test_feature', $this->test_feature])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'feature_change_win', $this->feature_change_win])
            ->andFilterWhere(['like', 'item_change_win', $this->item_change_win])
            ->andFilterWhere(['like', 'feature_change_fail', $this->feature_change_fail])
            ->andFilterWhere(['like', 'item_change_fail', $this->item_change_fail]);

        return $dataProvider;
    }
}
