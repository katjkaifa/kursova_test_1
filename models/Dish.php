<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish';
    }

    public function getMenuDish(){
        return $this->hasMany(MenuDish::className(), ['idDish'=>'id']);
    }
    public function getReservationDish(){
        return $this->hasMany(ReservationDish::className(), ['idDish'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
