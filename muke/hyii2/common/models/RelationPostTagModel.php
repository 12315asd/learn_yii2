<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;
/**
 * This is the model class for table "relation_post_tags".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $tag_id
 */
class RelationPostTagModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation_post_tags';
    }
     

    public function getTag()
    {
        return $this->hasOne(TagModel::className(),['id'=>'tag_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'integer'],
            [['post_id', 'tag_id'], 'unique', 'targetAttribute' => ['post_id', 'tag_id'], 'message' => 'The combination of Post ID and Tag ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', 'Post ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
        ];
    }
}
