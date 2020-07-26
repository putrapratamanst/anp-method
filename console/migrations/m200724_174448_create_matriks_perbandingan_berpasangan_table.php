<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%matriks_perbandingan_berpasangan}}`.
 */
//banding-kriteria
class m200724_174448_create_matriks_perbandingan_berpasangan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%matriks_perbandingan_berpasangan}}', [
            'id' => $this->primaryKey(),
            'id_alternatif' => $this->integer(),
            'id_kriteria_kiri' => $this->integer(),
            'id_kriteria_kanan' => $this->integer(),
            'value' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%matriks_perbandingan_berpasangan}}');
    }
}
