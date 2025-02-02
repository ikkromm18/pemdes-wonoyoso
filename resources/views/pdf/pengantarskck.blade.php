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

    <x-nomor-surat :jenisSurat="$jenis_surat" :id="$id" namaSurat="SURAT PENGANTAR KETERANGAN CATATAN KEPOLISIAN" />

    <p class="mt-8">Yang bertanda tangan di bawah ini, Kepala Desa Wonoyoso, Kecamatan Buaran, Kabupaten Pekalongan
        menerangkan dengan sebenarnya bahwa :</p>

    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], [
                        'Nama Lengkap',
                        'Jenis Kelamin',
                        'Tempat Lahir',
                        'Tanggal Lahir',
                        'Status Perkawinan',
                        'Kewarganegaraan',
                        'Agama',
                        'Pekerjaan',
                        'NIK',
                        'Alamat',
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

    <p class="mt-4">Adalah benar-benar salah seorang warga Desa Wonoyoso Kecamatan Buaran. Berdasarkan surat
        keterangan dari Ketua RT dan catatan di kantor kami bahma nama tersebut diatas :</p>
    <ol type="1" class="ml-4">
        <li>1. Berkelakukan dan beradat-istiadat baik</li>
        <li>2. Tidak Ketergantungan kepada obat terlarang (Narkoba)</li>
        <li>3. Tidak dalam berperkara dengan tindakan kriminal</li>
        <li>4. Tidak sedang dicabut hak pilihnya</li>

    </ol>


    {{-- {{ $details->where('nama_field', 'Nama Kegiatan')->first()['nilai'] }} --}}
    <div class="mt-4">
        <div class="flex-col">
            @foreach ($details as $detail)
                @if (in_array($detail['nama_field'], ['Hari', 'Tanggal', 'Tempat', 'Acara']))
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

    <p class="mt-4">Demikian Surat Pengantar ini dibuat dengan sebenarnya sebagai pengantar untuk mendapatkan SKCK
        dari Kepolisian Negara Republik Indonesia.</p>



    <x-tanda-tangan kepalaDesa="BAYU SUKMONO" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
