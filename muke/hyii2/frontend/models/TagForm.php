<?php
namespace frontend\models;
/** 
 * 标签的表单模型
 */
use yii\base\Model;
use Yii;
use common\models\TagModel;
class TagForm extends Model
{
	public $id;

	public $tags;

	public function rules()
	{
		return[
        ['tag','required'],
        ['tags','each','rule'=>['string']],
		];
	}
/**
 * 保存标签集合
 * @return [type] [description]
 */
public function saveTags()
{
	$ids =[];
	if(!empty($this->tags)){
		foreach ($this->tags as $tag){
			$ids[] =$this->_saveTag($tag);
		}
	} 
	return $ids;
}

/**
 * 保存标签
 * @return [type] [description]
 */
private function _saveTag($tag)
{
	$model=new TagModel();
	$res = $model->find()->where(['tag_name'=>$tag])->one();
	//新建标签
	if(!$res){
		$model->tag_name=$tag;
		$model->post_num =1;
		
		if(!$model->save()){
			throw new \Exception("保存标签失败！");
			
		}
		
		return $model->id;
	}else{
		$res->updateCounters(['post_num'=>1]);
	}
	return $res->id;
}









}

?>