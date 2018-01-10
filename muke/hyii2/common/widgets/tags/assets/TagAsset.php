<?php
/**
 * @link http://www.yii-china.com/
 * @copyright Copyright (c) 2015 Yii中文网
 * @license http://www.yii-china.com
 */

namespace common\widgets\tags\assets;

use yii\web\AssetBundle;

/**
 * @author Xianan Huang <xianan_huang@163.com>
 * @since 1.0
 */
class TagAsset extends AssetBundle
{
    public $css = [
        'css/select2.css',
    ];  
    
    public $js = [
        'js/select2.js',   
    ];
    
    /**
     * 初始化：sourcePath赋值
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = (dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR . 'statics';
    }
}
