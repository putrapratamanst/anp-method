<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banding_alternatif".
 *
 * @property int $id
 * @property int|null $id_kriteria
 * @property int|null $id_alternatif_kiri
 * @property int|null $id_alternatif_kanan
 * @property string|null $value
 */
class BandingAlternatif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banding_alternatif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kriteria', 'id_alternatif_kiri', 'id_alternatif_kanan'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kriteria' => 'Id Kriteria',
            'id_alternatif_kiri' => 'Id Alternatif Kiri',
            'id_alternatif_kanan' => 'Id Alternatif Kanan',
            'value' => 'Value',
        ];
    }
}
