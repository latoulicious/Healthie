<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $pasien_id
 * @property string $nama_lengkap
 * @property string|null $nik
 * @property string|null $tanggal_lahir
 * @property string|null $alamat
 * @property string|null $no_telepon
 * @property string|null $riwayat_kesehatan
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap'], 'required'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['alamat', 'riwayat_kesehatan'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 255],
            [['nik', 'no_telepon'], 'string', 'max' => 20],
            [['nik'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pasien_id' => 'Pasien ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'Nik',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'riwayat_kesehatan' => 'Riwayat Kesehatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
