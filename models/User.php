<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $dateOfBirth
 * @property integer $saveCard
 * @property string $password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function getReview(){
        return $this->hasMany(Review::tableName(),['idUser'=>'id']);
    }
    public function getReservation(){
        return $this->hasMany(Reservation::tableName(),['idUser'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['dateOfBirth'], 'safe'],
            [['saveCard'], 'integer'],
            [['username', 'name', 'surname', 'password'], 'string', 'max' => 25],
            [['phone'], 'string', 'max' => 20],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'dateOfBirth' => 'Date Of Birth',
            'saveCard' => 'Save Card',
            'password' => 'Password',
        ];
    }
}
