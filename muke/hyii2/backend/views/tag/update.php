<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TagModel */

$this->title = 'Update Tag Model: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tag Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tag-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
