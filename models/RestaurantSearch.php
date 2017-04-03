<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form about `app\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'photoGalleryId', 'establishmentTypeId', 'cuisineId', 'dietaryRestrictionsId', 'priceLevelId', 'goodForId'], 'integer'],
            [['name', 'informationShort', 'informationLong', 'street', 'houseNo'], 'safe'],
            [['latitude', 'longtitude'], 'number'],
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
        $query = Restaurant::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longtitude' => $this->longtitude,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'informationShort', $this->informationShort])
            ->andFilterWhere(['like', 'informationLong', $this->informationLong])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'houseNo', $this->houseNo]);

        return $dataProvider;
    }
}
