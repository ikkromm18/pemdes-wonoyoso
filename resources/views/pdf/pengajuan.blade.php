<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan {{ $id ?? '1' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
        }

        .header p {
            margin: 0;
        }

        .content {
            margin-top: 20px;
            line-height: 1.5;
        }

        .content p {
            margin: 5px 0;
        }

        .table-wrapper {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 40px;
        }

        .footer .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .footer .signatures div {
            text-align: center;
        }

        .stamp {
            margin-top: 20px;
        }

        .stamp img {
            width: 100px;
            opacity: 0.7;
        }

        .flex {
            display: flex;
        }

        .flex-row {
            display: flex;
            flex-direction: row
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="header flex-row justify-center items-center gap-8">
        <div class="w-20">
            <img src="./logokop.png" alt="logo">
        </div>
        <div class="leading-tight">
            <h1 class="font-bold">PEMERINTAH KEBUPATEN PEKALONGAN</h1>
            <h1 class="font-bold">KECAMATAN BUARAN</h1>
            <h1 class="font-bold">DESA WONOYOSO</h1>

            <p>Wonoyoso Gg. 5 RT 04 / RW 002 Buaran Pekalongan</p>
            <p>KodePos : 51171</p>
        </div>
    </div>
    <hr>

    <div class="flex flex-col mt-4">
        <h3 class="mx-auto text-xl underline font-semibold">SURAT KEMATIAN</h3>
        <p class="mx-auto">Nomor : 145/34/KM/XII/2024</p>
    </div>

    <p class="mt-8">Yang bertanda tangan dibawah ini, menerangkan bahwa pada :</p>

    <div class="mt-10">
        <div class="flex-col">
            <div class="flex gap-4 w-full">
                <p class="w-40">Nama</p>
                <p>:</p>
                <p>Yaskur</p>
            </div>
            <div class="flex gap-4 w-full">
                <p class="w-40">Jenis Kelamin</p>
                <p>:</p>
                <p>Laki-laki</p>
            </div>
            <div class="flex gap-4 w-full">
                <p class="w-40">Tempat Tanggal Lahir</p>
                <p>:</p>
                <p>Pekalongan, 30-12-1958</p>
            </div>
            <div class="flex gap-4 w-full">
                <p class="w-40">Alamat</p>
                <p>:</p>
                <p>Wonoyoso Gg.5 RT 19 RW 007</p>
            </div>
        </div>
    </div>

    <p class="mt-8 font-semibold">Telah Meninggal Dunia :</p>

    <div class="mt-10">
        <div class="flex gap-4 w-full">
            <p class="w-40">Hari</p>
            <p>:</p>
            <p>Kamis</p>
        </div>
        <div class="flex gap-4 w-full">
            <p class="w-40">Tanggal</p>
            <p>:</p>
            <p>10 Juli 2024</p>
        </div>
        <div class="flex gap-4 w-full">
            <p class="w-40">Di</p>
            <p>:</p>
            <p>Pekalongan</p>
        </div>
        <div class="flex gap-4 w-full">
            <p class="w-40">Disebabkan Karena</p>
            <p>:</p>
            <p>Sakit</p>
        </div>
    </div>


    <p class="mt-8">Surat keterangan ini dibuat atas dasar yang sebenarnya.</p>




    {{-- <div class="content">
        <p><strong>Nomor Surat:</strong> {{ $id }}/PDW/{{ date('Y') }}</p>
        <p><strong>NIK:</strong> {{ $nik }}</p>
        <p><strong>Nama:</strong> {{ $nama }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Alamat:</strong> {{ $alamat }}</p>
        <p><strong>Jenis Surat:</strong> {{ $jenis_surat }}</p>
        <p><strong>Status:</strong> {{ $status }}</p>
    </div>

    <div class="table-wrapper">
        <h3>Detail Pengajuan:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Field</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail['nama_field'] }}</td>
                        <td>{{ $detail['nilai'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  --}}

    <div class="footer w-full ">
        <div class="signatures flex mx-auto pl-80">
            <div>
                <p>Pekalongan, 17 Oktober 2024</p>
                <p>Kepala Desa Wonoyoso</p>
                <br><br><br>
                <p><strong>BAYU SUKMONO</strong></p>
            </div>
        </div>
        {{-- <div class="stamp" style="text-align: center;">
            <img src="{{ asset('images/stempel.png') }}" alt="Stempel">
        </div> --}}
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
