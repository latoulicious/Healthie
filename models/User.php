<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $role;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'role' => 'admin', // Assign "admin" role
        ],
        '101' => [
            'id' => '101',
            'username' => 'pegawai',
            'password' => 'pegawai',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
            'role' => 'pegawai', // Assign "pegawai" role
        ],
        '102' => [
            'id' => '102',
            'username' => 'pasien',
            'password' => 'pasien',
            'authKey' => 'test102key',
            'accessToken' => '102-token',
            'role' => 'pasien', // Assign "pasien" role
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // For development purposes, you can comment out this method if not using access tokens.
        // You can also implement a basic search by access token in your hardcoded data.
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                $userObject = new static($user);
                // Assign a role based on username for development purposes (optional)
                $userObject->role = $userObject->username === 'admin' ? 'admin' : 'pegawai';
                return $userObject;
            }
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
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
        return $this->password === $password;
    }
}
