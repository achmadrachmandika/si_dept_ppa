@extends('layouts.app')

@section('content')
<section>
    <div class="card" style="margin:0px 20px;padding:20px">
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.." title="Type in a name">
                <a href="{{ url('/lp3m')}}" class="btn btn-success" style="width:100%;margin:20px 0px 20px 0px">
                    <label>Buat LP3M</label>
                </a>
            </div>
        </div>
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

        <div class="text-center">
            <table id="myTable" class="table table-striped">
                <thead class="bg-secondary text-white text-center">
                    <tr>
                        <th>No SPR</th>
                        <th>Hasil Pengukuran</th>
                        <th>Penyebab</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Penyelesaian</th>
                        <th>Aksi</th>
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
                                <a href="{{url('show-lp3m/'.$data->no_spr)}}" class="btn btn-secondary">Cek E-SPR</a>
                                <a href="{{url('edit-lp3m/'.$data->no_spr)}}" class="btn btn-warning">Edit</a>
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Data absensi lainnya bisa ditambahkan di sini -->
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

    <!-- /.content -->
    @endsection