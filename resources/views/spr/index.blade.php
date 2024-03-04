@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold">SPR</h2>
                        <div class="d-flex">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No SPR.."
                                title="Type in a name">
                            <a href="{{ route('spr.create') }}" class="btn btn-success">Tambah</a>
                        </div>
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
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>No SPR</th>
                                    <th>No Aset</th>
                                    <th>Jam Kerusakan</th>
                                    <th>Tanggal SPR</th>
                                    <th>Tanggal SPR diterima</th>
                                    <th>Jam SPR diterima</th>
                                    <th>User Peminta</th>
                                    <th>Deskripsi Kerusakan</th>
                                    <th>Site</th>
                                    <th>Kode Mesin</th>
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
                                    <td>{{ $crud->jam_kerusakan}}</td>
                                    <td>{{ $crud->tanggal_kerusakan}}</td>
                                    <td>{{ $crud->tanggal_sprditerima}}</td>
                                    <td>{{ $crud->jam_sprditerima}}</td>
                                    <td>{{ $crud->user_peminta }}</td>
                                    <td>{{ $crud->deskripsi_kerusakan }}</td>
                                    <td>{{ $crud->site }}</td>
                                    <td>{{ $crud->kode_mesin }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-outline-info mr-2"
                                                href="{{ route('spr.show', $crud->nomor_spr) }}">Show</a>
                                            <a class="btn btn-outline-primary mr-2"
                                                href="{{ route('spr.edit', $crud->nomor_spr) }}">Edit</a>
                                            <form action="{{ route('spr.destroy',$crud->nomor_spr) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
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
    <div class="row mt-3">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $spr->links() }}
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
@endsection