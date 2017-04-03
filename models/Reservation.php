<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $id
 * @property integer $idRestaurant
 * @property integer $idUser
 * @property string $creationDate
 * @property string $reservationDate
 * @property integer $peopleQuantity
 * @property string $speciality
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }
    public function getRestaurant(){
        return $this->hasOne(Restaurant::className(),['id'=>'idRestaurant'] );
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'idUser'] );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRestaurant', 'idUser', 'creationDate', 'reservationDate', 'peopleQuantity'], 'required'],
            [['idRestaurant', 'idUser', 'peopleQuantity'], 'integer'],
            [['creationDate', 'reservationDate'], 'safe'],
            [['speciality'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idRestaurant' => 'Id Restaurant',
            'idUser' => 'Id User',
            'creationDate' => 'Creation Date',
            'reservationDate' => 'Reservation Date',
            'peopleQuantity' => 'People Quantity',
            'speciality' => 'Speciality',
        ];
    }
}
