<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banding_alternatif}}`.
 */
class m200726_161301_create_banding_alternatif_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banding_alternatif}}', [
            'id' => $this->primaryKey(),
            'id_kriteria' => $this->integer(),
            'id_alternatif_kiri' => $this->integer(),
            'id_alternatif_kanan' => $this->integer(),
            'value' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banding_alternatif}}');
    }
}
