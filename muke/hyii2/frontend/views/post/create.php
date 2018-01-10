<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title ='创建';
$this->params['breadcrumbs'][]=['label'=>'文章','url'=>['post/index']];
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="row">
       <div class="col-lg-9">
        <div class="panel-title box-title">
           <span>创建文章</span>              
        </div>
         <div class="panel-body">
            <?php  $form = ActiveForm::begin()?>
            <?=$form->field($model,'title')->textinput(['maxlength'=>true]) ?>
             <?=$form->field($model, 'cat_id')->dropDownList($cat) ?>
            
            <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[
            //图片上传的一些配置，不写调用默认配置
            'domain_url' => 'http://frontend.hyii2.com',
                 ]
            ]) ?>
            <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
                 'options'=>[
        'initialFrameHeight' => 350,

                ]
                 ]) ?>
           
            <?=$form->field($model,'tags')->widget('common\widgets\tags\TagWidget') ?>
            <div class="form-group">
            <?=Html::submitButton("发布",['class'=>'btn btn-success'])?>
            </div>
            <?php ActiveForm::end() ?>
         </div>
       </div>
       <div class="col-lg-3">
             <div class="panel-title box-title">
             <span>注意事项</span>
             </div>
             <div class="panel-body">
             <p>1.</p>
             <p>2.</p>

             </div>
       </div>
</div>