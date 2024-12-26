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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT KETERANGAN USAHA" />

    <p class="mt-8">Yang bertanda tangan di bawah ini menerangkan bahwa :</p>

    <div class="mt-10">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (!in_array($detail['nama_field'], ['Nama / Jenis Usaha', 'Keperluan']))
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

    <p class="mt-8">Dengan ini menerangkan dengan sebenarnya bahwa yang bersangkutan betul memiliki usaha <strong>
            {{ $details->where('nama_field', 'Nama / Jenis Usaha')->first()['nilai'] }}</strong>
    </p>


    <p class="mt-4">Adapun Surat Keterangan ini dibuat untuk
        {{ $details->where('nama_field', 'Keperluan')->first()['nilai'] }}</p>


    <p class="mt-4">Demikian Surat Keterangan Usaha ini dibuat untuk dipergunakan sebagaimana mestinya dan bagi
        instansi yang berkepentingan menjadi bahan periksa adanya.</p>



    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        // window.onload = function() {
        //     window.print();
        // };
    </script>
</body>


</html>
