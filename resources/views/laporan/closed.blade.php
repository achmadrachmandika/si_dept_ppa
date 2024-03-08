@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">List SPR dengan Status SPR Closed</div>
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
                        @foreach ($closed as $item)
                        <tr>
                            <td>{{ $item->nomor_spr }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->tanggal_kerusakan }}</td>
                            <td>{{ $item->kode_mesin }}</td>
                            <td>{{ $item->no_aset }}</td>
                            <td>{{ $item->jam_kerusakan }}</td>
                            <td>{{ $item->user_peminta }}</td>
                            <td>{{ $item->deskripsi_kerusakan }}</td>
                            <td>{{ $item->site }}</td>
                            <td>{{ $item->status_kerusakan }}</td>
                            <td>{{ $item->tanggal_sprditerima }}</td>
                            <td>{{ $item->jam_sprditerima }}</td>
                            <td>{{ $item->hasil_pengukuran }}</td>
                            <td>{{ $item->penyebab_kerusakan }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jam_mulai }}</td>
                            <td>{{ $item->jam_selesai }}</td>
                            <td>{{ $item->penyelesaian }}</td>
                            <td>{{ $item->nama_sparepart_1 }}</td>
                            <td>{{ $item->kode_sparepart_1 }}</td>
                            <td>{{ $item->spek_sparepart_1 }}</td>
                            <td>{{ $item->jumlah_sparepart_1 }}</td>
                            <td>{{ $item->satuan_sparepart_1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
        td = tr[i].getElementsByTagName("td")[0]; // Change the column index to 0 to search based on SPR number
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