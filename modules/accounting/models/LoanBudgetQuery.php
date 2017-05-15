<?php

namespace app\modules\accounting\models;

/**
 * This is the ActiveQuery class for [[LoanBudget]].
 *
 * @see LoanBudget
 */
class LoanBudgetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LoanBudget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LoanBudget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
