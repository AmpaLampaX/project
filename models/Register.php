<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property string $id
 * @property string $Name
 * @property int $Contact_nm
 * @property string $email
 * @property string $password
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
            [['Contact_nm'], 'integer'],
            [['id', 'Name', 'email', 'password'], 'string', 'max' => 11],
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
            'Name' => 'Name',
            'Contact_nm' => 'Contact Nm',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
