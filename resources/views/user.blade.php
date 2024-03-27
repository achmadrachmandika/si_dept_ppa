@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="font-weight-bold" style="opacity: 0.5; font-family: 'Open Sans', sans-serif;">Data
                        Peminta SPR</h2>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()"
                        placeholder="Cari Nama.." title="Type in a name">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th> <!-- Menambahkan kolom Action -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td> <!-- Mengakses nama user -->
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- Form untuk metode DELETE -->
                                        <form id="deleteForm{{ $user->id }}"
                                            action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Tombol Delete -->
                                            <button type="submit" class="btn btn-danger">Delete</button>
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

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table"); // Menggunakan class "table" sebagai selector
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            // Menggunakan seluruh kolom dalam setiap baris untuk pencarian
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Hentikan loop jika ditemukan kecocokan
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>



@endsection