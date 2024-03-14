@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">List SPR dengan Status SPR Closed</div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Cari Nomor SPR.." aria-label="Cari Nomor SPR" aria-describedby="button-addon2">
                    {{-- <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div> --}}
                </div>

                <div class="table-responsive" style="overflow-x: auto; margin-right: 0;">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 500px; white-space: nowrap;">Nomor SPR</th>
                                <th style="width: 500px; white-space: nowrap;">Nama Barang</th>
                                <th>Lokasi</th>
                                <th style="width: 500px; white-space: nowrap;">Tanggal Kerusakan</th>
                                 <th style="width: 500px; white-space: nowrap;">Kode Mesin</th>
                                <th style="width: 500px; white-space: nowrap;">Nomor Aset</th>
                                <th style="width: 500px; white-space: nowrap;">Jam Kerusakan</th>
                                <th style="width: 500px; white-space: nowrap;">User Peminta</th>
                                <th style="width: 500px; white-space: nowrap;">Deskripsi Kerusakan</th>
                                <th>Site</th>
                                <th style="width: 500px; white-space: nowrap;">Status Kerusakan</th>
                                <th style="width: 500px; white-space: nowrap;">Tanggal SPR di Terima</th>
                                <th style="width: 500px; white-space: nowrap;">Jam SPR di Terima</th>
                                <th style="width: 500px; white-space: nowrap;">Hasil Pengukuran</th>
                                <th style="width: 500px; white-space: nowrap;">Penyebab Kerusakan</th>
                                <th style="width: 500px; white-space: nowrap;">Tanggal</th>
                                <th style="width: 500px; white-space: nowrap;">Jam Mulai</th>
                                <th style="width: 500px; white-space: nowrap;">Jam Selesai</th>
                                <th>Penyelesaian</th>
                                <th>Nama Sparepart</th>
                                <th style="width: 500px; white-space: nowrap;">Kode Sparepart</th>
                                <th style="width: 500px;">Spesifikasi Sparepart</th>
                                <th style="width: 500px; white-space: nowrap;">Jumlah Sparepart</th>
                                <th style="width: 500px; white-space: nowrap;">Nama Personil</th>
                                <th style="width: 500px; white-space: nowrap;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($closed->sortByDesc('tanggal') as $item)
                            <!-- Mengurutkan data berdasarkan tanggal secara descending -->
                            <tr>
                                <td>{{ $item->nomor_spr }}</td>
                                <td style="width: 500px; white-space: nowrap;">{{ $item->nama_barang }}</td>
                                <td style="width: 500px; white-space: nowrap;">{{ $item->lokasi }}</td>
                                <td>{{ $item->tanggal_kerusakan }}</td>
                                <td>{{ $item->kode_mesin }}</td>
                                <td>{{ $item->no_aset }}</td>
                                <td>{{ $item->jam_kerusakan }}</td>
                                <td>{{ $item->user_peminta }}</td>
                                <td>{{ $item->deskripsi_kerusakan }}</td>
                                <td style="width: 500px; white-space: nowrap;">{{ $item->site }}</td>
                                <td>{{ $item->status_kerusakan }}</td>
                                <td>{{ $item->tanggal_sprditerima }}</td>
                                <td>{{ $item->jam_sprditerima }}</td>
                                <td>{{ $item->hasil_pengukuran }}</td>
                                <td>{{ $item->penyebab_kerusakan }}</td>
                                <td style="width: 500px; white-space: nowrap;">{{ $item->tanggal }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selesai }}</td>
                                <td style="width: 500px; white-space: nowrap;">{{ $item->penyelesaian }}</td>
                                
                                    <td style="width: 500px; white-space: nowrap;">
                                        @for ($i = 1; $i <= 10; $i++) 
                                        @if (!empty($item["kode_sparepart_$i"]))
                                            
                                            <p>{{ $item["nama_sparepart_$i"]}}</p>
                                            <br>
                                        @endif
                                        @endfor
                                    </td>
                                    <td style="width: 500px; white-space: nowrap;">
                                        @for ($i = 1; $i <= 10; $i++) @if (!empty($item["kode_sparepart_$i"]))  
                                        <p>{{$item["kode_sparepart_$i"]}}</p>
                                        <br>
                                            @endif
                                            @endfor
                                    </td>
                                    <td style="width: 500px; white-space: nowrap;">
                                        @for ($i = 1; $i <= 10; $i++) @if (!empty($item["kode_sparepart_$i"]))  
                                        <p>{{$item["spek_sparepart_$i"]}}</p>
                                        <br>
                                            @endif
                                            @endfor
                                    </td>
                                    <td style="width: 500px; white-space: nowrap;">
                                        @for ($i = 1; $i <= 10; $i++) @if (!empty($item["kode_sparepart_$i"])) 
                                            <p>{{ $item["jumlah_sparepart_$i"]}} {{ $item["satuan_sparepart_$i"]}}</p>
                                            <br>
                                            @endif
                                            @endfor
                                    </td>

                                    <td style="width: 500px; white-space: nowrap;">
                                        @for ($i = 1; $i <= 10; $i++) @if (!empty($item["nama_personil_$i"])) <p><span style="color: red;">{{ $i }}.</span>
                                            {{ $item["nama_personil_$i"] }}</p>
                                            <br>
                                            @endif
                                            @endfor
                                    </td>

                                    <td>{{ $item->keterangan }}</td>
                                {{-- <td style="width: 500px; white-space: nowrap;">1. {{ $item->kode_sparepart_1 }} 2. {{ $item->kode_sparepart_2 }} 3. {{ $item->kode_sparepart_3 }}</td>
                                <td style="width: 500px; white-space: nowrap;">1. {{ $item->spek_sparepart_1 }} 2. {{ $item->spek_sparepart_2 }} 3. {{ $item->spek_sparepart_3 }}</td>
                                <td style="width: 500px; white-space: nowrap;">1. {{ $item->jumlah_sparepart_1 }} {{ $item->satuan_sparepart_1 }} 2. {{ $item->jumlah_sparepart_2 }} {{ $item->satuan_sparepart_2 }} 3. {{ $item->jumlah_sparepart_3 }} {{ $item->satuan_sparepart_3 }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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