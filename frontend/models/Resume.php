<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property integer $resume_id
 * @property string $carreer_obj
 * @property string $awards
 * @property string $sem1
 * @property string $sem2
 * @property string $sem3
 * @property string $sem4
 * @property string $sem5
 * @property string $sem6
 * @property string $sem7
 * @property string $sem8
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carreer_obj','languagesknown', 'awards', 'sem1', 'sem2', 'sem3', 'sem4', 'sem5', 'sem6', 'sem7', 'sem8'], 'required'],
            [['carreer_obj', 'awards'], 'string', 'max' => 100],
            [['sem1', 'sem2', 'sem3', 'sem4', 'sem5', 'sem6', 'sem7', 'sem8'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'carreer_obj' => 'Specify your carrer Objective',
            'awards' => 'Achievements and awards',
            'languagesknown'=>'How many languages do you know?',
            'sem1' => 'Semester 1',
            'sem2' => 'Semester 2',
            'sem3' => 'Semester 3',
            'sem4' => 'Semester 4',
            'sem5' => 'Semester 5',
            'sem6' => 'Semester 6',
            'sem7' => 'Semester 7',
            'sem8' => 'Semester 8',
        ];
    }
}
