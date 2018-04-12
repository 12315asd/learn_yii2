<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatsModel */

$this->title = 'Update Cats Model: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cats Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cats-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
