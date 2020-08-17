<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "biodata_to_jurusan".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_jurusan
 */
class BiodataToJurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata_to_jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_jurusan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_jurusan' => 'Id jurusan',
        ];
    }
}
