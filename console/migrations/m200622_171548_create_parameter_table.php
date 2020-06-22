<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%parameter}}`.
 */
class m200622_171548_create_parameter_table extends Migration
{
    /**
     * {@inheritdoc}
     * 
     * ini untuk pembobotan
     */
    public function safeUp()
    {
        $this->createTable('{{%parameter}}', [
            'id' => $this->primaryKey(),
            'id_attribute' => $this->integer(10),
            'value' => $this->integer(10),
            'parameter_name' => $this->string(255),

        ]);

        // PENDIDIKAN
        $this->insert('parameter', [
            'id_attribute' => '1',
            'value' => '1',
            'parameter_name' => 'D3',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '1',
            'value' => '2',
            'parameter_name' => 'S1',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '1',
            'value' => '3',
            'parameter_name' => 'S2',
        ]);

        // IPK
        $this->insert('parameter', [
            'id_attribute' => '2',
            'value' => '1',
            'parameter_name' => '2 - 2,75',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '2',
            'value' => '2',
            'parameter_name' => '2,76 - 3,5',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '2',
            'value' => '3',
            'parameter_name' => '3,6 - 4',
        ]);

        // Pengalaman Kerja
        $this->insert('parameter', [
            'id_attribute' => '3',
            'value' => '1',
            'parameter_name' => 'Tidak Memilik Pengalaman',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '3',
            'value' => '2',
            'parameter_name' => 'Pengalaman Kurang Dari Satu Tahun',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '3',
            'value' => '3',
            'parameter_name' => 'Pengalaman Lebih Dari Satu Tahun',
        ]);

        // Umur
        $this->insert('parameter', [
            'id_attribute' => '4',
            'value' => '1',
            'parameter_name' => '19 - 24',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '4',
            'value' => '2',
            'parameter_name' => '25 - 30',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '4',
            'value' => '3',
            'parameter_name' => '31 - 35',
        ]);


        // PSIKOTES
        $this->insert('parameter', [
            'id_attribute' => '5',
            'value' => '1',
            'parameter_name' => 'Kurang Dari Sama Dengan 50',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '5',
            'value' => '2',
            'parameter_name' => 'Lebih Dari Sama Dengan 50',
        ]);


        // IQ
        $this->insert('parameter', [
            'id_attribute' => '6',
            'value' => '1',
            'parameter_name' => 'Kurang Dari Sama Dengan 109',
        ]);
        $this->insert('parameter', [
            'id_attribute' => '6',
            'value' => '2',
            'parameter_name' => 'Lebih Dari Sama Dengan 110',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%parameter}}');
    }
}
