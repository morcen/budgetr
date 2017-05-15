<?php

namespace app\modules\accounting\models;

use Yii;

/**
 * This is the model class for table "loan_providers".
 *
 * @property integer $id
 * @property string $name
 * @property string $remarks
 *
 * @property Loans[] $loans
 */
class LoanProvider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_providers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remarks'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loans::className(), ['provider_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return LoanProvidersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoanProvidersQuery(get_called_class());
    }
}
