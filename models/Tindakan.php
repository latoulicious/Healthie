<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $tindakan_id
 * @property string $nama_tindakan
 * @property int $transaksi_id
 *
 * @property Obat[] $obats
 * @property Transaksi $transaksi
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tindakan', 'transaksi_id'], 'required'],
            [['transaksi_id'], 'default', 'value' => null],
            [['transaksi_id'], 'integer'],
            [['nama_tindakan'], 'string', 'max' => 255],
            [['transaksi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::class, 'targetAttribute' => ['transaksi_id' => 'transaksi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tindakan_id' => 'Tindakan ID',
            'nama_tindakan' => 'Nama Tindakan',
            'transaksi_id' => 'Transaksi ID',
        ];
    }

    /**
     * Gets query for [[Obats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObats()
    {
        return $this->hasMany(Obat::class, ['tindakan_id' => 'tindakan_id']);
    }

    /**
     * Gets query for [[Transaksi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::class, ['transaksi_id' => 'transaksi_id']);
    }
}
