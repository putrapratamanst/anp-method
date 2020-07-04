<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%biodata}}`.
 */
class m200704_200056_create_biodata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%biodata}}', [
            'id' => $this->primaryKey(),
            'nama_lengkap' => $this->string(255),
            'nip' => $this->string(255),
            'user_id' => $this->integer(),
            'tempat_lahir' => $this->string(255),
            'tanggal_lahir' => $this->string(255),
            'jenis_kelamin' => $this->string(255),
            'pendidikan' => $this->string(255),
            'pangkat' => $this->string(255),
            'position' => $this->string(255),
            'work_unit' => $this->string(255),
            'jabatan' => $this->integer(255),
            'prodi' => $this->integer(255),
            'jurusan' => $this->integer(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%biodata}}');
    }
}
