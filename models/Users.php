<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $nama_user
 * @property int $wilayah_id
 * @property string|null $tanggal_lahir
 *
 * @property Wilayah $wilayah
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_user', 'wilayah_id'], 'required'],
            [['wilayah_id'], 'default', 'value' => null],
            [['wilayah_id'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama_user'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'wilayah_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'nama_user' => 'Nama User',
            'wilayah_id' => 'Wilayah ID',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['wilayah_id' => 'wilayah_id']);
    }
}
