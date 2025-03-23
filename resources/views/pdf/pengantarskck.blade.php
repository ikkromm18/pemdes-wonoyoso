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
                @if (in_array($detail['nama_field'], ['Jenis Kelamin', 'Status Perkawinan', 'Kewarganegaraan']))
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

    <p class="mt-4">Demikian Surat Pengantar ini dibuat dengan sebenarnya sebagai pengantar untuk mendapatkan SKCK
        dari Kepolisian Negara Republik Indonesia.</p>



    <x-tanda-tangan kepalaDesa="{{ $namakades->nama_kepala_desa }}" />


    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>


</html>
