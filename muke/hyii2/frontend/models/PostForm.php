<?php 

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\PostModel;
use yii\base\Object;
use common\models\RelationPostTagModel;
use yii\db\Query;

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
   public $_lastError="";
   
  
   /*
   *定义场景
   * const SCENARIOS_CREATE='create'; 创建场景
     const SCENARIOS_UPDATE='update'; 更新场景
    */
   const SCENARIOS_CREATE='create';
   const SCENARIOS_UPDATE='update';
  /**
   * 定义事件
   * const EVENT_AFTER_CREATE="eventAfterCreate";创建之后的事件
   * const EVENT_AFTER_UPDATE="eventAfterUpdate"; 更新之后的事件
   */
   const EVENT_AFTER_CREATE="eventAfterCreate";
   const EVENT_AFTER_UPDATE="eventAfterUpdate";
   /*
   场景设置
    */
   public function scenarios()
   {
    $scenarios=[
       self::SCENARIOS_CREATE=>['title','content','label_img','cat_id','tags'],
       self::SCENARIOS_UPDATE=>['title','content','label_img','cat_id','tags'],
    ];
    return array_merge(parent::scenarios(),$scenarios);
   }

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
    
    public static  function getList($cond,$curPage=1,$pageSize =5 ,$orderBy=['id'=>SORT_DESC])
    {

      $model = new PostModel();
      $select =['id','title','summary','label_img','cat_id','user_id','user_name','is_valid','created_at','updated_at'];

      $query=$model->find()->select($select)->where($cond)->with('relate.tag','extend')->orderBy($orderBy);
     /**
      * 获取分页数据
      * @var [type]
      */
     $res = $model->getPages($query,$curPage,$pageSize);
     //格式化
     $res['data'] = self::_formatList($res['data']);
     return $res;

    }
    /**
     * 数据格式化
     * @return [type] [description]
     */
    public static function _formatList($data)
    {
      foreach ($data as &$list) {
         $list['tags']=[];
         if(isset($list['relate'])&& !empty($list['relate'])){
          foreach($list['relate'] as $lt){
          $list['tags'][]=$lt['tag']['tag_name'];
           }
         }
       unset($list['relate']);
      }
      
      return $data;
    }
  /*
  文章创建
   */
   public function create()
   {
    //事物
    $transation = Yii::$app->db->beginTransaction();
    try{
      $model =new PostModel();
      $model->setAttributes($this->attributes);
      $model->summary = $this->_getSummary();
      $model->user_id=Yii::$app->user->identity->id;
      $model->user_name=Yii::$app->user->identity->username;
      $model->is_valid =PostModel::IS_VALID;
      $model->created_at=time();
      $model->updated_at=time();
      if(!$model->save())
        throw new \Exception('文章保存失败');
        $this->id =$model->id;

        //调用事件
        $data =array_merge($this->getAttributes(),$model->getAttributes());
        $this->_eventAfterCreate($data);

      $transation->commit();
      return true;
    }catch(\Exception $e){
      $transation->rollBack();
      $this->_lastError = $e->getMessage();
      return false;
    }
   }


   public function getViewById($id)
   {
     $res = PostModel::find()->with('relate.tag','extend')->where(['id'=>$id])->asArray()->one();
     if(!$res)
     {
      throw new NotFoundHttpException("文章不存在！");
      
     }
      //处理标签格式
      $res['tags'] =[];
      if(isset($res['relate'])&&!empty($res['relate'])){
         foreach ($res['relate'] as $list) {
           $res['tags'][] = $list['tag']['tag_name'];
         }
      }
      unset($res['relate']);
      
      return $res;
   }

   /*
   *截取文章摘要
    */
     private function _getSummary($s=0,$e=90,$char='utf-8')
     {
      if(empty($this->content))
      

        return null;
      
      return(mb_substr(str_replace('$nbsp;','',strip_tags($this->content)), $s,$e,$char));
     }

 /**
  * 创建完成后调用事件方法
  */

   public function _eventAfterCreate($data)
   {
    //添加事件
        $this->on(self::EVENT_AFTER_CREATE,[$this,'_eventAddTage'],$data);
        //触发事件
        $this->trigger(self::EVENT_AFTER_CREATE);
   }
  /**
   * [_eventAddTage description] 添加标签
   * @return [type] [description]
   */
   public function _eventAddTage($event)
   {     
        //保存标签
          $tag =new TagForm();
          $tag->tags=$event->data['tags'];
          $tagids = $tag->saveTags();

          //删除文章原先的关联关系
          RelationPostTagModel::deleteAll(['post_id' => $event->data['id']]);

          //批量保存文章标签的关联关系
          if(!empty($tagids)){
            foreach($tagids as $k=>$id){
              $row[$k]['post_id'] = $this ->id;
              $row[$k]['tag_id'] = $id;
            }
      //批量插入
            $res =(new Query())->createCommand()
            ->batchInsert(RelationPostTagModel::tableName(),['post_id','tag_id'],$row)
            ->execute();
            //返回结果
          if(!$res)
            throw new Exception("关联关系保存失败！");
            

          }
          
   }











}