<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matriks_perbandingan_berpasangan".
 *
 * @property int $id
 * @property int|null $id_alternatif
 * @property int|null $id_kriteria
 * @property string|null $pasangan
 */
class MatriksPerbandinganBerpasangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matriks_perbandingan_berpasangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alternatif', 'id_kriteria'], 'integer'],
            [['pasangan'], 'string', 'max' => 255],
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
            'id_kriteria' => 'Id Kriteria',
            'pasangan' => 'Pasangan',
        ];
    }
}
