<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property integer $idRestaurant
 * @property integer $idUser
 * @property string $time
 * @property string $textReview
 * @property string $ratingGlobal
 * @property string $ratingFood
 * @property string $ratingAmbiance
 * @property string $ratingService
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'review';
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
            [['idRestaurant', 'idUser', 'time', 'textReview'], 'required'],
            [['idRestaurant', 'idUser'], 'integer'],
            [['time'], 'safe'],
            [['textReview', 'ratingGlobal', 'ratingFood', 'ratingAmbiance', 'ratingService'], 'string'],
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
            'time' => 'Time',
            'textReview' => 'Text Review',
            'ratingGlobal' => 'Rating Global',
            'ratingFood' => 'Rating Food',
            'ratingAmbiance' => 'Rating Ambiance',
            'ratingService' => 'Rating Service',
        ];
    }
}
