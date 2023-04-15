<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "BackendUser".
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
class BackendUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BackendUser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firstName', 'lastName', 'username', 'contactNumber', 'email', 'password', 'authKey'], 'required'],
            [['contactNumber'], 'integer'],
            [['id', 'email', 'password'], 'string', 'max' => 11],
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
    public function getAuthKey(){
        return $this->authKey;

    }
    public function getId(){
        return $this->id;
    }
    public function validateAuthKey($authKey){
        return $this->authKey===$authKey;

    }
    public static function findIdentity ($id){
        return self::findOne($id);

    }
    public static function findIdentityByAccessToken($token, $type=null){
        throw new NotSupportedException();
    }
    public static function findByUsername ($username){
        return self::findOne(['username'=>$username]);
    }
    public function validatePassword($password){
        return $this->password===$password;
    }
}
