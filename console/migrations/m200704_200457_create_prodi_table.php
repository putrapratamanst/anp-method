<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prodi}}`.
 */
class m200704_200457_create_prodi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prodi}}', [
            'id' => $this->primaryKey(),
            'kode_prodi' => $this->string(255),
            'nama_prodi' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prodi}}');
    }
}
