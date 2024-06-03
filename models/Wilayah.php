<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $wilayah_id
 * @property string $nama_wilayah
 *
 * @property Pegawai[] $pegawais
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_wilayah'], 'required'],
            [['nama_wilayah'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wilayah_id' => 'Wilayah ID',
            'nama_wilayah' => 'Nama Wilayah',
        ];
    }

    /**
     * Gets query for [[Pegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::class, ['wilayah_id' => 'wilayah_id']);
    }
}
