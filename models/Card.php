<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property integer $id
 * @property integer $userId
 * @property integer $cardNumber
 * @property integer $month
 * @property integer $year
 * @property integer $securityCode
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'cardNumber', 'month', 'year', 'securityCode'], 'required'],
            [['userId', 'cardNumber', 'month', 'year', 'securityCode'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'cardNumber' => 'Card Number',
            'month' => 'Month',
            'year' => 'Year',
            'securityCode' => 'Security Code',
        ];
    }
}
