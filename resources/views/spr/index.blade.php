@extends('layouts.app')

@section('content')

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin:0px 20px;padding:20px">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold">SPR</h2>
                        <div class="d-flex">  
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.." class="form-control" title="Type in a name">
                            <button onclick="window.location.href='{{ route('spr.create') }}'" class="btn btn-success ml-1" type="button"><span class="h6">Tambah</span></button>

                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <form action="{{route('filter-spr')}}" method="post">
                          @csrf
                          <div class="dropdown">
                              <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                <span class="h6">Tahun</span>
                              </button>
                              <div class="dropdown-content-year" aria-labelledby="dropdownMenuButton">
                                  @foreach($tahuns as $tahun)
                                  <label class="h6"><input type="checkbox" name="tahun[]" value="{{$tahun}}" {{ in_array($tahun, $queryTahun) ? 'checked' : '' }}>{{$tahun}}</label>
                                  @endforeach
                                <button type='button' class="btn btn-primary form-control"id="checkAllBtnYear"><span class="h6">Pilih Semua</span></button>
                                <button type='button' class="btn btn-outline-secondary form-control"id="uncheckAllBtnYear"><span class="h6">Batal</span></button>
                              </div>
                            </div>
      
                            <div class="dropdown">
                              <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                <span class="h6">Bulan</span>
                              </button>
                              <div class="dropdown-content-month" aria-labelledby="dropdownMenuButton">
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="january" {{ in_array('january', $queryBulan) ? 'checked' : '' }}> Januari</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="february" {{ in_array('february', $queryBulan) ? 'checked' : '' }}> Februari</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="march" {{ in_array('march', $queryBulan) ? 'checked' : '' }}> Maret</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="april" {{ in_array('april', $queryBulan) ? 'checked' : '' }}> April</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="may" {{ in_array('may', $queryBulan) ? 'checked' : '' }}> Mei</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="june" {{ in_array('june', $queryBulan) ? 'checked' : '' }}> Juni</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="july" {{ in_array('july', $queryBulan) ? 'checked' : '' }}> Juli</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="august" {{ in_array('august', $queryBulan) ? 'checked' : '' }}> Agustus</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="september" {{ in_array('september', $queryBulan) ? 'checked' : '' }}> September</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="october" {{ in_array('october', $queryBulan) ? 'checked' : '' }}> Oktober</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="november" {{ in_array('november', $queryBulan) ? 'checked' : '' }}> November</label>
                                  <label class="h6"><input type="checkbox" name="bulan[]" value="december" {{ in_array('december', $queryBulan) ? 'checked' : '' }}> Desember</label>
                                  <button type='button' class="btn btn-primary form-control"id="checkAllBtnMonth"><span class="h6">Pilih Semua</span></button>
                                  <button type='button' class="btn btn-outline-secondary form-control"id="uncheckAllBtnMonth"><span class="h6">Batal</span></button>
                              </div>
                            </div>
  
                            <div class="dropdown">
                              <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                <span class="h6">Bagian</span>
                              </button>
                              <div class="dropdown-content-dept" aria-labelledby="dropdownMenuButton">
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="gedung" {{ in_array('gd', $queryBagian) ? 'checked' : '' }}> Gedung</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="instalasi" {{ in_array('ins', $queryBagian) ? 'checked' : '' }}> Instalasi</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="lampu" {{ in_array('lampu', $queryBagian) ? 'checked' : '' }}> Lampu</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="ac" {{ in_array('ac', $queryBagian) ? 'checked' : '' }}> AC</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="mesin_las" {{ in_array('wld', $queryBagian) ? 'checked' : '' }}> Mesin Las</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="mesin" {{ in_array('ms', $queryBagian) ? 'checked' : '' }}> Mesin</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="crane" {{ in_array('crn', $queryBagian) ? 'checked' : '' }}> Crane</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="gardu_listrik" {{ in_array('gdl', $queryBagian) ? 'checked' : '' }}> Gardu Listrik</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="kompresor" {{ in_array('com', $queryBagian) ? 'checked' : '' }}> Kompresor</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="rolling_door" {{ in_array('rd', $queryBagian) ? 'checked' : '' }}> Rolling Door</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="forklift" {{ in_array('fork', $queryBagian) ? 'checked' : '' }}> Forklift</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="tambangan" {{ in_array('tbg', $queryBagian) ? 'checked' : '' }}> Tambangan</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="golf_car" {{ in_array('golf', $queryBagian) ? 'checked' : '' }}> Mobil Golf</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="pompa" {{ in_array('kran', $queryBagian) ? 'checked' : '' }}> Pompa</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="temporary_bogie" {{ in_array('tb', $queryBagian) ? 'checked' : '' }}> Temporary Bogie</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="zeiweg" {{ in_array('zeiweg', $queryBagian) ? 'checked' : '' }}> Zeiweg</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="elevator" {{ in_array('lift', $queryBagian) ? 'checked' : '' }}> Elevator</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="viar" {{ in_array('viar', $queryBagian) ? 'checked' : '' }}> Viar</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="carlifter" {{ in_array('crl', $queryBagian) ? 'checked' : '' }}> Carlifter</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="bejana_tekan" {{ in_array('bjn', $queryBagian) ? 'checked' : '' }}> Bejana Tekan</label>
                                  <label class="h6"><input type="checkbox" name="bagian[]" value="genset" {{ in_array('g-', $queryBagian) ? 'checked' : '' }}> Genset</label>
                                  <button type='button' class="btn btn-primary form-control"id="checkAllBtnDept"><span class="h6">Pilih Semua</span></button>
                                  <button type='button' class="btn btn-outline-secondary form-control"id="uncheckAllBtnDept"><span class="h6">Batal</span></button>
                              </div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                <span class="h6">Status</span>
                              </button>
                              <div class="dropdown-content-status" aria-labelledby="dropdownMenuButton">
                                <label class="h6"><input type="checkbox" name="status[]" value="open" {{ in_array('open', $queryStatus) ? 'checked' : '' }}>Open</label>
                                <label class="h6"><input type="checkbox" name="status[]" value="close" {{ in_array('close', $queryStatus) ? 'checked' : '' }}>Close</label>
                                <button type='button' class="btn btn-primary form-control"id="checkAllBtnStatus"><span class="h6">Pilih Semua</span></button>
                                <button type='button' class="btn btn-outline-secondary form-control"id="uncheckAllBtnStatus"><span class="h6">Batal</span></button>
                            </div>
                          </div>
                          <div class="dropdown">
                            <button type="submit" class="btn btn-success form-control"><span class="h6">Cari</span></button>
                          </div>
                          <div class="dropdown">  
                            <button onclick="ExportToExcel('xlsx')" class="btn btn-outline-info form-control" type="button">
                              <span class="h6">Ekspor</span>
                            </button>
                            
                          </div>
                        </form>
                      </div>
                    </div>
                        
                    
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                      <table id="myTable" class="table table-striped">
                        <!-- Tambahkan id myTable -->
                        <thead class="bg-secondary text-white text-center">
                          <tr>
                            <th style="width: 500px; white-space: nowrap;">Nama</th>
                            <th style="width: 500px; white-space: nowrap;">Kode Mesin</th>
                            <th style="width: 500px; white-space: nowrap;">Lokasi</th>
                            <th style="width: 500px; white-space: nowrap;">Status</th>
                            <th style="width: 500px; white-space: nowrap;">No SPR</th>
                            <th style="width: 500px; white-space: nowrap;">No Aset</th>
                            <th style="width: 500px; white-space: nowrap;">Tanggal Kerusakan</th>
                            <th style="width: 500px; white-space: nowrap;">Tanggal SPR diterima</th>
                            <th style="width: 500px; white-space: nowrap;">User Peminta</th>
                            <th style="width: 500px; white-space: nowrap;">Deskripsi Kerusakan</th>
                            <th style="width: 500px; white-space: nowrap;">Site</th>
                           <th style="width: 500px; white-space: nowrap;">LP3M</th>
                            <th width="150px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($spr as $crud)
                          <tr>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->nama_barang }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->kode_mesin }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->lokasi }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->status_kerusakan }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->nomor_spr }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->no_aset }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->tanggal_kerusakan}}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->tanggal_sprditerima}}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->user_peminta }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->deskripsi_kerusakan }}</td>
                            <td style="width: 500px; white-space: nowrap;">{{ $crud->site }}</td>
                            <td>
                              <!-- Tambahkan logika untuk menampilkan tanda jika nomor SPR sudah di LP3M -->
                              @if($crud->status == 'close')
                              <span class="spr-filled text-danger">Closed</span>
                              @else
                              <span class="spr-filled text-primary">Open</span>
                              @endif
                          </td>
                          <td>
                              <div class="d-flex">
                                  <!-- Tombol Show akan selalu aktif -->
                                  <a class="btn btn-outline-info mr-2"
                                      href="{{ route('spr.show', $crud->nomor_spr) }}">Lihat</a>
                                  <!-- Tombol Edit dan Delete akan dinonaktifkan jika nomor SPR sudah di LP3M -->
                                  @if($crud->status == 'open')
                                  <a class="btn btn-outline-primary mr-2"
                                      href="{{ route('spr.edit', $crud->nomor_spr) }}">Edit</a>
                                  <form action="{{ route('spr.destroy',$crud->nomor_spr) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this record?')">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                  </form>
                                   @endif
                              </div>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                </div>
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
        td = tr[i].getElementsByTagName("td")[3]; // Ubah indeks kolom menjadi 0 untuk mencari berdasarkan nama
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
       var fileName = 'Tabel SPR ' + dateString + '.' + (type || 'xlsx');

       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fileName);
    }
</script>

@endsection