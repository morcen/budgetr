<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\accounting\models\LoansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Loan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'provider_id',
                'format'    => 'raw',
                'value'     => function ($data) {
                    return Html::a($data->provider->name,
                        ['/accounting/loan-providers/view', 'id' => $data->provider_id],
                        ['title' => 'View', 'class' => 'no-pjax']);
                }
            ],
            [
                'attribute' => 'amount',
                'format'    => ['currency', 'PHP']
            ],
            [
                'attribute' => 'interest',
                'format'    => [
                    'percent'
                ]
            ],
            [
                'attribute' => 'total',
                'format'    => ['currency', 'PHP']
            ],
            // 'terms',
            // 'frequency',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
