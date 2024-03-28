@extends('layouts.app')

@section('content')

{{-- <title>INKA | PPA | PREVENTIVE MAINTENANCE</title> --}}
{{-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<div class="card" style="margin:0px 20px;padding:20px;overflow-x:auto;">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-weight-bold">Daftar PREVENTIVE MAINTENANCE</h2>
            <div class="d-flex">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="No Unit.." class="form-control"
                    title="Type in a name">
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
                    <th style="width: 50px; white-space: nowrap;">No Unit</th>
                    <th>Nama Mesin</th>
                    <th>Equipment</th>
                    <th>No Aset</th>
                    <th>Lokasi</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maret</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Juli</th>
                    <th>Agustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>Desember</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($jadwalPmBulanan as $jadwal)
            <tr>
                @foreach ($jadwal->getAttributes() as $attribute => $value)
                <td>{{ $value }}</td>
                @endforeach
                <td class="text-center">
                    <!-- Tambahkan tombol aksi di sini -->
                </td>
            </tr>
            {{-- @empty
            <tr>
                <td colspan="{{ count($jadwal->getAttributes()) + 1 }}" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse --}}
        {{-- </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center"> --}}
                {{-- Pagination links --}}
            {{-- </ul>
        </nav>
    </div>
</div> --}}



@endsection