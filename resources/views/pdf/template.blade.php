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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT UMUM" />


    <p class="mt-8">Yang bertanda tangan di bawah ini, menerangkan bahwa pada:</p>

    <div class="mt-10">
        <div class="flex-col">
            @foreach ($details as $detail)
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
            @endforeach
        </div>
    </div>


    <p class="mt-8">Surat ini dibuat atas dasar yang sebenarnya.</p>

    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    {{-- <script>
        window.onload = function() {
            window.print();
        };
    </script> --}}
</body>


</html>
