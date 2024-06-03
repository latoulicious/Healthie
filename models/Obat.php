<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $obat_id
 * @property string $nama_obat
 * @property int $tindakan_id
 *
 * @property Tindakan $tindakan
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
            [['nama_obat', 'tindakan_id'], 'required'],
            [['tindakan_id'], 'default', 'value' => null],
            [['tindakan_id'], 'integer'],
            [['nama_obat'], 'string', 'max' => 255],
            [['tindakan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'tindakan_id']],
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
            'tindakan_id' => 'Tindakan ID',
        ];
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['tindakan_id' => 'tindakan_id']);
    }
}
