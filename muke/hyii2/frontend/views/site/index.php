<?php

use frontend\widgets\banner\BannerWidget;
use yii\base\widget;
use frontend\widgets\chat\ChatWidget;
use frontend\widgets\post\PostWidget;

use frontend\widgets\remen\RemenWidget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;


$this->title = '博客-首页';
?>

<div class="row">
   <div class="col-lg-9">
    <!--首页轮播 -->
     <?=BannerWidget::widget()?>

      <!--文章列表 -->
        <?=PostWidget::widget()?>
   </div>

  
   <div class="col-lg-3">
   <!--留言板 -->
        <?=ChatWidget::widget()?>
    <!--热门浏览 -->
        <?=HotWidget::widget()?>

     <!--标签云 -->
        <?=TagWidget::widget()?>   
         
         
   </div>

   

</div>