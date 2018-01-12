<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $tag_name
 * @property integer $post_num
 */
class TagModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_num'], 'integer'],
            [['tag_name'], 'string', 'max' => 255],
            [['tag_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tag_name' => Yii::t('app', 'Tag Name'),
            'post_num' => Yii::t('app', 'Post Num'),
        ];
    }
}
