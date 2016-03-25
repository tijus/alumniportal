<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Achievements;

/**
 * AchievementsSearch represents the model behind the search form about `frontend\models\Achievements`.
 */
class AchievementsSearch extends Achievements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['achievement_id'], 'integer'],
            [['title', 'level', 'description'], 'safe'],
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
        $query = Achievements::find();

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
            'achievement_id' => $this->achievement_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
