<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "establishmentType".
 *
 * @property integer $id
 * @property string $name
 * @property integer $idRestaurant
 */
class EstablishmentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'establishmentType';
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
