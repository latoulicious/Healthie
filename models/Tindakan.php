<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $tindakan_id
 * @property string $nama_tindakan
 * @property string|null $deskripsi
 * @property float $biaya
 * @property string|null $created_at
 * @property string|null $updated_at
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
            [['nama_tindakan', 'biaya'], 'required'],
            [['deskripsi'], 'string'],
            [['biaya'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_tindakan'], 'string', 'max' => 255],
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
            'deskripsi' => 'Deskripsi',
            'biaya' => 'Biaya',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
