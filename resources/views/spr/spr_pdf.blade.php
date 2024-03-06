<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPR PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama Mesin / Fasilitas / Gedung</th>
            <td>{{ $spr->nama_barang }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $spr->lokasi }}</td>
        </tr>
        <tr>
            <th>Tanggal Kerusakan</th>
            <td>{{ $spr->tanggal_kerusakan }}</td>
        </tr>
        <tr>
            <th>No SPR</th>
            <td>{{ $spr->nomor_spr }}</td>
        </tr>
          <tr>
            <th>Kode Mesin/Nomor Mesin</th>
            <td>{{ $spr->kode_mesin }}</td>
        </tr>
          <tr>
            <th>No. Inventaris/Aset</th>
            <td>{{ $spr->no_aset }}</td>
        </tr>
          <tr>
            <th>Jam Kerusakan</th>
            <td>{{ $spr->jam_kerusakan }}</td>
        </tr>
        <tr>
            <th>User Peminta</th>
            <td>{{ $spr->user_peminta }}</td>
        </tr>
        <tr>
            <th>Uraian Kerusakan</th>
            <td>{{ $spr->deskripsi_kerusakan }}</td>
        </tr>
        <tr>
            <th>Kondisi Mesin</th>
            <td>{{ $spr->status_kerusakan }}</td>
        </tr>
        <tr>
            <th>Departemen <br> Pengendalian & Pemeliharaan Aset</th>
            <td></td>
        </tr>
        <tr>
                <th>SPR diterima tanggal, jam*</th>
                <td>{{ $spr->tanggal_sprditerima }} {{ $spr->jam_sprditerima }}</td>
            </tr>
            <tr>
                <th>Site</th>
                <td>{{ $spr->site}}</td>
            </tr>
        <!-- Tambahkan kolom lain sesuai kebutuhan -->
    </table>
</body>
</html>
