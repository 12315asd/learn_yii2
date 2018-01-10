<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;
/**
 * This is the model class for table "cats".
 *
 * @property integer $id
 * @property string $cat_name
 */
class CatsModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cat_name' => Yii::t('app', 'Cat Name'),
        ];
    }
    public static function getAllCats()
    {
        $cat = ['0'=>'暂无分类'];
        $res =self::find()->asArray()->all();
        if($res){
            foreach ($res as $k => $list) {
                $cat[$list['id']]=$list['cat_name'];
            }
        }
        print_r($cat);
        return $cat;
    }

















}
