<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = 'Create Post Model';
$this->params['breadcrumbs'][] = ['label' => 'Post Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
