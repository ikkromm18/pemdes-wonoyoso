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

    <div class="mt-6">
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

            @foreach ($details as $detail)
                @if (!in_array($detail['nama_field'], ['Nama / Jenis Usaha', 'Keperluan', 'Foto Surat Pengantar RT']))
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

    <p class="mt-8">Dengan ini menerangkan dengan sebenarnya bahwa yang bersangkutan betul memiliki usaha <strong>
            {{ $details->where('nama_field', 'Nama / Jenis Usaha')->first()['nilai'] }}</strong>
    </p>


    <p class="mt-4">Adapun Surat Keterangan ini dibuat untuk
        {{ $details->where('nama_field', 'Keperluan')->first()['nilai'] }}</p>


    <p class="mt-4">Demikian Surat Keterangan Usaha ini dibuat untuk dipergunakan sebagaimana mestinya dan bagi
        instansi yang berkepentingan menjadi bahan periksa adanya.</p>



    <x-tanda-tangan kepalaDesa="{{ $namakades->nama_kepala_desa }}" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
