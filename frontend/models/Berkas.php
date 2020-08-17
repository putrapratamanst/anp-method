<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "berkas".
 *
 * @property int $id
 * @property int|null $biodata_id
 * @property string|null $nama_berkas1
 * @property string|null $alamat_berkas1
 * @property string|null $nama_berkas2
 * @property string|null $alamat_berkas2
 * @property string|null $nama_berkas3
 * @property string|null $alamat_berkas3
 * @property string|null $nama_berkas4
 * @property string|null $alamat_berkas4
 * @property string|null $nama_berkas5
 * @property string|null $alamat_berkas5
 * @property string|null $nama_berkas6
 * @property string|null $alamat_berkas6
 * @property string|null $nama_berkas7
 * @property string|null $alamat_berkas7
 * @property string|null $nama_berkas8
 * @property string|null $alamat_berkas8
 * @property string|null $nama_berkas9
 * @property string|null $alamat_berkas9
 * @property string|null $nama_berkas10
 * @property string|null $alamat_berkas10
 * @property string|null $nama_berkas11
 * @property string|null $alamat_berkas11
 * @property string|null $nama_berkas12
 * @property string|null $alamat_berkas12
 * @property string|null $nama_berkas13
 * @property string|null $alamat_berkas13
 * @property string|null $nama_berkas14
 * @property string|null $alamat_berkas14
 * @property string|null $nama_berkas15
 * @property string|null $alamat_berkas15
 * @property string|null $nama_berkas16
 * @property string|null $alamat_berkas16
 * @property string|null $nama_berkas17
 * @property string|null $alamat_berkas17
 * @property string|null $nama_berkas18
 * @property string|null $alamat_berkas18
 * @property string|null $nama_berkas19
 * @property string|null $alamat_berkas19
 * @property string|null $nama_berkas20
 * @property string|null $alamat_berkas20
 * @property string|null $nama_berkas21
 * @property string|null $alamat_berkas21
 * @property string|null $nama_berkas22
 * @property string|null $alamat_berkas22
 * @property string|null $nama_berkas23
 * @property string|null $alamat_berkas23
 * @property string|null $nama_berkas24
 * @property string|null $alamat_berkas24
 */
class Berkas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berkas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biodata_id'], 'integer'],
            // [['nama_berkas1', 'alamat_berkas1', 'nama_berkas2', 'alamat_berkas2', 'nama_berkas3', 'alamat_berkas3', 'nama_berkas4', 'alamat_berkas4', 'nama_berkas5', 'alamat_berkas5', 'nama_berkas6', 'alamat_berkas6', 'nama_berkas7', 'alamat_berkas7', 'nama_berkas8', 'alamat_berkas8', 'nama_berkas9', 'alamat_berkas9', 'nama_berkas10', 'alamat_berkas10', 'nama_berkas11', 'alamat_berkas11', 'nama_berkas12', 'alamat_berkas12', 'nama_berkas13', 'alamat_berkas13', 'nama_berkas14', 'alamat_berkas14', 'nama_berkas15', 'alamat_berkas15', 'nama_berkas16', 'alamat_berkas16', 'nama_berkas17', 'alamat_berkas17', 'nama_berkas18', 'alamat_berkas18', 'nama_berkas19', 'alamat_berkas19', 'nama_berkas20', 'alamat_berkas20', 'nama_berkas21', 'alamat_berkas21', 'nama_berkas22', 'alamat_berkas22', 'nama_berkas23', 'alamat_berkas23', 'nama_berkas24', 'alamat_berkas24'], 'string', 'max' => 255],
            [['nama_berkas5', 'nama_berkas6', 'nama_berkas7', 'nama_berkas8'], 'file', 'skipOnEmpty' => false,'extensions' => 'png, jpg, pdf', 'on'=>'create'],
            [['nama_berkas1', 'nama_berkas2', 'nama_berkas3', 'nama_berkas4', 'nama_berkas5', 'nama_berkas6', 'nama_berkas7', 'nama_berkas8', 'nama_berkas9', 'nama_berkas10',  'nama_berkas11',  'nama_berkas12',  'nama_berkas13',  'nama_berkas14',  'nama_berkas15',  'nama_berkas16',  'nama_berkas17',  'nama_berkas18',  'nama_berkas19',  'nama_berkas20',  'nama_berkas21',  'nama_berkas22',  'nama_berkas23',  'nama_berkas24', 'alamat_berkas24'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf', 'on' => 'update', 'checkExtensionByMimeType' => true ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'biodata_id' => 'Biodata ID',
            'nama_berkas1' => 'Surat Pengantar dari Pimpinan PTS (Rektor/Ketua/Direktur)',
            'alamat_berkas1' => 'Alamat Berkas1',
            'nama_berkas2' => 'SK Pengangkatan sebagai Dosen Tetap Yayasan',
            'alamat_berkas2' => 'Alamat Berkas2',
            'nama_berkas3' => 'Ijazah dan Transkrip S-1/D-4, S-2 serta S-3 (bagi yang telah memiliki) ',
            'alamat_berkas3' => 'Alamat Berkas3',
            'nama_berkas4' => 'Daftar Usul Penetapan Angka Kredit (DUPAK)',
            'alamat_berkas4' => 'Alamat Berkas4',
            'nama_berkas5' => 'Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A)',
            'alamat_berkas5' => 'Alamat Berkas5',
            'nama_berkas6' => 'Surat Pernyataan Melaksnakan Penelitian (Bidang B)',
            'alamat_berkas6' => 'Alamat Berkas6',
            'nama_berkas7' => 'Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C)',
            'alamat_berkas7' => 'Alamat Berkas7',
            'nama_berkas8' => 'Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D)',
            'alamat_berkas8' => 'Alamat Berkas8',
            'nama_berkas9' => 'Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik + Daftar Hadir',
            'alamat_berkas9' => 'Alamat Berkas9',
            'nama_berkas10' => '1 (Satu) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS',
            'alamat_berkas10' => 'Alamat Berkas10',
            'nama_berkas11' => 'Surat Pernyataan Keabsahan Karya Ilmiah yang ditandatangani Dosen ybs',
            'alamat_berkas11' => 'Alamat Berkas11',
            'nama_berkas12' => 'Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS',
            'alamat_berkas12' => 'Alamat Berkas12',
            'nama_berkas13' => 'Bukti Online Penelitian yang dipublikasikan pada Portal Jurnal/Perguruan Tinggi/Portal Kopertis/Portal Garuda DIKTI (bila ada)',
            'alamat_berkas13' => 'Alamat Berkas13',
            'nama_berkas14' => 'SK Jabatan Akademik Dosen, SK PAK dan SK Pangkat/Inpassing Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)',
            'alamat_berkas14' => 'Alamat Berkas14',
            'nama_berkas15' => 'SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/menyelesaikan studi lanjut)',
            'alamat_berkas15' => 'Alamat Berkas15',
            'nama_berkas16' => 'SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut  dengan status tugas belajar)',
            'alamat_berkas16' => 'Alamat Berkas16',
            'nama_berkas17' => 'SK Dosen PNS (bagi Dosen PNS dpk)',
            'alamat_berkas17' => 'Alamat Berkas17',
            'nama_berkas18' => 'Keputusan Kepala BKN tentang penetapan NIP baru (bagi dosen PNS dpk)',
            'alamat_berkas18' => 'Alamat Berkas18',
            'nama_berkas19' => 'Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT) (bagi dosen PNS dpk)',
            'alamat_berkas19' => 'Alamat Berkas19',
            'nama_berkas20' => 'Sertifikat Pendidik (bagi yang telah memiliki)',
            'alamat_berkas20' => 'Alamat Berkas20',
            'nama_berkas21' => 'Sebaran Mata Kuliah/Kurikulum Tempat Dosen Mengajar (Prodi/Homebase)',
            'alamat_berkas21' => 'Alamat Berkas21',
            'nama_berkas22' => 'Print Out NIDN dari laman forlap.dikti.go.id',
            'alamat_berkas22' => 'Alamat Berkas22',
            'nama_berkas23' => 'Daftar Artikel Ilmiah',
            'alamat_berkas23' => 'Alamat Berkas23',
            'nama_berkas24' => 'Similarity atau Originality (Lektor Kepala dan Profesor)',
            'alamat_berkas24' => 'Alamat Berkas24',
        ];
    }
}
