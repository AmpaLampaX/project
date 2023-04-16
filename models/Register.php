<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property int $id
 * @property int $Name
 * @property int $Contact_nm
 * @property int $email
 * @property int $password
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Name', 'Contact_nm', 'email', 'password'], 'required'],
            [['id', 'Name', 'Contact_nm', 'email', 'password'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'Contact_nm' => 'Contact Nm',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
