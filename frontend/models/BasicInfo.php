<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "basic_info".
 *
 * @property integer $basic_info_id
 * @property string $first_name
 * @property string $last_name
 * @property string $DOB
 * @property string $gender
 * @property string $country
 * @property integer $mobile_no
 * @property string $corr_address
 * @property string $permanent_address
 * @property string $website
 * @property string $hobbies
 * @property string $marital_status
 * @property integer $status
 * @property integer $batch
 * @property string $first_login_date
 * @property string $last_profile_update_date
 */
class BasicInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'basic_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name','last_name','DOB', 'gender', 'country', 'mobile_no', 'corr_address', 'permanent_address', 'marital_status', 'status','batch', 'first_login_date', 'last_profile_update_date'], 'required'],
            [['mobile_no'], 'integer'],
            [['first_login_date', 'last_profile_update_date'], 'safe'],
            [['DOB'], 'string', 'max' => 15],
            [['gender', 'marital_status','status'], 'string', 'max'=>100 ],
            [['country'], 'string'],
            [['file'],'file'],
            [['profile_pic_path'],'string','max'=>200],
            [['batch'],'integer', 'message'=>'Enter your batch or your passing year'],
            [['first_name','last_name'],'string','max'=>20],
            [['corr_address', 'permanent_address'], 'string', 'max' => 100],
            [['website'], 'string', 'max' => 40],
            [['hobbies'], 'string', 'max' => 50],
            [['contact'],'required','on'=>'update'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'basic_info_id' => 'Basic Info ID',
            'first_name'=>'First Name',
            'last_name'=>'Last Name',
            'DOB' => 'Date of Birth',
            'gender' => 'Gender',
            'country' => 'Country',
            'mobile_no' => 'Mobile No',
            'corr_address' => 'Correspondance Address',
            'permanent_address' => 'Permanent Address',
            'website' => 'Website',
            'hobbies' => 'Hobbies',
            'batch'=>'Batch',
            'marital_status' => 'Marital Status',
            'status' => ' Relationship with KJSIEIT',
            'first_login_date' => 'First Login Date',
            'last_profile_update_date' => 'Last Profile Update Date',
            'file'=>'Upload your profile picture',
        ];
    }
}
