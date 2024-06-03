<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $pegawai_id
 * @property string $nama_pegawai
 * @property int $wilayah_id
 *
 * @property Transaksi[] $transaksis
 * @property Wilayah $wilayah
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pegawai', 'wilayah_id'], 'required'],
            [['wilayah_id'], 'default', 'value' => null],
            [['wilayah_id'], 'integer'],
            [['nama_pegawai'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'wilayah_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'nama_pegawai' => 'Nama Pegawai',
            'wilayah_id' => 'Wilayah ID',
        ];
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['pegawai_id' => 'pegawai_id']);
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
