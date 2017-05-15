<?php

namespace app\modules\accounting\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\LoanBudget;

/**
 * LoanBudgetSearch represents the model behind the search form about `app\modules\accounting\models\LoanBudget`.
 */
class LoanBudgetSearch extends LoanBudget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loan_id', 'budget_id', 'is_paid'], 'integer'],
            [['amount'], 'number'],
            [['paid_at', 'created_at', 'modified_at'], 'safe'],
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
        $query = LoanBudget::find();

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
            'loan_id' => $this->loan_id,
            'budget_id' => $this->budget_id,
            'amount' => $this->amount,
            'is_paid' => $this->is_paid,
            'paid_at' => $this->paid_at,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        return $dataProvider;
    }
}
