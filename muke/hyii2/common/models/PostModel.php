<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;
/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostModel extends BaseModel
{    

     const IS_VALID='1';//发布
     const NO_VALID='0';//未发布
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }
    
    //关联表
    public function getRelate()
    {
        return $this->hasMany(RelationPostTagModel::className(),['post_id'=>'id']);
    }

    public function getExtend(){
        return $this->hasOne(PostExtendModel::className(),['post_id'=>'id']);
    }
      public function getCat(){
        return $this->hasOne(CatsModel::className(),['id'=>'cat_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'summary' => Yii::t('app', 'Summary'),
            'content' => Yii::t('app', 'Content'),
            'label_img' => Yii::t('app', 'Label Img'),
            'cat_id' => Yii::t('app', 'Cat ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'is_valid' => Yii::t('app', 'Is Valid'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
