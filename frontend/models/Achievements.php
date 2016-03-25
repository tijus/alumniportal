<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "achievements".
 *
 * @property integer $achievement_id
 * @property string $title
 * @property string $level
 * @property string $description
 */
class Achievements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achievements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'level'], 'required'],
            [['title'], 'string', 'max' => 20],
            [['level'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'achievement_id' => 'Achievement ID',
            'title' => 'Title',
            'level' => 'Level',
            'description' => 'Description',
        ];
    }
}
