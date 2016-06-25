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
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','discussion_id','message_id', 'username','reply_contents' ,'date_time'], 'required'],
            [['id'], 'integer'],
            [['discussion_id'],'integer'],
            [['message_id'],'integer'],           
            [['username'], 'string', 'max' => 40],
            [['reply_contents'], 'string', 'max' => 255],
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
            'discussion_id' => 'Discussion Id',
            'message_id'=>'Message Id',
            'username' => 'Username',
            'reply_contents' => '',
        ];
    }
}
