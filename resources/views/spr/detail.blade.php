<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail SPR</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk memperkuat garis tepi tabel */
    .table-bordered th,
    .table-bordered td {
        border: 2px solid #000 !important;
    }
</style>

    <div class="container bordered bg-white">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row">
                    <div class="col-2 text-center"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}"
                            alt="logo inka"></div>
                    <div class="col-8 text-center"></div>
                    <div class="col-2 text-center"></div>
                </div>
                <div class="row">
                    <div class="col-12 text-center page-title" style="font-size: 24px;"><u>SURAT PERMINTAAN PERAWATAN /
                            PERBAIKAN</u>
                        <p>SPR</p>
                    </div>
                    Kepada<br>
                    Yth. SM Pengendalian dan Pemeliharaan Aset
                </div>
                
                <div class="row">
                    <div class="col-4 bordered text-center">
                        <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                        <div>{{ $barang->nama_barang }}</div>
                    </div>
                
                    <div class="col-2 bordered text-center">
                        <label for="lokasi">Lokasi *</label>
                        <div>{{ $barang->lokasi }}</div>
                    </div>
                    <div class="col-2 bordered text-center">
                        <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                        <div>{{ $barang->tanggal_kerusakan }}</div>
                    </div>
                    <div class="col-4 bordered text-center">
                        <label for="no_spr">No SPR*</label>
                        <div>{{ $barang->no_spr }}</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4 bordered text-center">
                        <label for="kode_mesin">Kode Mesin/Nomor Mesin*</label>
                        <div>{{ $barang->kode_mesin }}</div>
                    </div>
                
                    <div class="col-2 bordered text-center">
                        <label for="no_aset">No. Inventaris/Aset*</label>
                        <div>{{ $barang->no_aset }}</div>
                    </div>
                    <div class="col-2 bordered text-center">
                        <label for="jam_kerusakan">Jam Kerusakan*</label>
                        <div>{{ $barang->jam_kerusakan }}</div>
                    </div>
                    <div class="col-4 bordered text-center">
                        <label for="user_peminta">User Peminta*</label>
                        <div>{{ $barang->user_peminta }}</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-8 bordered" style="height: 200px;">
                        <label for="deskripsi_kerusakan">Uraian Kerusakan*</label>
                        <div>{{ $barang->deskripsi_kerusakan }}</div>
                        <div style="margin-top: 10px;">
                            <td colspan="2" style="height: 10vh;">Kondisi Mesin<br>{{
                                $barang->status_kerusakan }}</td>
                        </div>
                    </div>
                
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12 bordered text-center" style="height: 80px;">
                                <label style="font-size: 11px;">Departemen <br> Pengendalian & Pemeliharaan Aset</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 bordered text-center" style="height: 120px;>
                                        <label for=" tanggal_sprditerima">SPR diterima tanggal, jam*</label>
                                <div>{{ $barang->tanggal_sprditerima }} {{ $barang->jam_sprditerima }}</div>
                                <div style="margin-top: 10px;">
                                    <td colspan="2" style="text-align: center;"><b>Site</b><br>{{ $barang->site }}</td>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <p style="font-size: 0.7em; font-weight: normal;">*Lembar warna putih untuk Dep. PPA,
                    lembar warna kuning untuk GA dan
                    PAP, lembar warna merah untuk user.</p>
            </div>
            <div class="col-1"></div>
        </div>
        
        
</div>
<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <a class="btn btn-success btn-sm" href="{{ route('spr.index') }}">Kembali</a>
        {{-- <a class="btn btn-primary btn-sm ml-2" href="{{ route('spr.pdf') }}">Cetak PDF</a> --}}
    </div>
</div>

@endsection