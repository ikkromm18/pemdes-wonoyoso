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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT KETERANGAN KELAHIRAN" />

    <p class="mt-8">Yang bertanda tangan di bawah ini menerangkan bahwa sesungguhnya telah lahir seorang anak :</p>

    <div class="mt-7">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (
                    !in_array($detail['nama_field'], [
                        'Nama Ayah',
                        'Nama Ibu',
                        'NIK Ayah',
                        'NIK Ibu',
                        'Foto Surat Keterangan Lahir dari Dokter',
                    ]))
                    <div class="flex w-full gap-4">
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

    <p class="mt-7">Orang tersebut adalah anak dari :</p>

    <div class="mt-7">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], ['Nama Ayah', 'Nama Ibu', 'NIK Ayah', 'NIK Ibu']))
                    <div class="flex w-full gap-4">
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

    <p class="mt-8">Demikian Surat Keterangan Kelahiran ini dibuat dengan sebenarnya dan dapat dipergunakan
        seperlunya.</p>



    <x-tanda-tangan kepalaDesa="{{ $namakades->nama_kepala_desa }}" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
