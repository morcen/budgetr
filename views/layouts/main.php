<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'BudgetR',
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Accounting',
                'items' => [
                    [
                        'label' => 'Loans',
                        'url'   => ['/accounting/loans']
                    ],
                    [
                        'label' => 'Loan Providers',
                        'url'   => ['/accounting/loan-providers']
                    ],
                    [
                        'label' => 'Budget',
                        'url'   => ['/accounting/budgets']
                    ],
                ],
            ],
            [
                'label' => 'Admin',
                'items' => [
                    [
                        'label' => 'Categories',
                        'url'   => ['/admin/categories']
                    ],
                ],
            ],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php
        if(isset(\Yii::$app->controller->module->module)) {
            $breadCrumbModule = [
                'label' => ucfirst(\Yii::$app->controller->module->id),
                'url' => \Yii::$app->getUrlManager()->createUrl(\Yii::$app->controller->module->id)
            ];
            if (isset($this->params['breadcrumbs'])) {
                array_unshift($this->params['breadcrumbs'], $breadCrumbModule);
            }
        }
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
