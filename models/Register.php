<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Register".
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
class Register extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'contactNumber', 'email', 'password'], 'required'],
            [['contactNumber'], 'integer'],
            [['id', 'email', 'password'], 'string', 'max' => 20],
            [['firstName', 'lastName', 'username', 'authKey'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public $isAdmin;
    public function getIsAdmin()
    {
        return $this->isAdmin == 1; 
    }
    
//hash, authkey and accessToken
     public function beforeSave($insert)
     {
         if (parent::beforeSave($insert)) {
             // Hash the password and generate authKey only when the record is new or the password has changed
             if ($this->isNewRecord || $this->isAttributeChanged('password')) {
                 $this->password = Yii::$app->security->generatePasswordHash($this->password);
                 $this->authKey = Yii::$app->security->generateRandomString();
             }
             
             // Generate accessToken only when the record is new
             if ($this->isNewRecord) {
                 $this->accessToken = Yii::$app->security->generateRandomString(40); // Generate a longer string for access tokens
             }
             
             return true; // This should be the last statement in this block
         }
         return false;
     }
     
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
    public static function findIdentityByAccessToken($token, $type = null)
{
    return static::findOne(['accessToken' => $token]);
}

    public static function findByUsername ($username){
        return self::findOne(['username'=>$username]);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    
}
