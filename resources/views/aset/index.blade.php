@extends('layouts.app')

@section('content')
<title>INKA | PPA | ASET</title>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <div class="card" style="margin:0px 20px;padding:20px">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="font-weight-bold">Daftar Aset</h2>
                <div class="d-flex">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No Unit.." class="form-control"
                    title="Type in a name">
                  <button onclick="window.location.href='{{ route('aset.create') }}'" class="btn btn-success ml-1" type="button"><span
                      class="h6">Tambah</span></button>
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
            <div class="table-responsive" style="text-align: center;">
              <table id="myTable" class="table table-striped">
                <thead class="bg-secondary text-white text-center">
                  <tr>
                    <th>No Unit</th>
                    <th>Nama Unit</th>
                    <th>No Aset</th>
                    <th>Tipe</th>
                    <th>Equipment</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($asets as $aset)
                  <tr>
                    <td>{{ $aset->no_unit }}</td>
                    <td>{{ $aset->nama_unit }}</td>
                    <td>{{ $aset->no_aset }}</td>
                    <td>{{ $aset->equipment }}</td>
                    <td>{{ $aset->tipe }}</td>

                  <td>
                      <div class="d-flex">
                          <a class="btn btn-outline-primary mr-2"
                              href="{{ route('aset.edit', $aset->no_unit) }}">Edit</a>
                          <form action="{{ route('aset.destroy',$aset->no_unit) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this record?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger">Hapus</button>
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


