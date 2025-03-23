<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ public_path('css/tailwind.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }


        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 0;
                padding: 2.5rem;
            }

            header,
            footer {
                display: none;
            }
        }
    </style>

</head>

<body>
    <x-kop-surat />

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT PENGANTAR KETERANGAN KEHILANGAN" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, Kepala Desa Wonoyoso, Kecamatan Buaran, Kabupaten Pekalongan
        menerangkan permohonan pindah penduduk WNI dengan data sebagai berikut :</p>

    <div class="mt-4">
        <div class="flex-col">
            <div class="flex w-full gap-4">
                <p class="w-40">Nama Lengkap</p>
                <p>:</p>
                <p>
                    {{ $nama }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Tempat / Tanggal Lahir</p>
                <p>:</p>
                <p>
                    {{ $tempatlahir . ', ' . \Carbon\Carbon::parse($tgl_lahir)->translatedFormat('d F Y') }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">NIK</p>
                <p>:</p>
                <p>
                    {{ $nik }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Alamat</p>
                <p>:</p>
                <p>
                    {{ $alamat }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Pekerjaan</p>
                <p>:</p>
                <p>
                    {{ $pekerjaan }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Agama</p>
                <p>:</p>
                <p>
                    {{ $agama }}
                </p>
            </div>
        </div>
    </div>


    <p class="mt-4">Nama tersebut diatas adalah benar-benar warga desa kami, dan melaporkan Kehilangan
        {{ $details->where('nama_field', 'Barang Yang Hilang')->first()['nilai'] }}. Isi barang tersebut adalah
        {{ $details->where('nama_field', 'Isi Barang')->first()['nilai'] }}. Barang tersebut diketahui hilang pada
        {{ $details->where('nama_field', 'Tanggal Hilang')->first()['nilai'] }} dengan perkiraan hilang di
        {{ $details->where('nama_field', 'Perkiraan Tempat Hilang')->first()['nilai'] }}</p>
    </p>


    <p class="mt-2">Surat Keterangan ini diberikan untuk keperluan :
        <strong>{{ $details->where('nama_field', 'Keperluan')->first()['nilai'] }} </strong>
    </p>
    <p class="mt-2">Demikian Surat Keterangan ini dibuat dengan sebenarnya, untuk dikatahui dan dapat
        digunakan sepenuhnya
    </p>



    <x-tanda-tangan kepalaDesa="{{ $namakades->nama_kepala_desa }}" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
