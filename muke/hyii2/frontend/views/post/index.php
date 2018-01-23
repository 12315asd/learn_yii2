<?php 
use frontend\widgets\post\PostWidget;
use yii\base\widget;
use frontend\widgets\hot\HotWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\tag\TagWidget;
?>
<div class=="col-lg-9">
         <div class="col-lg-9">
         <?=PostWidget::widget();?>
         </div>
         <div class="col-lg-3">
         <?php if(!\Yii::$app->user->isGuest):?>
  <a class="btn btn-success btn-block btn-post" href="<?=Url::to(['post/create'])?>">创建文章</a>
  
  <?php // if(\Yii::$app->user->identity->id == $data['user_id']) ?>
   <!-- <a class="btn btn-info btn-block btn-post" href="<?//=Url::to(['post/update','id'=>$data['id']])?>">编辑文章</a> -->
       <?php// endif;?>
      
      <?php endif;?> 
          <!--热门浏览 -->
        <?=HotWidget::widget()?>

        <!--标签云 -->
        <?=TagWidget::widget()?>   
         
         </div>
</div>