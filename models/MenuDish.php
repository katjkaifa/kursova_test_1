<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_dish".
 *
 * @property integer $id
 * @property integer $idMenu
 * @property integer $idDish
 * @property string $price
 * @property double $weight
 */
class MenuDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_dish';
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'idMenu']);
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
            [['idMenu', 'idDish', 'price'], 'required'],
            [['idMenu', 'idDish'], 'integer'],
            [['price', 'weight'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idMenu' => 'Id Menu',
            'idDish' => 'Id Dish',
            'price' => 'Price',
            'weight' => 'Weight',
        ];
    }
}
