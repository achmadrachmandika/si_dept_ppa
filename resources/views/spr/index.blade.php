@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin:0px 20px;padding:20px">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold">SPR</h2>
                        <div class="d-flex">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.."
                                title="Type in a name">
                            <a href="{{ route('spr.create') }}" class="btn btn-outline-success">Tambah</a>
                        </div>
                    </div>
                    <form action="{{route('filter-spr')}}" method="post">
                        @csrf
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                              Tahun
                            </button>
                            <div class="dropdown-content-year" aria-labelledby="dropdownMenuButton">
                                @foreach($tahuns as $tahun)
                                <label><input type="checkbox" name="tahun[]" value="{{$tahun}}" {{ in_array($tahun, $queryTahun) ? 'checked' : '' }}>{{$tahun}}</label>
                                @endforeach
                              <a class="btn btn-outline-primary form-control"id="checkAllBtnYear">Check Semua</a>
                              <a class="btn btn-outline-secondary form-control"id="uncheckAllBtnYear">Uncheck Semua</a>
                            </div>
                          </div>
    
                          <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                              Bulan
                            </button>
                            <div class="dropdown-content-month" aria-labelledby="dropdownMenuButton">
                                <label><input type="checkbox" name="bulan[]" value="january" {{ in_array('january', $queryBulan) ? 'checked' : '' }}> Januari</label>
                                <label><input type="checkbox" name="bulan[]" value="february" {{ in_array('february', $queryBulan) ? 'checked' : '' }}> Februari</label>
                                <label><input type="checkbox" name="bulan[]" value="march" {{ in_array('march', $queryBulan) ? 'checked' : '' }}> Maret</label>
                                <label><input type="checkbox" name="bulan[]" value="april" {{ in_array('april', $queryBulan) ? 'checked' : '' }}> April</label>
                                <label><input type="checkbox" name="bulan[]" value="may" {{ in_array('may', $queryBulan) ? 'checked' : '' }}> Mei</label>
                                <label><input type="checkbox" name="bulan[]" value="june" {{ in_array('june', $queryBulan) ? 'checked' : '' }}> Juni</label>
                                <label><input type="checkbox" name="bulan[]" value="july" {{ in_array('july', $queryBulan) ? 'checked' : '' }}> Juli</label>
                                <label><input type="checkbox" name="bulan[]" value="august" {{ in_array('august', $queryBulan) ? 'checked' : '' }}> Agustus</label>
                                <label><input type="checkbox" name="bulan[]" value="september" {{ in_array('september', $queryBulan) ? 'checked' : '' }}> September</label>
                                <label><input type="checkbox" name="bulan[]" value="october" {{ in_array('october', $queryBulan) ? 'checked' : '' }}> Oktober</label>
                                <label><input type="checkbox" name="bulan[]" value="november" {{ in_array('november', $queryBulan) ? 'checked' : '' }}> November</label>
                                <label><input type="checkbox" name="bulan[]" value="december" {{ in_array('december', $queryBulan) ? 'checked' : '' }}> Desember</label>
                              <a class="btn btn-outline-primary form-control"id="checkAllBtnMonth">Check Semua</a>
                              <a class="btn btn-outline-secondary form-control"id="uncheckAllBtnMonth">Uncheck Semua</a>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-success">Cari</button>
                    </form>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <!-- Tambahkan id myTable -->
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>No SPR</th>
                                    <th>No Aset</th>
                                    <th>Tanggal Kerusakan</th>
                                    <th>Tanggal SPR diterima</th>
                                    <th>User Peminta</th>
                                    <th>Deskripsi Kerusakan</th>
                                    <th>Site</th>
                                    <th>Kode Mesin</th>
                                    <th>LP3M</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spr as $crud)
                                <tr>
                                    <td>{{ $crud->nama_barang }}</td>
                                    <td>{{ $crud->lokasi }}</td>
                                    <td>{{ $crud->status_kerusakan }}</td>
                                    <td>{{ $crud->nomor_spr }}</td>
                                    <td>{{ $crud->no_aset }}</td>
                                    <td>{{ $crud->tanggal_kerusakan}}</td>
                                    <td>{{ $crud->tanggal_sprditerima}}</td>
                                    <td>{{ $crud->user_peminta }}</td>
                                    <td>{{ $crud->deskripsi_kerusakan }}</td>
                                    <td>{{ $crud->site }}</td>
                                    <td>{{ $crud->kode_mesin }}</td>
                                    <td>
                                        <!-- Tambahkan logika untuk menampilkan tanda jika nomor SPR sudah di LP3M -->
                                        @if(in_array($crud->nomor_spr, $lp3mSprs))
                                        <span class="spr-filled text-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Tombol Show akan selalu aktif -->
                                            <a class="btn btn-outline-info mr-2"
                                                href="{{ route('spr.show', $crud->nomor_spr) }}">Show</a>
                                            <!-- Tombol Edit dan Delete akan dinonaktifkan jika nomor SPR sudah di LP3M -->
                                            @if(!in_array($crud->nomor_spr, $lp3mSprs))
                                            <a class="btn btn-outline-primary mr-2"
                                                href="{{ route('spr.edit', $crud->nomor_spr) }}">Edit</a>
                                            <form action="{{ route('spr.destroy',$crud->nomor_spr) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
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
    });
    </script>

    

@endsection
