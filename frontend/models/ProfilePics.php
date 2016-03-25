<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile_pics".
 *
 * @property integer $profile_pic_id
 * @property string $image_path
 */
class ProfilePics extends \yii\db\ActiveRecord
{
    public $file; 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_pics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_path'], 'required'],
            [['image_path'], 'string', 'max' => 255],
            [['file'], 'safe'], //public function rules()
            [['file'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_pic_id' => 'Profile Pic ID',
            'image_path' => 'Image Path',
            'file' => 'Photo',
        ];
    }
}
