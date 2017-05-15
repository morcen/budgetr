<?php

namespace app\modules\accounting\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\Loan;

/**
 * LoansSearch represents the model behind the search form about `app\modules\accounting\models\Loan`.
 */
class LoansSearch extends Loan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'provider_id', 'terms'], 'integer'],
            [['amount', 'interest', 'total'], 'number'],
            [['frequency'], 'safe'],
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
        $query = Loan::find();

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
            'provider_id' => $this->provider_id,
            'amount' => $this->amount,
            'interest' => $this->interest,
            'total' => $this->total,
            'terms' => $this->terms,
        ]);

        $query->andFilterWhere(['like', 'frequency', $this->frequency]);

        return $dataProvider;
    }
}
