<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kriteria".
 *
 * @property int $id
 * @property string|null $kriteria
 */
class Kriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kriteria'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria' => 'Kriteria',
        ];
    }
}
