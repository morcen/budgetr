<?php

namespace app\modules\accounting\models;

use Yii;
use app\modules\admin\models\Category;

/**
 * This is the model class for table "budget_details".
 *
 * @property integer $id
 * @property integer $budget_id
 * @property integer $category_id
 * @property double $amount
 *
 * @property Category $category
 * @property Budget $budget
 */
class BudgetDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['budget_id', 'category_id'], 'required'],
            [['budget_id', 'category_id'], 'integer'],
            [['amount'], 'number'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['budget_id'], 'exist', 'skipOnError' => true, 'targetClass' => Budget::className(), 'targetAttribute' => ['budget_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'budget_id' => 'Budget',
            'category_id' => 'Category',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudget()
    {
        return $this->hasOne(Budget::className(), ['id' => 'budget_id']);
    }

    /**
     * @inheritdoc
     * @return BudgetDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BudgetDetailsQuery(get_called_class());
    }
}
