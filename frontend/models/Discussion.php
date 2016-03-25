<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "discussion".
 *
 * @property integer $discussion_id
 * @property string $discussion_name
 * @property string $discussion_description
 */
class Discussion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discussion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discussion_name', 'discussion_description'], 'required'],
            [['discussion_name'], 'string', 'max' => 50],
            [['discussion_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discussion_id' => 'Discussion ID',
            'discussion_name' => 'Discussion Name',
            'discussion_description' => 'Discussion Description',
        ];
    }
}
