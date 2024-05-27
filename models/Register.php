<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

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
class Register extends ActiveRecord implements IdentityInterface
{
    public $photoFile;

    public static function tableName()
    {
        return 'Register';
    }

    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'contactNumber', 'email', 'password'], 'required'],
            [['contactNumber'], 'integer'],
            [['id', 'email', 'password'], 'string', 'max' => 20],
            [['firstName', 'lastName', 'username', 'authKey'], 'string', 'max' => 20],
            [['id'], 'unique'],
            ['username', 'unique', 'message' => 'This username has already been taken.'],
            ['email', 'email', 'message' => 'Please enter a valid email address.'],
            ['email', 'match', 'pattern' => '/@fesb\\.hr$/', 'message' => 'It is necessary to enter the official email of the faculty where you are studying.'],
            ['password', 'string', 'min' => 8, 'message' => 'Password must be at least 8 characters long.'],
            ['password', 'match', 'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', 'message' => 'Password must include at least one lowercase letter, one uppercase letter, one number, and one special character.'],
            [['photoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 1], // Make optional
        ];
    }

    public function getIsAdmin()
    {
        return $this->isAdmin == 1; // Returns true if isAdmin is 1
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Hash the password and generate authKey only when the record is new or the password has changed
            if ($this->isNewRecord || $this->isAttributeChanged('password')) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
                $this->authKey = Yii::$app->security->generateRandomString();
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

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
