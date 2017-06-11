<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
use backend\models\UserData;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $avatar
 * @property integer $role_id
 * @property string $auth_key
 * @property integer $blocked_at
 * @property integer $status
 */
class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'blocked_at', 'status'], 'integer'],
            [['username', 'password', 'avatar', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * get UserData object of current user
     */
    public function getData()
    {
        return $this->hasOne(UserData::className(), ['user_id' => 'id']); 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'avatar' => 'Avatar',
            'role_id' => 'Role ID',
            'auth_key' => 'Auth Key',
            'blocked_at' => 'Blocked At',
            'status' => 'Status',
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
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
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
