<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $idRestaurant
 * @property string $name
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
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
            [['idRestaurant', 'name'], 'required'],
            [['idRestaurant'], 'integer'],
            [['name'], 'string', 'max' => 30],
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
            'name' => 'Name',
        ];
    }
}
