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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT KETERANGAN AHLI WARIS" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, Kepala Desa Wonoyoso, Kecamatan Buaran, Kabupaten Pekalongan
        menerangkan dengan sebenarnya bahwa :</p>

    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (
                    !in_array($detail['nama_field'], [
                        'Nama Pewaris',
                        'Tempat Tinggal Pewaris',
                        'Tanggal Lahir Pewaris',
                        'Pekerjaan Pewaris',
                        'Tempat Meninggal',
                        'Hari Meninggal',
                    ]))
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

    <p class="mt-4">Bahwa orang tersebut merupakan ahli waris dari : </p>

    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (
                    !in_array($detail['nama_field'], [
                        'Nama',
                        'Tempat Tinggal',
                        'Tempat Lahir',
                        'Tanggal Lahir',
                        'Pekerjaan',
                        'Hari Meninggal',
                        'Tanggal Meninggal',
                    ]))
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

    <p class="mt-4">Yang bersangkutan telah meninggal dunia pada hari
        {{ $details->where('nama_field', 'Hari Meninggal')->first()['nilai'] }} tanggal
        {{ $details->where('nama_field', 'Tanggal Meninggal')->first()['nilai'] }}
    </p>


    <p class="mt-4">Demikian Surat Keterangan Ahli Waris ini dibuat dengan sebenar-benarnya dan tanpa paksaan pihak
        manapun.</p>



    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
