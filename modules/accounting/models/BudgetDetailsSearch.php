<?php

namespace app\modules\accounting\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\BudgetDetail;

/**
 * BudgetDetailsSearch represents the model behind the search form about `app\modules\accounting\models\BudgetDetail`.
 */
class BudgetDetailsSearch extends BudgetDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'budget_id', 'category_id'], 'integer'],
            [['amount'], 'number'],
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
        $query = BudgetDetail::find();

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
            'budget_id' => $this->budget_id,
            'category_id' => $this->category_id,
            'amount' => $this->amount,
        ]);

        return $dataProvider;
    }
}
