<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biodata_to_jurusan}}`.
 */
class m200817_051432_create_biodata_to_jurusan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biodata_to_jurusan}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_jurusan' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%biodata_to_jurusan}}');
    }
}
