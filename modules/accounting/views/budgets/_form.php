<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\Budget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter budget date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <p>&nbsp;</p>
    <?= Html::a("Add a budget item", ['/accounting/budget-details/create','budgetId'=>$model->id],['class'=>'btn btn-primary']); ?>
    &nbsp;<br/><br/>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Category</th>
            <th class="text-right">Income</th>
            <th class="text-right">Expense</th>
            <th>Remarks</th>
        </tr>
        </thead>
        <tbody>
            <?php if (empty($detailsModel)): ?>
            <tr>
                <td colspan="4">No items yet.</td>
            </tr>
            <?php else: ?>
                <?php $totalIncome = 0; $totalExpense = 0; ?>
                <?php foreach($detailsModel as $detail): ?>
                <tr>
                    <td><?= $detail->category->name; ?></td>
                    <td class="text-right">
                        <?php
                        if ($detail->category->type=='INCOME') {
                            echo Yii::$app->formatter->asCurrency($detail->amount, 'PHP');
                            $totalIncome += $detail->amount;
                        }
                        ?>
                    </td>
                    <td class="text-right">
                        <?php
                        if ($detail->category->type=='EXPENSE') {
                            echo Yii::$app->formatter->asCurrency($detail->amount, 'PHP');
                            $totalExpense += $detail->amount;
                        }
                        ?>
                    </td>
                    <td><?= $detail->remarks; ?></td>

                <?php endforeach;?>
                </tr>
            <?php endif;?>
        </tbody>
        <?php if (!empty($detailsModel)): ?>
        <tfoot>
        <tr>
            <th class="text-right" colspan="2"><?= Yii::$app->formatter->asCurrency($totalIncome, 'PHP'); ?></th>
            <th class="text-right"><?= Yii::$app->formatter->asCurrency($totalExpense, 'PHP');?></th>
            <th class="text-right">Grand total: <?= Yii::$app->formatter->asCurrency($totalIncome-$totalExpense, 'PHP');?></th>
        </tr>
        </tfoot>
        <?php endif; ?>
    </table>


    <?php ActiveForm::end(); ?>

</div>
