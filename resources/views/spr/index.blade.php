@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold">SPR</h2>
                        <div class="d-flex">
                            <form class="form-inline" action="{{ route('spr.index') }}" method="POST">
                                <input type="text" value="{{ request()->input('cari') }}" name="cari"
                                    class="form-control mr-2" placeholder="Cari SPR">
                                <button type="submit" class="btn btn-primary mr-2">Cari</button>
                            </form>
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>No SPR</th>
                                    <th>No Aset</th>
                                    <th>Jam Kerusakan</th>
                                    <th>Tanggal SPR</th>
                                    <th>Approv GA</th>
                                    <th>Deskripsi Kerusakan</th>
                                    <th>Penyebab Kerusakan</th>
                                    <th>Site</th>
                                    <th>Kode Mesin</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spr as $crud)
                                <tr>
                                    {{-- <td>{{ $crud->id }}</td> --}}
                                    <td>{{ $crud->nama_barang }}</td>
                                    <td>{{ $crud->lokasi }}</td>
                                    <td>{{ $crud->status_kerusakan }}</td>
                                    <td>{{ $crud->no_spr }}</td>
                                    <td>{{ $crud->no_aset }}</td>
                                    <td>{{ $crud->jam_kerusakan}}</td>
                                    <td>{{ $crud->tanggal_kerusakan}}</td>
                                    <td>{{ $crud->pic_penerima }}</td>
                                    <td>{{ $crud->deskripsi_kerusakan }}</td>
                                    <td>{{ $crud->keterangan }}</td>
                                    <td>{{ $crud->site }}</td>
                                    <td>{{ $crud->kode_mesin }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-outline-info mr-2"
                                                href="{{ route('spr.show', $crud->no_spr) }}">Show</a>
                                            <a class="btn btn-outline-primary mr-2"
                                                href="{{ route('spr.edit', $crud->no_spr) }}">Edit</a>
                                            <form action="{{ route('spr.destroy',$crud->no_spr) }}" method="POST">
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
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endsection