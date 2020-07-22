<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nilai_pasangan_alternatif}}`.
 */
class m200720_160406_create_nilai_pasangan_alternatif_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nilai_pasangan_alternatif}}', [
            'id' => $this->primaryKey(),
            'id_alternatif' => $this->integer(),
            'id_kriteria_kiri' => $this->integer(),
            'id_kriteria_kanan' => $this->integer(),
            'value' => $this->string(),       
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nilai_pasangan_alternatif}}');
    }
}
