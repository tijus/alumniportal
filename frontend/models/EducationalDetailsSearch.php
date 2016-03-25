<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EducationalDetails;

/**
 * EducationalDetailsSearch represents the model behind the search form about `frontend\models\EducationalDetails`.
 */
class EducationalDetailsSearch extends EducationalDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_det_id'], 'integer'],
            [['degree', 'grade', 'stream'], 'safe'],
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
        $query = EducationalDetails::find();

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
            'edu_det_id' => $this->edu_det_id,
        ]);

        $query->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'stream', $this->stream]);

        return $dataProvider;
    }
}
