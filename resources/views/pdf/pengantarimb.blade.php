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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT PENGANTAR IMB" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, Kepala Desa Wonoyoso, Kecamatan Buaran, Kabupaten Pekalongan
        dengan ini menerangkan bahwa :</p>

    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], ['NIK', 'Nama Lengkap', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat']))
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


    <p class="mt-4">Adalah benar warga Desa Wonoyoso yang hendak mengajukan permohonan Izin Mendirikan Bangunan dengan
        rincian :
    </p>

    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], ['Jenis Bangunan', 'Lokasi Bangunan', 'Luas Bangunan']))
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

    <p class="mt-4">Sehubung dengan hal tersebut, kami selaku pemerintah Desa Wonoyoso memberikan pengantar ini agar
        dapat digunakan sebagai kelengkapan dalam proses pengajuan IMB kepada instansi terkait.
    </p>

    <p class="mt-2">Demikian surat pengantar ini dibuat untuk digunakan sebagaimana mestinya.
    </p>



    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
