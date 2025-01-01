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
            // 1
            [
                'nama_jenis' => 'Surat Kematian',
            ],
            // 2
            [
                'nama_jenis' => 'Surat Pengantar Umum',
            ],
            // 3
            [
                'nama_jenis' => 'Surat Keterangan Tidak Mampu',
            ],
            // 4
            [
                'nama_jenis' => 'Surat Keterangan Kelahiran',
            ],
            // 5
            [
                'nama_jenis' => 'Surat Keterangan Usaha',
            ],

            // 6
            [
                'nama_jenis' => 'Surat Keterangan Domisili Penduduk',
            ],
            // 7
            [
                'nama_jenis' => 'Surat Keterangan Ahli Waris',
            ],
            // 8
            [
                'nama_jenis' => 'Surat Pengantar Izin Keramaian',
            ],
            // 9
            [
                'nama_jenis' => 'Surat Keterangan Pindah Penduduk',
            ],
            // 10
            [
                'nama_jenis' => 'Surat Pengantar Keterangan Kehilangan',
            ],


            [
                'nama_jenis' => 'Surat Pengantar KTP',
            ],
            [
                'nama_jenis' => 'Surat Pengantar Laporan Kehilangan',
            ],
            [
                'nama_jenis' => 'Surat Keterangan Domisii Usaha',
            ],
            [
                'nama_jenis' => 'Surat Keterangan Jamkesos',
            ],
            [
                'nama_jenis' => 'Surat Permohonan Akta Lahir',
            ],


            [
                'nama_jenis' => 'Surat Pernyataan Belum Memiliki Akta ahir',
            ],
            [
                'nama_jenis' => 'Surat Keterangan Domisili Kantor',
            ],
            [
                'nama_jenis' => 'Surat Pengantar IMB',
            ],
            [
                'nama_jenis' => 'Surat SITU / SIUP',
            ],
            [
                'nama_jenis' => 'Surat Penghasilan Orang Tua',
            ],
        ];

        DB::table('jenis_surats')->insert($data);
    }
}
