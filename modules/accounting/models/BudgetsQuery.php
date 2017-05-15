<?php

namespace app\modules\accounting\models;

/**
 * This is the ActiveQuery class for [[Budget]].
 *
 * @see Budget
 */
class BudgetsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Budget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Budget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
