<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "eigen".
 *
 * @property int $id
 * @property int|null $id_alternatif_kriteria
 * @property int|null $eigen
 * @property string|null $type
 */
class Eigen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eigen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 255],
            [['id_alternatif_kriteria','id_penampung'], 'integer'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alternatif_kriteria' => 'Id Alternatif Kriteria',
            'eigen' => 'Eigen',
            'type' => 'Type',
        ];
    }
}
