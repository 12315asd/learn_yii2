<?php 

namespace frontend\models;
use yii\base\Model;
//use common\models\PostModel;
use Yii;
/*
文章表单模型
 */
class  PostForm extends Model
{
   public $id;
   public $title;
   public $content;
   public $label_img;
   public $tags;
   public $cat_id;
   public $_lastErroe="";

  public function rules(){
  	 return[
       [['id','title','content','cat_id'],'required'],
       [['id','cat_id'],'integer'],
       ['title','string','min'=>4,'max'=>50],
  	 ];
  }
  public function attributeLabels()
  {
      return[
          'id'=>Yii::t('common','id'),
          'title'=>Yii::t('common','title'),
          'content'=>Yii::t('common','content'),
          'label_img'=>Yii::t('common','label_img'),
          'tags'=>Yii::t('common','tags'),
          'cat_id'=>Yii::t('common','cat_id'),
     ];  
  }
}