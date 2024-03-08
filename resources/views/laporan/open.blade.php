@extends('layouts.app')

@section('content')
<div class="card">
    
    <div class="card-header">List SPR dengan Status SPR Proses</div>
    <div class="d-flex">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.." title="Type in a name">
    </div>
    <div class="card-body">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Nomor SPR</th>
                    <th>Nama Barang</th>
                    <th>Lokasi</th>
                    <th>Tanggal Kerusakan</th>
                    <th>Kode Mesin</th>
                    <th>Nomor Aset</th>
                    <th>Jam Kerusakan</th>
                    <th>User Peminta</th>
                    <th>Deskripsi Kerusakan</th>
                    <th>Site</th>
                    <th>Status Kerusakan</th>
                    <th>Tanggal SPR di terima</th>
                    <th>Jam SPR di terima</th>
                    <th>Hasil Pengukuran</th>
                    <th>Penyebab Kerusakan</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Penyelesaian</th>
                    <th>Nama Sparepart</th>
                    <th>Kode Sparepart</th>
                    <th>Spesifikasi Sparepart</th>
                    <th>Jumlah Sparepart</th>
                    <th>Satuan Sparepart</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($open as $opens)
                <tr>
                    <td>{{ $opens->nomor_spr }}</td>
                    <td>{{ $opens->nama_barang }}</td>
                    <td>{{ $opens->lokasi }}</td>
                    <td>{{ $opens->tanggal_kerusakan }}</td>
                    <td>{{ $opens->kode_mesin }}</td>
                    <td>{{ $opens->no_aset }}</td>
                    <td>{{ $opens->jam_kerusakan }}</td>
                    <td>{{ $opens->user_peminta }}</td>
                    <td>{{ $opens->deskripsi_kerusakan }}</td>
                    <td>{{ $opens->site }}</td>
                    <td>{{ $opens->status_kerusakan }}</td>
                    <td>{{ $opens->tanggal_sprditerima }}</td>
                    <td>{{ $opens->jam_sprditerima }}</td>
                    <td>{{ $opens->hasil_pengukuran }}</td>
                    <td>{{ $opens->penyebab_kerusakan }}</td>
                    <td>{{ $opens->tanggal }}</td>
                    <td>{{ $opens->jam_mulai }}</td>
                    <td>{{ $opens->jam_selesai }}</td>
                    <td>{{ $opens->penyelesaian }}</td>
                    <td>{{ $opens->nama_sparepart_1 }}</td>
                    <td>{{ $opens->kode_sparepart_1 }}</td>
                    <td>{{ $opens->spek_sparepart_1 }}</td>
                    <td>{{ $opens->jumlah_sparepart_1 }}</td>
                    <td>{{ $opens->satuan_sparepart_1 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Ubah indeks kolom menjadi 0 untuk mencari berdasarkan nama
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection