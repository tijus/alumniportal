<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $proj_id
 * @property string $title
 * @property integer $year
 * @property string $domain
 * @property string $description
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'domain' => 'Domain',
            'description' => 'Description',
        ];
    }
}
