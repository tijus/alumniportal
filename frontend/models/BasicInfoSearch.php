<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BasicInfo;

/**
 * BasicInfoSearch represents the model behind the search form about `frontend\models\BasicInfo`.
 */
class BasicInfoSearch extends BasicInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['basic_info_id', 'mobile_no', 'status'], 'integer'],
            [['first_name','last_name','DOB', 'gender', 'country', 'corr_address', 'permanent_address', 'website', 'hobbies', 'marital_status', 'first_login_date', 'last_profile_update_date', 'profile_pic'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BasicInfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'basic_info_id' => $this->basic_info_id,
            'mobile_no' => $this->mobile_no,
            'status' => $this->status,
            'first_login_date' => $this->first_login_date,
            'last_profile_update_date' => $this->last_profile_update_date,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'DOB', $this->DOB])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'corr_address', $this->corr_address])
            ->andFilterWhere(['like', 'permanent_address', $this->permanent_address])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'hobbies', $this->hobbies])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'profile_pic', $this->profile_pic]);

        return $dataProvider;
    }
}
