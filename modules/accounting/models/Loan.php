<?php

namespace app\modules\accounting\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property integer $id
 * @property integer $provider_id
 * @property double $amount
 * @property double $interest
 * @property double $total
 * @property integer $terms
 * @property string $frequency
 *
 * @property LoanProvider $provider
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provider_id'], 'required'],
            [['provider_id', 'terms'], 'integer'],
            [['amount', 'interest', 'total'], 'number'],
            [['frequency'], 'string'],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => LoanProvider::className(), 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provider_id' => 'Provider ID',
            'amount' => 'Amount',
            'interest' => 'Interest',
            'total' => 'Total',
            'terms' => 'Terms',
            'frequency' => 'Frequency',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(LoanProvider::className(), ['id' => 'provider_id']);
    }

    /**
     * @inheritdoc
     * @return LoansQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoansQuery(get_called_class());
    }
}
