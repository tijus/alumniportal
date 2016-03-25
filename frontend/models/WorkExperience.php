<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "work_experience".
 *
 * @property integer $work_exp_id
 * @property integer $type
 * @property string $company_name
 * @property string $job_title
 * @property string $start_date

 */
class WorkExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'company_name', 'job_title', 'start_date'], 'required'],
            [['type'], 'string','max'=>30],
            [['company_name'], 'string', 'max' => 30],
            [['job_title'], 'string', 'max' => 25],
            //[['start_date', 'end_date'], 'string', 'max' => 10]
             [['start_date'],'date', 'format'=>'dd-mm-yyyy','message'=>'Date should be of the format dd-mm-yyyy']
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'work_exp_id' => 'Work Exp ID',
            'type' => 'Mention your Experience type',
            'company_name' => 'Name of your current company',
            'job_title' => 'Job Title',
            'start_date' => 'Date of joining',
            
        ];
    }
}
