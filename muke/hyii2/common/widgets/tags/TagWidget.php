<?php
namespace common\widgets\tags;
/**
 * 标签云组件
 */
use Yii;
use yii\widgets\InputWidget;
use yii\web\View;
use yii\helpers\Html;
use common\widgets\tags\assets\TagAsset;

class TagWidget extends InputWidget
{
    public $value = '';
    
    public function init()
    {
        
    }
    
    public function run()
    {
        $this->registerClientScript();
        if($this->hasModel()){
            $data['inputName'] = Html::getInputName($this->model, $this->attribute);
            $data['inputValue'] = Html::getAttributeValue($this->model, $this->attribute);
        }else{
            $data['inputName'] = 'wd-tags';
            $data['inputValue'] = $this->value;
        }
        
        return $this->render('index',['data'=>$data]);
    }
    
    /**
     * 注册Js
     */
    protected function registerClientScript()
    {
         TagAsset::register($this->view);
         $script = '$(function() {$("#select6").select2({ tags: true });});';
         $this->view->registerJs($script, View::POS_END);
    }
}