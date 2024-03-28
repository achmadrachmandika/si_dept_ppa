@extends('layouts.app')

@section('content')
<title>INKA | PPA | SPAREPART</title>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<div class="card" style="margin:0px 20px;padding:20px">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-weight-bold">Daftar Sparepart</h2>
            <div class="d-flex">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Kode Material.."
                    class="form-control" title="Type in a name">
                <button onclick="window.location.href='{{ route('spareparts.create') }}'"
                    class="btn btn-success ml-1" type="button"><span class="h6">Tambah</span></button>
                    <div class="dropdown">
                            <button onclick="ExportToExcel('xlsx')" class="btn btn-info form-control ml-1" type="button">
                                <span class="h6">Ekspor</span>
                            </button>
                        </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('message-delete'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif

        <table id="myTable" class="table table-striped mt-4" style="text-align: center;">
            <thead class="bg-secondary text-white text-center">
                <tr>
                    <th style="width: 50px; white-space: nowrap;">Kode Material</th>
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