<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photoGallery".
 *
 * @property integer $id
 * @property integer $idRestaurant
 * @property string $photoPath
 */
class PhotoGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photoGallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRestaurant'], 'required'],
            [['idRestaurant'], 'integer'],
            [['photoPath'], 'string', 'max' => 256],
        ];
    }

    public function getRestaurant(){
        return $this->hasOne(Restaurant::className(),['id'=>'idRestaurant'] );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idRestaurant' => 'Id Restaurant',
            'photoPath' => 'Photo Path',
        ];
    }
}
