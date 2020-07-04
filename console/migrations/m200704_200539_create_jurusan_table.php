<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jurusan}}`.
 */
class m200704_200539_create_jurusan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jurusan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jurusan}}');
    }
}
