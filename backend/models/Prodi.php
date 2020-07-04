<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string|null $kode_prodi
 * @property string|null $nama_prodi
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_prodi', 'nama_prodi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_prodi' => 'Kode Prodi',
            'nama_prodi' => 'Nama Prodi',
        ];
    }
}
