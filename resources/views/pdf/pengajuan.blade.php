<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan {{ $id }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Pengajuan Surat</h1>
    <p><strong>NIK:</strong> {{ $nik }}</p>
    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Alamat:</strong> {{ $alamat }}</p>
    <p><strong>Jenis Surat:</strong> {{ $jenis_surat }}</p>
    <p><strong>Status:</strong> {{ $status }}</p>
    <h3>Detail:</h3>
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
</body>

</html>
