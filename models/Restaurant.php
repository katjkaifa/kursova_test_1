<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property string $name
 * @property string $informationShort
 * @property string $informationLong
 * @property double $latitude
 * @property double $longtitude
 * @property string $street
 * @property string $houseNo
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    public function getPhotoGallery(){
        return $this->hasMany(PhotoGallery::className(),['idRestaurant'=>'id'] );
    }
    public function getDietaryRestriction(){
        return $this->hasMany(DietaryRestriction::className(),['idRestaurant'=>'id'] );
    }
    public function getReview(){
        return $this->hasMany(Review::className(),['idRestaurant'=>'id'] );
    }
    public function getReservation(){
        return $this->hasMany(Reservation::className(),['idRestaurant'=>'id'] );
    }
    public function getMenu(){
        return $this->hasMany(Menu::className(),['idRestaurant'=>'id'] );
    }
    public function getCuisine(){
        return $this->hasMany(Cuisine::className(),['idRestaurant'=>'id'] );
    }
    public function getEstablishmentType(){
        return $this->hasMany(EstablishmentType::className(),['idRestaurant'=>'id'] );
    }
    public function getPriceLevel(){
        return $this->hasMany(PriceLevel::className(),['idRestaurant'=>'id'] );
    }
    public function getGoodFor(){
        return $this->hasMany(GoodFor::className(),['idRestaurant'=>'id'] );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'informationShort'], 'required'],
            [['informationShort', 'informationLong'], 'string'],
            [['latitude', 'longtitude'], 'number'],
            [['name', 'street'], 'string', 'max' => 30],
            [['houseNo'], 'string', 'max' => 5],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва ресторану',
            'informationShort' => 'Короткий опис',
            'informationLong' => 'Довгий опис',
            'latitude' => 'Широта',
            'longtitude' => 'Довгота',
            'street' => 'Вулицця',
            'houseNo' => 'Номер будинку'
        ];
    }
}
