<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backenduser".
 *
 * @property string $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property int $contactNumber
 * @property string $email
 * @property string $password
 * @property string $authKey
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backenduser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firstName', 'lastName', 'username', 'contactNumber', 'email', 'password', 'authKey'], 'required'],
            [['contactNumber'], 'integer'],
            [['id', 'email', 'password'], 'string', 'max' => 20],
            [['firstName', 'lastName', 'username', 'authKey'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'contactNumber' => 'Contact Number',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }
}
