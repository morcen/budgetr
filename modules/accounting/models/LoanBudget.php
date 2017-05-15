<?php

namespace app\modules\accounting\models;

use Yii;

/**
 * This is the model class for table "loan_budget".
 *
 * @property integer $id
 * @property integer $loan_id
 * @property integer $budget_id
 * @property double $amount
 * @property integer $is_paid
 * @property string $paid_at
 * @property string $created_at
 * @property string $modified_at
 *
 * @property BudgetDetail $budget
 * @property Loan $loan
 */
class LoanBudget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'budget_id'], 'required'],
            [['loan_id', 'budget_id', 'is_paid'], 'integer'],
            [['amount'], 'number'],
            [['paid_at', 'created_at', 'modified_at'], 'safe'],
            [['budget_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetDetail::className(), 'targetAttribute' => ['budget_id' => 'id']],
            [['loan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loan::className(), 'targetAttribute' => ['loan_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loan_id' => 'Loan ID',
            'budget_id' => 'Budget ID',
            'amount' => 'Amount',
            'is_paid' => 'Is Paid',
            'paid_at' => 'Paid At',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudget()
    {
        return $this->hasOne(BudgetDetail::className(), ['id' => 'budget_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoan()
    {
        return $this->hasOne(Loan::className(), ['id' => 'loan_id']);
    }

    /**
     * @inheritdoc
     * @return LoanBudgetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoanBudgetQuery(get_called_class());
    }
}
