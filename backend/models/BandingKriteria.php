<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banding_kriteria".
 *
 * @property int $id
 * @property int|null $id_alternatif
 * @property int|null $id_kriteria_kiri
 * @property int|null $id_kriteria_kanan
 * @property string|null $value
 */
class BandingKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banding_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alternatif', 'id_kriteria_kiri', 'id_kriteria_kanan', 'value'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alternatif' => 'Id Alternatif',
            'id_kriteria_kiri' => 'Id Kriteria Kiri',
            'id_kriteria_kanan' => 'Id Kriteria Kanan',
            'value' => 'Value',
        ];
    }
}
