<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $wilayah_id
 * @property string $nama_wilayah
 * @property string|null $kode_pos
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
            [['kode_pos'], 'string', 'max' => 10],
            [['kode_pos'], 'unique'],
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
            'kode_pos' => 'Kode Pos',
        ];
    }
}
