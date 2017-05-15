<?php

namespace app\modules\accounting\models;

use Yii;

/**
 * This is the model class for table "budgets".
 *
 * @property integer $id
 * @property string $date
 * @property string $created_at
 * @property string $modified_at
 *
 * @property BudgetDetails[] $budgetDetails
 */
class Budget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budgets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetDetails()
    {
        return $this->hasMany(BudgetDetails::className(), ['budget_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BudgetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BudgetsQuery(get_called_class());
    }
}
