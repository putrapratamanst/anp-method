<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%matriks_perbandingan_berpasangan_alternatif}}`.
 */
class m200726_161139_create_matriks_perbandingan_berpasangan_alternatif_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%matriks_perbandingan_berpasangan_alternatif}}', [
            'id' => $this->primaryKey(),
            'id_kriteria' => $this->integer(),
            'id_alternatif_kiri' => $this->integer(),
            'id_alternatif_kanan' => $this->integer(),
            'value' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%matriks_perbandingan_berpasangan_alternatif}}');
    }
}
