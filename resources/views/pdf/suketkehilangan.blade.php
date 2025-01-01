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
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], ['Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'Alamat Lengkap', 'Pekerjaan']))
                    <div class="flex gap-4 w-full">
                        <p class="w-40">{{ $detail['nama_field'] }}</p>
                        <p>:</p>
                        <p>
                            @if (strtotime($detail['nilai']))
                                <!-- Cek apakah nilai adalah tanggal -->
                                {{ \Carbon\Carbon::parse($detail['nilai'])->translatedFormat('d F Y') }}
                            @else
                                {{ $detail['nilai'] }}
                            @endif
                        </p>
                    </div>
                @endif
            @endforeach
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



    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        // window.onload = function() {
        //     window.print();
        // };
    </script>
</body>


</html>
