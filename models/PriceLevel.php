<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "priceLevel".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idRestaurant
 */
class PriceLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'priceLevel';
    }

    public function getRestaurant(){
        return $this->hasOne(Restaurant::className(),['id'=>'idRestaurant'] );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'idRestaurant'], 'required'],
            [['idRestaurant'], 'integer'],
            [['name'], 'string', 'max' => 20],
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
            'idRestaurant' => 'Id Restaurant',
        ];
    }
}
