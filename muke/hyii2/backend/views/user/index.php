<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-index">

   


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email_validate_token:email',
            'email:email',
            // 'role',
            'status'=>[
             'label' => '状态',
             'attribute' => 'status',
             'value' =>function($model){
                return ($model->status == 10)?'激活':'非激活' ;
             },
             'filter' => ['0'=>'非激活','10'=>'激活'],
            ],
            // 'avatar',
            // 'vip_lv',
             'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
