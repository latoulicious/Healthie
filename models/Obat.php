<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $obat_id
 * @property string $nama_obat
 * @property string $kategori
 * @property string $bentuk
 * @property string $satuan
 * @property int $stok
 * @property float $harga_beli
 * @property float $harga_jual
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_obat', 'kategori', 'bentuk', 'satuan', 'harga_beli', 'harga_jual'], 'required'],
            [['stok'], 'default', 'value' => null],
            [['stok'], 'integer'],
            [['harga_beli', 'harga_jual'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_obat'], 'string', 'max' => 255],
            [['kategori', 'bentuk'], 'string', 'max' => 50],
            [['satuan'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'obat_id' => 'Obat ID',
            'nama_obat' => 'Nama Obat',
            'kategori' => 'Kategori',
            'bentuk' => 'Bentuk',
            'satuan' => 'Satuan',
            'stok' => 'Stok',
            'harga_beli' => 'Harga Beli',
            'harga_jual' => 'Harga Jual',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
