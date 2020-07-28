<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%eigen}}`.
 */
class m200728_070454_create_eigen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%eigen}}', [
            'id' => $this->primaryKey(),
            'id_alternatif_kriteria' => $this->integer(),
            'id_penampung' => $this->integer(),
            'eigen' => $this->string(255),
            'type' => $this->string(255), // 1 kriteria, 2 alternatif

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%eigen}}');
    }
}
