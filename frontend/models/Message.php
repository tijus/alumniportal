<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $message_id
 * @property string $message_contents
 * @property string $username
 * @property string $date_time
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discussion_id','message_creater_id','message_contents', 'username', 'date_time'], 'required'],
            [['discussion_id'], 'integer'],
            [['message_creater_id'],'integer'],
            [['id'],'integer'],
            [['message_contents'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 40],
            [['date_time'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'=>'ID',
            'discussion_id' => 'Message ID',
            'message_creater_id'=>'Message Creater Id',
            //'discussion_id'=>'Discussion ID',
            'message_contents' => '',
            'username' => 'Username',
            'date_time' => 'Date Time',
        ];
    }
}
