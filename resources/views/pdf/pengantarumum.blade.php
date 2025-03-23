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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT PENGANTAR" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, menerangkan bahwa :</p>

    <div class="mt-5">
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
                <p class="w-40">Status Perkawinan</p>
                <p>:</p>
                <p>
                    {{ $details->where('nama_field', 'Status Perkawinan')->first()['nilai'] }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Pekerjaan</p>
                <p>:</p>
                <p>
                    {{ $details->where('nama_field', 'Pekerjaan')->first()['nilai'] }}

                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Keperluan</p>
                <p>:</p>
                <p>
                    {{ $details->where('nama_field', 'Keperluan')->first()['nilai'] }}
                </p>
            </div>

            <div class="flex w-full gap-4">
                <p class="w-40">Keterangan Lain</p>
                <p>:</p>
                <p>
                    Yang bersangkutan memang benar warga desa kami berdomisili sesuai data
                </p>
            </div>
            <div class="flex w-full gap-4">
                <p class="w-40"></p>
                <p class="text-white">:</p>
                <p>
                    di diatas
                </p>
            </div>

        </div>
    </div>




    <p class="mt-5">Demikian Surat Pengantar ini dibuat, untuk digunakan sebagaimana mestinya.</p>



    <x-tanda-tangan class="underline" kepalaDesa="{{ $namakades->nama_kepala_desa }}" />



    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
