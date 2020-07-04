<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jabatan}}`.
 */
class m200704_200610_create_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jabatan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jabatan}}');
    }
}
