<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $pegawai_id
 * @property string $nama_lengkap
 * @property string $nip
 * @property string $jabatan
 * @property string $departemen
 * @property string|null $alamat
 * @property string|null $no_telepon
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
            [['nama_lengkap', 'nip', 'jabatan', 'departemen'], 'required'],
            [['alamat'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 255],
            [['nip', 'no_telepon'], 'string', 'max' => 20],
            [['jabatan', 'departemen'], 'string', 'max' => 50],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nip' => 'Nip',
            'jabatan' => 'Jabatan',
            'departemen' => 'Departemen',
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
        ];
    }
}
