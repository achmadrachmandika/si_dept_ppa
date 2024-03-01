@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk memperkuat garis tepi tabel */
    .table-bordered th,
    .table-bordered td {
        border: 2px solid #000 !important;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #000;">
                    <img src="{{ asset('assets/dist/img/logo_INKA2.png') }}" alt="logo inka"
                        style="width: 150px; height: 40px; float: left50px;">
                    <h5 class="text-center" style="margin-top: 15px;"><u>SURAT PERMINTAAN
                            PERAWATAN/PERBAIKAN</u><br>(SPR)</h5>
                    <p></p>
                    <p>Kepada<br>Yth.SM Pengendalian dan Pemeliharaan Aset</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td> <b>Nama Mesin/Bangunan/Fasilitas:</b> {{ $barang->nama_barang }}</td>
                                            <td><b>Lokasi:</b><br>{{ $barang->lokasi }}</td>
                                            <td><b>Tanggal Kerusakan:</b><br>{{ $barang->tanggal_kerusakan }}</td>
                                            <td><b>NO. SPR:</b><br>{{ $barang->no_spr }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Mesin/Nomor Mesin:</b><br>{{ $barang->kode_mesin }}</td>
                                            <td><b>No. Inventaris/Aset:</b><br>{{ $barang->no_aset }}</td>
                                            <td><b>Jam Kerusakan:</b><br>{{ $barang->jam_kerusakan }}</td>
                                            <td><b>User Peminta:</b><br>{{ $barang->user_peminta }}</td>
                                       
                                        </tr>
                                        <tr>
                                        <td style="width: 300px; max-width: 300px; min-width: 300px;"><b>Uraian Kerusakan:</b><br>{{ $barang->deskripsi_kerusakan }}</td>
                                            <td><b>Site:</b><br>{{ $barang->site }}</td>
                                            <td colspan="3"><b>Kondisi Mesin:</b><br>{{ $barang->status_kerusakan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="font-size: 0.9em; font-weight: normal;">*Lembar warna putih untuk Dep. PPA,
                                    lembar warna kuning untuk GA dan
                                    PAP, lembar warna merah untuk user.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <a class="btn btn-success btn-sm" href="{{ route('spr.index') }}">Kembali</a>
            {{-- <a class="btn btn-primary btn-sm ml-2" href="{{ route('spr.pdf') }}">Cetak PDF</a> --}}
        </div>
    </div>
</div>
@endsection