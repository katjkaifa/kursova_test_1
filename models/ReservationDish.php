<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation_dish".
 *
 * @property integer $id
 * @property integer $idReservation
 * @property integer $idDish
 * @property string $speciality
 */
class ReservationDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation_dish';
    }

    public function getReservation(){
        return $this->hasOne(Reservation::className(), ['id' => 'idReservation']);
    }
    public function getDish(){
        return $this->hasOne(Dish::className(), ['id' => 'idDish']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idReservation', 'idDish'], 'required'],
            [['idReservation', 'idDish'], 'integer'],
            [['speciality'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idReservation' => 'Id Reservation',
            'idDish' => 'Id Dish',
            'speciality' => 'Speciality',
        ];
    }
}
