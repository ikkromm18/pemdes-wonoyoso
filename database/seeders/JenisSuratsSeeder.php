<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_jenis' => 'Surat Keterangan Meninggal Dunia',
            ],

            [
                'nama_jenis' => 'Surat Keterangan Kepala Desa',
            ],
            [
                'nama_jenis' => 'Surat Pernyataan Jual Beli Tanah',
            ],
            [
                'nama_jenis' => 'Surat Keterangan Tidak Mampu',
            ],
            [
                'nama_jenis' => 'Surat Pengantar Umum',
            ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Domisili Penduduk',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Usaha',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Ahli Waris',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pengantar KTP',
            // ],
            // [
            //     'nama_jenis' => 'Surat Biodata Penduduk',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Pindah Penduduk',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pengantar Izin Keramaian',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pengantar Laporan Kehilangan',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Domisii Usaha',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Jamkesos',
            // ],
            // [
            //     'nama_jenis' => 'Surat Permohonan Akta Lahir',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pernyataan Belum Memiliki Akta ahir',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Domisili Kantor',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pengantar IMB',
            // ],
            // [
            //     'nama_jenis' => 'Surat SITU / SIUP',
            // ],
            // [
            //     'nama_jenis' => 'Surat Keterangan Kelahiran',
            // ],
            // [
            //     'nama_jenis' => 'Surat Pengantar Umum',
            // ],
            // [
            //     'nama_jenis' => 'Surat Penghasilan Orang Tua',
            // ],
        ];

        DB::table('jenis_surats')->insert($data);
    }
}
