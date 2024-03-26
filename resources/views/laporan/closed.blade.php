@extends('layouts.app')

@section('content')
<title>INKA | PPA | SPR-CLOSED</title>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">List SPR dengan Status SPR Closed</div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Cari Nomor SPR.." aria-label="Cari Nomor SPR" aria-describedby="button-addon2">
                    <div class="dropdown">
                        <button onclick="ExportToExcel('xlsx')" class="btn btn-outline-info form-control" type="button">
                            <span class="h6">Ekspor</span>
                        </button>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="{{route('filter-closed')}}" method="post">
                            @csrf
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button"
                                    id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                    <span class="h6">Tahun</span>
                                </button>
                                <div class="dropdown-content-year" aria-labelledby="dropdownMenuButton">
                                    @foreach($tahuns as $tahun)
                                    <label class="h6"><input type="checkbox" name="tahun[]" value="{{$tahun}}" {{ in_array($tahun,
                                            $queryTahun) ? 'checked' : '' }}>{{$tahun}}</label>
                                    @endforeach
                                    <button type='button' class="btn btn-primary form-control" id="checkAllBtnYear"><span
                                            class="h6">Pilih Semua</span></button>
                                    <button type='button' class="btn btn-outline-secondary form-control" id="uncheckAllBtnYear"><span
                                            class="h6">Batal</span></button>
                                </div>
                            </div>
                
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButtonMonth"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="h6">Bulan</span>
                                </button>
                                <div class="dropdown-content-month" aria-labelledby="dropdownMenuButton">
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="january" {{ in_array('january',
                                            $queryBulan) ? 'checked' : '' }}> Januari</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="february" {{ in_array('february',
                                            $queryBulan) ? 'checked' : '' }}> Februari</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="march" {{ in_array('march',
                                            $queryBulan) ? 'checked' : '' }}> Maret</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="april" {{ in_array('april',
                                            $queryBulan) ? 'checked' : '' }}> April</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="may" {{ in_array('may', $queryBulan)
                                            ? 'checked' : '' }}> Mei</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="june" {{ in_array('june',
                                            $queryBulan) ? 'checked' : '' }}> Juni</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="july" {{ in_array('july',
                                            $queryBulan) ? 'checked' : '' }}> Juli</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="august" {{ in_array('august',
                                            $queryBulan) ? 'checked' : '' }}> Agustus</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="september" {{ in_array('september',
                                            $queryBulan) ? 'checked' : '' }}> September</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="october" {{ in_array('october',
                                            $queryBulan) ? 'checked' : '' }}> Oktober</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="november" {{ in_array('november',
                                            $queryBulan) ? 'checked' : '' }}> November</label>
                                    <label class="h6"><input type="checkbox" name="bulan[]" value="december" {{ in_array('december',
                                            $queryBulan) ? 'checked' : '' }}> Desember</label>
                                    <button type='button' class="btn btn-primary form-control" id="checkAllBtnMonth"><span
                                            class="h6">Pilih Semua</span></button>
                                    <button type='button' class="btn btn-outline-secondary form-control" id="uncheckAllBtnMonth"><span
                                            class="h6">Batal</span></button>
                                </div>
                            </div>
                
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButtonDept"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="h6">Bagian</span>
                                </button>
                                <div class="dropdown-content-dept" aria-labelledby="dropdownMenuButton">
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="gedung" {{ in_array('gd',
                                            $queryBagian) ? 'checked' : '' }}> Gedung</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="instalasi" {{ in_array('ins',
                                            $queryBagian) ? 'checked' : '' }}> Instalasi</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="lampu" {{ in_array('lampu',
                                            $queryBagian) ? 'checked' : '' }}> Lampu</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="ac" {{ in_array('ac', $queryBagian)
                                            ? 'checked' : '' }}> AC</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="mesin_las" {{ in_array('wld',
                                            $queryBagian) ? 'checked' : '' }}> Mesin Las</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="mesin" {{ in_array('ms',
                                            $queryBagian) ? 'checked' : '' }}> Mesin</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="crane" {{ in_array('crn',
                                            $queryBagian) ? 'checked' : '' }}> Crane</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="gardu_listrik" {{ in_array('gdl',
                                            $queryBagian) ? 'checked' : '' }}> Gardu Listrik</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="kompresor" {{ in_array('com',
                                            $queryBagian) ? 'checked' : '' }}> Kompresor</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="rolling_door" {{ in_array('rd',
                                            $queryBagian) ? 'checked' : '' }}> Rolling Door</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="forklift" {{ in_array('fork',
                                            $queryBagian) ? 'checked' : '' }}> Forklift</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="tambangan" {{ in_array('tbg',
                                            $queryBagian) ? 'checked' : '' }}> Tambangan</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="golf_car" {{ in_array('golf',
                                            $queryBagian) ? 'checked' : '' }}> Mobil Golf</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="pompa" {{ in_array('kran',
                                            $queryBagian) ? 'checked' : '' }}> Pompa</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="temporary_bogie" {{ in_array('tb',
                                            $queryBagian) ? 'checked' : '' }}> Temporary Bogie</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="zweiweg" {{ in_array('zweiweg',
                                            $queryBagian) ? 'checked' : '' }}> Zeiweg</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="elevator" {{ in_array('lift',
                                            $queryBagian) ? 'checked' : '' }}> Elevator</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="viar" {{ in_array('viar',
                                            $queryBagian) ? 'checked' : '' }}> Viar</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="carlifter" {{ in_array('crl',
                                            $queryBagian) ? 'checked' : '' }}> Carlifter</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="bejana_tekan" {{ in_array('bjn',
                                            $queryBagian) ? 'checked' : '' }}> Bejana Tekan</label>
                                    <label class="h6"><input type="checkbox" name="bagian[]" value="genset" {{ in_array('g-',
                                            $queryBagian) ? 'checked' : '' }}> Genset</label>
                                    <button type='button' class="btn btn-primary form-control" id="checkAllBtnDept"><span
                                            class="h6">Pilih Semua</span></button>
                                    <button type='button' class="btn btn-outline-secondary form-control" id="uncheckAllBtnDept"><span
                                            class="h6">Batal</span></button>
                                </div>

                            </div>
                            <div class="dropdown">
                                <button type="submit" class="btn btn-success form-control"><span class="h6">Cari</span></button>
                            </div>
                            </form>
                            </div>
                            </div>

                <div class="table-responsive" style="overflow-x: auto; margin-right: 0;">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="width: 500px; white-space: nowrap;">Nomor SPR</th>
                                <th style="width: 500px; white-space: nowrap;">Nama Barang</th>
                                <th style="width: 500px; white-space: nowrap;">Kode Mesin</th>
                                <th>Lokasi</th>
                                <th style="width: 500px; white-space: nowrap;">Tanggal Kerusakan</th>
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
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kode_mesin }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->tanggal_kerusakan }}</td>
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
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selesai }}</td>
                                <td>{{ $item->penyelesaian }}</td>
                                
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

                                    <td>
                                        @for ($i = 1; $i <= 10; $i++) @if (!empty($item["nama_personil_$i"])) <p><span style="color: red;">{{ $i }}.</span>
                                            {{ $item["nama_personil_$i"] }}</p>
                                           
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
      var checkAllBtnYear = document.getElementById('checkAllBtnYear');
      var uncheckAllBtnYear = document.getElementById('uncheckAllBtnYear');
      var checkAllBtnMonth = document.getElementById('checkAllBtnMonth');
      var uncheckAllBtnMonth = document.getElementById('uncheckAllBtnMonth');
      var checkAllBtnDept = document.getElementById('checkAllBtnDept');
      var uncheckAllBtnDept = document.getElementById('uncheckAllBtnDept');
      var checkAllBtnStatus = document.getElementById('checkAllBtnStatus');
      var uncheckAllBtnStatus = document.getElementById('uncheckAllBtnStatus');
    
      checkAllBtnYear.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-year input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnYear.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-year input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });

      checkAllBtnMonth.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-month input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnMonth.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-month input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });
        checkAllBtnDept.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-dept input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnDept.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-dept input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });

      checkAllBtnStatus.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-status input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnStatus.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-status input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });
      
    });
</script>

<script>
    function ExportToExcel(type, dl) {
       var elt = document.getElementById('myTable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1", autoSize: true });

       // Mendapatkan tanggal saat ini
       var currentDate = new Date();
       var dateString = currentDate.toISOString().slice(0,10);

       // Gabungkan tanggal dengan nama file
       var fileName = 'Tabel SPR Closed ' + dateString + '.' + (type || 'xlsx');

       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fileName);
    }
</script>

@endsection