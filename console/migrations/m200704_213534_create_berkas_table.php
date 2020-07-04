<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%berkas}}`.
 */
class m200704_213534_create_berkas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%berkas}}', [
            'id' => $this->primaryKey(),
            'biodata_id' => $this->integer(),
            'nama_berkas1' => $this->string(255),
            'alamat_berkas1' => $this->string(255),
            'nama_berkas2' => $this->string(255),
            'alamat_berkas2' => $this->string(255),
            'nama_berkas3' => $this->string(255),
            'alamat_berkas3' => $this->string(255),
            'nama_berkas4' => $this->string(255),
            'alamat_berkas4' => $this->string(255),

            'nama_berkas5' => $this->string(255),
            'alamat_berkas5' => $this->string(255),

            'nama_berkas6' => $this->string(255),
            'alamat_berkas6' => $this->string(255),

            'nama_berkas7' => $this->string(255),
            'alamat_berkas7' => $this->string(255),

            'nama_berkas8' => $this->string(255),
            'alamat_berkas8' => $this->string(255),

            'nama_berkas9' => $this->string(255),
            'alamat_berkas9' => $this->string(255),

            'nama_berkas10' => $this->string(255),
            'alamat_berkas10' => $this->string(255),

            'nama_berkas11' => $this->string(255),
            'alamat_berkas11' => $this->string(255),

            'nama_berkas12' => $this->string(255),
            'alamat_berkas12' => $this->string(255),

            'nama_berkas13' => $this->string(255),
            'alamat_berkas13' => $this->string(255),

            'nama_berkas14' => $this->string(255),
            'alamat_berkas14' => $this->string(255),

            'nama_berkas15' => $this->string(255),
            'alamat_berkas15' => $this->string(255),

            'nama_berkas16' => $this->string(255),
            'alamat_berkas16' => $this->string(255),

            'nama_berkas17' => $this->string(255),
            'alamat_berkas17' => $this->string(255),

            'nama_berkas18' => $this->string(255),
            'alamat_berkas18' => $this->string(255),

            'nama_berkas19' => $this->string(255),
            'alamat_berkas19' => $this->string(255),

            'nama_berkas20' => $this->string(255),
            'alamat_berkas20' => $this->string(255),

            'nama_berkas21' => $this->string(255),
            'alamat_berkas21' => $this->string(255),

            'nama_berkas22' => $this->string(255),
            'alamat_berkas22' => $this->string(255),

            'nama_berkas23' => $this->string(255),
            'alamat_berkas23' => $this->string(255),

            'nama_berkas24' => $this->string(255),
            'alamat_berkas24' => $this->string(255),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%berkas}}');
    }
}
