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
                'nama_field' => 'Nama',
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
                'nama_field' => 'Hari',
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
            //2 
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Tempat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Pekerjaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'NIK',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Keperluan',
                'tipe_field' => 'text',
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
                'nama_field' => 'Pekerjaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Alamat',
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

            // Surat Keterangan Lahir
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'NIK',
                'tipe_field' => 'number',
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
            //Surat Keterangan Usaha 
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Nama Lengkap',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Tempat Lahir',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Tanggal Lahir',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'NIK',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Pekerjaan',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Alamat',
                'tipe_field' => 'text',
            ],
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
            // [
            //     'jenis_surat_id' => 6,
            //     'nama_field' => 'Jenis Pengantar',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 6,
            //     'nama_field' => 'Keperuan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 7,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Telepon Pemohon',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Alamat Tujuan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Alasan Pindah',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Desa / Kelurahan Tujuan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Tanggal Pindah',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Kecamatan Tujuan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Kota / Kabupaten Tujuan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Provinsi Tujuan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 8,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 9,
            //     'nama_field' => 'Jenis Acara',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 9,
            //     'nama_field' => 'Keperluan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 9,
            //     'nama_field' => 'Pelaksanaan Acara',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 9,
            //     'nama_field' => 'Waktu Acara',
            //     'tipe_field' => 'time',
            // ],
            // [
            //     'jenis_surat_id' => 10,
            //     'nama_field' => 'Barang Yang Hilang',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 10,
            //     'nama_field' => 'Rincian Barang',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 10,
            //     'nama_field' => 'Kronologi Kehilangan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 10,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 11,
            //     'nama_field' => 'Nama / Jenis Usaha',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 11,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 12,
            //     'nama_field' => 'Nomor Kartu JAMKESOS',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 12,
            //     'nama_field' => 'Berlaku Dari',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 12,
            //     'nama_field' => 'Berlaku Sampai',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 12,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 13,
            //     'nama_field' => 'Nama Anak',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 13,
            //     'nama_field' => 'Tempat Lahir',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 13,
            //     'nama_field' => 'Tanggal Lahir',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 13,
            //     'nama_field' => 'Nama Ayah',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 13,
            //     'nama_field' => 'Nama Ibu',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 14,
            //     'nama_field' => 'Nama Lengkap',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 14,
            //     'nama_field' => 'Tempat Lahir',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 14,
            //     'nama_field' => 'Tanggal Lahir',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 14,
            //     'nama_field' => 'Jenis Kelamin',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 15,
            //     'nama_field' => 'Nama Kantor',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 15,
            //     'nama_field' => 'Nama Pemimpin / Ketua',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 15,
            //     'nama_field' => 'Alamat Jalan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 15,
            //     'nama_field' => 'Keterangan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 15,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 16,
            //     'nama_field' => 'Keperluan Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 17,
            //     'nama_field' => 'Nama Perusahaan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 17,
            //     'nama_field' => 'Jenis Usaha',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 17,
            //     'nama_field' => 'Jenis Surat',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 17,
            //     'nama_field' => 'Status Bangunan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 17,
            //     'nama_field' => 'Alamat Jalan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'NIK Ayah',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'NIK Ibu',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'Nama Anak',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'Jenis Kelamin Anak',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'Tempat Lahir',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'Tanggal Lahir',
            //     'tipe_field' => 'date',
            // ],
            // [
            //     'jenis_surat_id' => 18,
            //     'nama_field' => 'Anak Ke-',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 19,
            //     'nama_field' => 'Keterangan Surat / Keperluan',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 20,
            //     'nama_field' => 'NIK anak',
            //     'tipe_field' => 'number',
            // ],
            // [
            //     'jenis_surat_id' => 20,
            //     'nama_field' => 'Penghasilan Rata-Rata',
            //     'tipe_field' => 'text',
            // ],
            // [
            //     'jenis_surat_id' => 20,
            //     'nama_field' => 'Keterangan Surat / Keperluan',
            //     'tipe_field' => 'text',
            // ],
        ];

        DB::table('field_surats')->insert($data);
    }
}
