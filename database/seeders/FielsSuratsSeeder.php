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
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Hari Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'waktu Meninggal',
                'tipe_field' => 'time',
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
                'nama_field' => 'Sebab Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 1,
                'nama_field' => 'Yang Menentukan Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 2,
                'nama_field' => 'Keperluan Surat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Penghasilan Orang Tua',
                'tipe_field' => 'number',
            ],
            [
                'jenis_surat_id' => 3,
                'nama_field' => 'Keperluan Surat',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Nama Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Lokasi Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Jenis Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 4,
                'nama_field' => 'Keterangan Usaha',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Nama Penduduk Yang Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Hari Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Tanggal Meninggal',
                'tipe_field' => 'date',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Tempat Meninggal',
                'tipe_field' => 'text',
            ],
            [
                'jenis_surat_id' => 5,
                'nama_field' => 'Karena / Sebab Meninggal',
                'tipe_field' => 'text',
            ],
        ];

        DB::table('field_surats')->insert($data);
    }
}
