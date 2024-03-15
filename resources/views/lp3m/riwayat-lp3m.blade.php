@extends('layouts.app')

@section('content')
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
                                @foreach($datas->sortByDesc('tanggal') as $data)
                                <!-- Mengurutkan data berdasarkan tanggal secara descending -->
                                <tr>
                                    <td>{{$data->no_spr}}</td>
                                    <td>{{$data->hasil_pengukuran}}</td>
                                    <td>{{$data->penyebab_kerusakan}} ({{$data->alasan}})</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->jam_mulai}}</td>
                                    <td>{{$data->penyelesaian}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ url('delete-lp3m/'.$data->no_spr) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{url('show-lp3m/'.$data->no_spr)}}" class="btn btn-outline-info mb-1">Show</a>
                                            <a href="{{url('edit-lp3m/'.$data->no_spr)}}" class="btn btn-outline-primary mb-1">Edit</a>
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-outline-danger mb-1">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Data absensi lainnya bisa ditambahkan di sini -->
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

    <!-- /.content -->
    @endsection