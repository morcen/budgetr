<?php

namespace app\modules\accounting\models;

/**
 * This is the ActiveQuery class for [[Loan]].
 *
 * @see Loan
 */
class LoansQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Loan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Loan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
