@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mt-4">
            <div class="card-body">
                <h2 class="font-weight-bold">DAFTAR SPAREPART</h2>
                <div class="d-flex">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Kode Material.."
                        class="form-control" title="Type in a name">
                    <button onclick="window.location.href='{{ route('spareparts.create') }}'"
                        class="btn btn-success ml-1" type="button"><span class="h6">Tambah</span></button>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <table id="myTable" class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>Kode Material</th>
                            <th>Nama Material</th>
                            <th>Spek Material</th>
                            <th style="width: 280px; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($spareparts as $sparepart)
                        <tr>
                            <td>{{ $sparepart->kode_material }}</td>
                            <td>{{ $sparepart->nama_material }}</td>
                            <td>{{ $sparepart->spek_material }}</td>
                            <td class="text-center">
                                <form action="{{ route('spareparts.destroy',$sparepart->kode_material) }}" method="POST">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-outline-primary mr-2" href="{{ route('spareparts.edit',$sparepart->kode_material) }}">Edit</a>
                                        <form action="{{ route('spareparts.destroy', $sparepart->kode_material) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirmDelete()">Hapus</button>
                                        </form>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Tautan Previous --}}
                        @if ($spareparts->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $spareparts->previousPageUrl() }}"
                                rel="prev">Previous</a></li>
                        @endif

                        {{-- Tautan Pagination --}}
                        @for ($i = 1; $i <= $spareparts->lastPage(); $i++)
                            <li class="page-item {{ $spareparts->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $spareparts->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            {{-- Tautan Next --}}
                            @if ($spareparts->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $spareparts->nextPageUrl() }}"
                                    rel="next">Next</a>
                            </li>
                            @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                    </ul>
                </nav>
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

    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus Sparepart ini?');
    }
</script>
@endsection