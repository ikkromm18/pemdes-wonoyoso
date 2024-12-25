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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT KETERANGAN TIDAK MAMPU" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, Kepala Desa Wonoyoso Kecamatan Buaran dengan ini menyatakan
        dengan sesungguhnya bahwa :</p>

    <div class="mt-10">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (!in_array($detail['nama_field'], ['Rata-Rata Penghasilan', 'Keperluan Surat']))
                    <div class="flex gap-4 w-full">
                        <p class="w-44">{{ $detail['nama_field'] }}</p>
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


    <p class="mt-8">Berdasarkan pengakuan yang bersangkutan, bahwa yang bersangkutan benar-benar dari keluarga tidak
        mampu dengan penghasilan rata-rata per-bulan Rp
        {{ number_format($details->where('nama_field', 'Rata-Rata Penghasilan')->first()['nilai'], 0, ',', '.') }}.</p>
    <p>Surat Keterangan ini dibuat dengan keperluan
        {{ $details->where('nama_field', 'Keperluan Surat')->first()['nilai'] }} atas nama :</p>
    <div class="flex-col mt-6">
        <div class="flex gap-4 w-full">
            <p class="w-44">Nama User</p>
            <p>:</p>
            <p>{{ $nama }}</p>

        </div>

        <div class="flex gap-4 w-full">
            <div class="flex gap-4 w-full">
                <p class="w-44">NIK</p>
                <p>:</p>
                <p>{{ $nik }}</p>

            </div>

        </div>

        <div class="flex gap-4 w-full">
            <div class="flex gap-4 w-full">
                <p class="w-44">Alamat</p>
                <p>:</p>
                <p>{{ $alamat }}</p>
            </div>

        </div>
    </div>



    <p class="mt-8">Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>






    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
