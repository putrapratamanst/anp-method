<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%anp_nilai_limit_s}}`.
 */
class m200821_074922_create_anp_nilai_limit_s_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%anp_nilai_limit_s}}', [
            'id_nilai_limit' => $this->primaryKey(),
            'tipe' => $this->integer(),
            'id_node_0' => $this->integer(),
            'id_node' => $this->integer(),
            'nilai' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%anp_nilai_limit_s}}');
    }
}
