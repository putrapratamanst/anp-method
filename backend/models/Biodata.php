<?php

namespace backend\models;

use frontend\models\Berkas;
use Yii;

/**
 * This is the model class for table "biodata".
 *
 * @property int $id
 * @property string|null $nama_lengkap
 * @property string|null $nip
 * @property int|null $user_id
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $pendidikan
 * @property string|null $pangkat
 * @property string|null $position
 * @property string|null $work_unit
 * @property int|null $jabatan
 * @property int|null $prodi
 * @property int|null $jurusan
 */
class Biodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'jabatan', 'prodi', 'jurusan'], 'integer'],
            [['nama_lengkap', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pendidikan', 'pangkat', 'position', 'work_unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'nip' => 'Nip',
            'user_id' => 'User ID',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'pendidikan' => 'Pendidikan',
            'pangkat' => 'Pangkat',
            'position' => 'Position',
            'work_unit' => 'Work Unit',
            'jabatan' => 'Jabatan',
            'prodi' => 'Prodi',
            'jurusan' => 'Jurusan',
        ];
    }

    public function getBerkas()
    {
        return $this->hasOne(Berkas::className(), ['biodata_id' => 'id']);
    }

    public function getJurusans()
    {
        return $this->hasOne(Jurusan::className(), ['id' => 'jurusan']);
    }
    public function getProdis()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'prodi']);
    }
    public function getJabatans()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'jabatan']);
    }
}
