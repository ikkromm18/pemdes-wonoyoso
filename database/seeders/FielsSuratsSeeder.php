<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FielsSuratsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Surat Kematian
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Nama Almarhum',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Jenis Kelamin',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Tempat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Hari Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Tanggal Meninggal',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Tempat Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Penyebab Kematian',
                'tipe_field' => 'text',
            ],
            //2 Pengantar Umum


            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Status Perkawinan',
                'tipe_field' => 'text',
            ],


            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Keperluan',
                'tipe_field' => 'text',
            ],

            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],
            //3 SKTM
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Nama Orang Tua',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'NIK Orang Tua',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Tempat Lahir Orang Tua',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Tanggal Lahir Orang Tua',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Pekerjaan Orang Tua',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Alamat Orang Tua',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Rata-Rata Penghasilan',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Keperluan Surat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Foto Slip Gaji',
                'tipe_field' => 'file',
            ],

            // Surat Keterangan Lahir
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Tampat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Jenis Kelamin',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Nama Ayah',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'NIK Ayah',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Nama Ibu',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'NIK Ibu',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Foto Surat Keterangan Lahir dari Dokter',
                'tipe_field' => 'file',
            ],
            //Surat Keterangan Usaha 
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Nama / Jenis Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Alamat Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Keperluan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Foto Surat Pengantar RT',
                'tipe_field' => 'file',
            ],

            // Surat Keternagan Domisili

            [
                'jenis_surat_id' => 6,
                'nama_field' => 'Keperluan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 6,
                'nama_field' => 'Foto Surat Pengantar RT',
                'tipe_field' => 'file',
            ],

            //Surat Keterangan Ahli Waris

            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Nama Pewaris',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Tempat Lahir Pewaris',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Tanggal Lahir Pewaris',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Pekerjaan Pewaris',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Tempat Tinggal Pewaris',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Hari Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 7,
                'nama_field' => 'Tanggal Meninggal',
                'tipe_field' => 'date',
            ],
            // Pengantar Izin Keramaian
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Nama',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'NIK',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Pekerjaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Nama Kegiatan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Hari Pelaksanaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Tanggal Pelaksanaan',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Tempat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Isi Acara',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 8,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],
            // Surat Keterangan Pindah Penduduk

            [
                'jenis_surat_id' => 9,
                'nama_field' => 'No KK',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 9,
                'nama_field' => 'Alamat Asal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 9,
                'nama_field' => 'Alamat Tujuan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 9,
                'nama_field' => 'Jumlah Anggota Keluarga',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 9,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],

            // Pemgantar Keterangan Kehilangan

            [
                'jenis_surat_id' => 10,
                'nama_field' => 'Barang Yang Hilang',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 10,
                'nama_field' => 'Isi Barang',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 10,
                'nama_field' => 'Tanggal Hilang',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 10,
                'nama_field' => 'Perkiraan Tempat Hilang',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 10,
                'nama_field' => 'Keperluan',
                'tipe_field' => 'text',
            ],

            // Surat Keterangan Domisili Usaha
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'NIK',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Tempat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Agama',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Pekerjaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Nama Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Tempat Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 11,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],

            // Surat Pengantar IMB
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'NIK',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Tempat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Jenis Bangunan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Lokasi Bangunan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 12,
                'nama_field' => 'Luas Bangunan',
                'tipe_field' => 'text',
            ],
            // Pengantar SKCK

            [
                'jenis_surat_id' => 13,
                'nama_field' => 'Jenis Kelamin',
                'tipe_field' => 'text',
            ],

            [
                'jenis_surat_id' => 13,
                'nama_field' => 'Status Perkawinan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 13,
                'nama_field' => 'Kewarganegaraan',
                'tipe_field' => 'text',
            ],

            [
                'jenis_surat_id' => 13,
                'nama_field' => 'Foto Pengantar RT',
                'tipe_field' => 'file',
            ],
        ];

        DB::table('field_surats')->insert($data);
    }
}
