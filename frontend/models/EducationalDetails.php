<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "educational_details".
 *
 * @property integer $edu_det_id
 * @property string $degree
 * @property string $grade
 * @property string $stream
 * @property string $board
 */
class EducationalDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'educational_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['degree', 'stream', 'grade'], 'required'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'edu_det_id' => 'Edu Det ID',
            'degree' => 'Degree',
            'grade' => 'Percentage / SGPA / SGPI / Grade',
            'stream' => 'Stream',
           
        ];
    }
}
