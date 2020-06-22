<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attributes}}`.
 */
class m200622_164451_create_attributes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%attributes}}', [
            'id' => $this->primaryKey(),
            'attribute_name' => $this->string(255),
        ]);

        $this->insert('attributes', [
            'attribute_name' => 'Pendidikan',
        ]);
        $this->insert('attributes', [
            'attribute_name' => 'IPK',
        ]);
        $this->insert('attributes', [
            'attribute_name' => 'Pengalaman Kerja',
        ]);
        $this->insert('attributes', [
            'attribute_name' => 'Umur',
        ]);
        $this->insert('attributes', [
            'attribute_name' => 'Psikotes',
        ]);
        $this->insert('attributes', [
            'attribute_name' => 'IQ',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attributes}}');
    }
}
