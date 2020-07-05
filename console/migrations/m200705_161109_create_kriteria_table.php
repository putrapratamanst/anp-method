<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kriteria}}`.
 */
class m200705_161109_create_kriteria_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kriteria}}', [
            'id' => $this->primaryKey(),
            'kriteria' => $this->string(255),
        ]);

        $this->insert('kriteria', [
            'kriteria' => "Pendidikan dan Pengajaran",
        ]);

        $this->insert('kriteria', [
            'kriteria' => "Penelitian",
        ]);

        $this->insert('kriteria', [
            'kriteria' => "Pengabdian Pada Masyarakat",
        ]);

        $this->insert('kriteria', [
            'kriteria' => "Penunjang Tri Dharma Perguruan Tinggi",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kriteria}}');
    }
}
