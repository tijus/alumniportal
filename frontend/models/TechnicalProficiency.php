<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "technical_proficiency".
 *
 * @property integer $tech_prof_id
 * @property string $skill
 * @property integer $level
 */
class TechnicalProficiency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technical_proficiency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill', 'level'], 'required'],
            [['level'], 'string','max'=>20],
            [['skill'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tech_prof_id' => 'Tech Prof ID',
            'skill' => 'Skill',
            'level' => 'Level',
        ];
    }
}
