@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<section>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin:0px 20px;padding:20px">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="font-weight-bold">LP3M</h2>
                            <div class="d-flex">  
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.." class="form-control" title="Type in a name">
                                <button onclick="window.location.href='{{ url('/lp3m') }}'" class="btn btn-success ml-1" type="button"><span class="h6">Tambah</span></button>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <form action="{{route('filter-lp3m')}}" method="post">
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
                        @if (session('message'))
                        <div class="row">
                            <div class="col">
                                <div class="alert-con">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <label>{{ session('message') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif (session('message-delete'))
                        <div class="row">
                            <div class="col">
                                <div class="alert-con">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <label>{{ session('message-delete') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                          <table id="myTable" class="table table-striped">
                            <!-- Tambahkan id myTable -->
                            <thead class="bg-secondary text-white text-center">
                                <tr>
                                    <th style="width: 100px; white-space: nowrap;">No SPR</th>
                                    <th style="width: 500px; white-space: nowrap;">Hasil Pengukuran</th>
                                    <th style="width: 500px; white-space: nowrap;">Penyebab</th>
                                    <th style="width: 500px; white-space: nowrap;">Tanggal</th>
                                    <th style="width: 500px; white-space: nowrap;">Jam Mulai</th>
                                    <th style="width: 500px; white-space: nowrap;">Penyelesaian</th>
                                    <th style="width: 500px; white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lp3ms->sortByDesc('tanggal') as $lp3m)
                                <!-- Mengurutkan lp3m berdasarkan tanggal secara descending -->
                                <tr>
                                    <td>{{$lp3m->no_spr}}</td>
                                    <td>{{$lp3m->hasil_pengukuran}}</td>
                                    <td>{{$lp3m->penyebab_kerusakan}} ({{$lp3m->alasan}})</td>
                                    <td>{{$lp3m->tanggal}}</td>
                                    <td>{{$lp3m->jam_mulai}}</td>
                                    <td>{{$lp3m->penyelesaian}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ url('delete-lp3m/'.$lp3m->no_spr) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{url('show-lp3m/'.$lp3m->no_spr)}}" class="btn btn-outline-info mb-1">Show</a>
                                            <a href="{{url('edit-lp3m/'.$lp3m->no_spr)}}" class="btn btn-outline-primary mb-1">Edit</a>
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-outline-danger mb-1">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Data absensi lainnya bisa ditambahkan di sini -->
                                <!-- Bagian pagination -->
                                

                            </tbody>
                          </table>
                                {{-- <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        Tautan Previous
                                        @if ($lp3ms->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                        @else
                                        <li class="page-item"><a class="page-link" href="{{ $lp3ms->previousPageUrl() }}"
                                                rel="prev">Previous</a></li>
                                        @endif
                        
                                        Tautan Pagination
                                        @for ($i = 1; $i <= $lp3ms->lastPage(); $i++)
                                            <li class="page-item {{ $lp3ms->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $lp3ms->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endfor
                        
                                            Tautan Next
                                            @if ($lp3ms->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $lp3ms->nextPageUrl() }}" rel="next">Next</a>
                                            </li>
                                            @else
                                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                                            @endif
                                    </ul>
                                </nav> --}}
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

<script>
  function ExportToExcel(type, dl) {
       var elt = document.getElementById('myTable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1", autoSize: true });

       // Mendapatkan tanggal saat ini
       var currentDate = new Date();
       var dateString = currentDate.toISOString().slice(0,10);

       // Gabungkan tanggal dengan nama file
       var fileName = 'Tabel LP3M ' + dateString + '.' + (type || 'xlsx');

       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fileName);
    }
</script>

    <!-- /.content -->
    @endsection