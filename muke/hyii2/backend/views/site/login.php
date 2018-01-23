<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h4 class="panel-title">欢迎登陆博客系统</h4>
    </div>
    <div class="panel-body">
      <button class="btn btn-primary btn-quirk btn-fb btn-block">联系我们</button>
      <div class="or">or</div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username',
                        ['inputOptions' =>[
                          'placeholder'=>'请输入账户',],
                          'inputTemplate' =>'
                  <div class="input-group">
                    <span class="input-group-addon">
                           <i class="fa fa-user"></i>
                     </span>{input}
                 </div>',  
                          ])->label(false)  ?>

                    <?= $form->field($model, 'password',
                     ['inputOptions' =>[
                          'placeholder'=>'请输入密码',],
                          'inputTemplate' =>'
                  <div class="input-group">
                    <span class="input-group-addon">
                           <i class="fa fa-lock"></i>
                     </span>{input}
                 </div>',  
                          ])->passwordInput()->label(false) ?>

                <div><a href="#" class="forgot">忘记密码?</a></div>


                    <div class="form-group">
                        <?= Html::submitButton('登录', ['class' => 'btn btn-primary
                            btn-quirk 
                            btn-block
                            btn-success        ', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                <hr class="invisibel">
                <div class="form-group">
               <!-- <a href="#" class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block">
                </a>-->
                </div>
    </div>
</div><!-- panel -->
      









   
