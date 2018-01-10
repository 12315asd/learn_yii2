<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
        'brandLabel' => Yii::t('common','Blog'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $leftmenu = [
        ['label' => Yii::t('common','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common','article'), 'url' => ['/post/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $rightmenuItems[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
        $rightmenuItems[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $rightmenuItems[] = [
            'label' => '<img src="' .Yii::$app->params['avatar']['small']. '" alt="' . Yii::$app->user->identity->username . '"> ',
            'url' => ['/site/logout'],
            'linkOptions' => ['class' => 'avatar'],
            'items'=>[
               ['label'=>'<i class="fa fa-sign-out"></i>退出','url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post'] ],
                ['label'=>'个人中心','url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post'] ]
            ]
            //'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftmenu,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels'=>false,
        'items' => $rightmenuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
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
