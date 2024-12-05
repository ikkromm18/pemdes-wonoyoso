<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan {{ $id }}</title>
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
    </style>
</head>

<body>
    <div class="header">
        <h1>PEMERINTAH DESA WONOYOSO</h1>
        <p>Jalan Raya Wonoyoso No. 123, Kecamatan Buaran, Kabupaten Pekalongan</p>
        <p>Telp: (0285) 123456789 | Email: desa@wonoyoso.id</p>
        <hr>
    </div>

    <div class="content">
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
    </div>

    <div class="footer">
        <div class="signatures">
            <div>
                <p>Pemohon</p>
                <br><br><br>
                <p><strong>{{ $nama }}</strong></p>
            </div>
            <div>
                <p>Pejabat Desa Wonoyoso</p>
                <br><br><br>
                <p><strong>Nama Pejabat</strong></p>
            </div>
        </div>
        <div class="stamp" style="text-align: center;">
            <img src="{{ asset('images/stempel.png') }}" alt="Stempel">
        </div>
    </div>
</body>

</html>
