<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\LoanProvider */

$this->title = 'Create Loan Provider';
$this->params['breadcrumbs'][] = ['label' => 'Loan Providers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-provider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
