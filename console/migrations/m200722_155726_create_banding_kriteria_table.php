<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banding_kriteria}}`.
 */
class m200722_155726_create_banding_kriteria_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banding_kriteria}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banding_kriteria}}');
    }
}
