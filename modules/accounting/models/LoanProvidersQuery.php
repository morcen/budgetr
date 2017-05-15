<?php

namespace app\modules\accounting\models;

/**
 * This is the ActiveQuery class for [[LoanProvider]].
 *
 * @see LoanProvider
 */
class LoanProvidersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LoanProvider[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LoanProvider|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
