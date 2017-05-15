<?php

namespace app\modules\accounting\models;

/**
 * This is the ActiveQuery class for [[BudgetDetail]].
 *
 * @see BudgetDetail
 */
class BudgetDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BudgetDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BudgetDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
