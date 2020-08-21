<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%anp_hasil}}`.
 */
class m200821_083124_create_anp_hasil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%anp_hasil}}', [
            'id_hasil' => $this->primaryKey(),
            'id_alternatif_periode' => $this->integer(),
            'nilai' => $this->string(),
            'nilai_normal' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%anp_hasil}}');
    }
}
