<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Surat Pengajuan {{ $id ?? '1' }}</title> --}}

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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT KEMATIAN" />


    <p class="mt-8">Yang bertanda tangan di bawah ini, menerangkan bahwa pada:</p>

    <div class="mt-10">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (
                    $detail['nama_field'] === 'Nama' ||
                        $detail['nama_field'] === 'Jenis Kelamin' ||
                        $detail['nama_field'] === 'Tempat Lahir' ||
                        $detail['nama_field'] === 'Tanggal Lahir' ||
                        $detail['nama_field'] === 'Alamat')
                    <div class="flex gap-4 w-full">
                        <p class="w-40">{{ $detail['nama_field'] }}</p>
                        <p>:</p>
                        <p>
                            @if ($detail['nama_field'] === 'Tanggal Lahir' && strtotime($detail['nilai']))
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

    <p class="mt-8 font-semibold">Telah Meninggal Dunia:</p>

    <div class="mt-10">
        @foreach ($details as $detail)
            @if (
                $detail['nama_field'] === 'Hari' ||
                    $detail['nama_field'] === 'Tanggal Meninggal' ||
                    $detail['nama_field'] === 'Tempat Meninggal' ||
                    $detail['nama_field'] === 'Penyebab Kematian')
                <div class="flex gap-4 w-full">
                    <p class="w-40">{{ $detail['nama_field'] }}</p>
                    <p>:</p>
                    <p>
                        @if ($detail['nama_field'] === 'Tanggal Meninggal' && strtotime($detail['nilai']))
                            {{ \Carbon\Carbon::parse($detail['nilai'])->translatedFormat('d F Y') }}
                        @else
                            {{ $detail['nilai'] }}
                        @endif
                    </p>
                </div>
            @endif
        @endforeach
    </div>

    <p class="mt-8">Surat keterangan ini dibuat atas dasar yang sebenarnya.</p>

    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
