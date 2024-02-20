@extends('layout.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Halaman Data Surat Permintaan Perawatan / Perbaikan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Surat Permintaan Perawatan / Perbaikan</h5>
                        <h6 class="card-subtitle text-muted">Berisi data surat permintaan perawatan atau perbaikan yang
                            telah diajukan.</h6>
                    </div>
                    <div class="card-body">
                        <a type="button" href="{{ route('proses-pengisian-barang') }}"
                            class="btn btn-success rounded-5 mb-3">Tambah Data</a>

                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Kerusakan</th>
                                    <th>Nomor SPR</th>
                                    <th>Kode Mesin</th>
                                    <th>Nomor Aset</th>
                                    <th>Jam Kerusakan</th>
                                    <th>PIC Penerima</th>
                                    <th>Deskripsi Kerusakan</th>
                                    <th>Site</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->lokasi }}</td>
                                    <td>{{ $barang->tanggal_kerusakan }}</td>
                                    <td>{{ $barang->no_spr }}</td>
                                    <td>{{ $barang->kode_mesin }}</td>
                                    <td>{{ $barang->no_aset }}</td>
                                    <td>{{ $barang->jam_kerusakan }}</td>
                                    <td>{{ $barang->pic_penerima }}</td>
                                    <td>{{ $barang->deskripsi_kerusakan }}</td>
                                    <td>{{ $barang->site }}</td>
                                    <td>{{ $barang->keterangan }}</td>
                                    <td>
                                        <form action="{{ route('dashboard.spr.destroy',$barang->id) }}" method="post">
                                            <a class="btn btn-info"
                                                href="{{ route('dashboard.spr.edit',$barang->id) }}"><i
                                                    class="align-middle" data-feather="edit-2"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="align-middle"
                                                    data-feather="trash"></i></button>
                                        </form>
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
</main>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection