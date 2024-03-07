<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SPR No. {{ $barang->nomor_spr }}</title>
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        <style>
            /* CSS untuk memperkuat garis tepi tabel */
            .table-bordered th,
            .table-bordered td {
                border: 2px solid #000 !important;
            }
        </style>
    
    </head>
    {{-- @extends('layouts.app')

@section('content') --}}
<body>
    <div class="container bordered bg-white">
        <div id="printPage">
            <div class="row" >
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-2 text-center"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}"
                                alt="logo inka"></div>
                        <div class="col-8 text-center"></div>
                        <div class="col-2 text-center"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class=" text-center page-title" style="font-size: 24px;">SURAT PERMINTAAN PERAWATAN / PERBAIKAN (SPR)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Kepada</p>
                            <p>Yth. SM Pengendalian dan Pemeliharaan Aset</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 bordered text-center">
                            <h6 for="nama_barang">Nama Mesin/Fasilitas/Gedung *</h6>
                            <p>{{ $barang->nama_barang }}</p>
                        </div>
                    
                        <div class="col-2 bordered text-center">
                            <h6 for="lokasi">Lokasi *</h6>
                            <p>{{ $barang->lokasi }}</p>
                        </div>
                        <div class="col-2 bordered text-center">
                            <h6 for="tanggal_kerusakan">Tanggal Kerusakan*</h6>
                            <p>{{ $barang->tanggal_kerusakan }}</p>
                        </div>
                        <div class="col-4 bordered text-center">
                            <h6 for="no_spr">No SPR*</h6>
                            <p>{{ $barang->nomor_spr }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 bordered text-center">
                            <h6 for="kode_mesin">Kode Mesin/Nomor Mesin*</h6>
                            <p>{{ $barang->kode_mesin }}</p>
                        </div>
                    
                        <div class="col-2 bordered text-center">
                            <h6 for="no_aset">No. Inventaris/Aset*</h6>
                            <p>{{ $barang->no_aset }}</p>
                        </div>
                        <div class="col-2 bordered text-center">
                            <h6 for="jam_kerusakan">Jam Kerusakan*</h6>
                            <p>{{ $barang->jam_kerusakan }}</p>
                        </div>
                        <div class="col-4 bordered text-center">
                            <h6 for="user_peminta">User Peminta*</h6>
                            <p>{{ $barang->user_peminta }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-8 bordered" style="display: flex;
                        flex-direction: column;
                        justify-content: space-around;">
                            <div class="row">
                                <div class="col">
                                    <h6>Uraian Kerusakan*</h6>
                                    <p>{{ $barang->deskripsi_kerusakan }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6>Kondisi Mesin:</h6>
                                    <p>{{$barang->status_kerusakan }}</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-4">
                            <div class="row">
                                <div class="col bordered text-center" style="height: 80px;">
                                    <h6>Departemen <br> Pengendalian & Pemeliharaan Aset</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col bordered text-center">
                                    <h6 for=" tanggal_sprditerima">SPR diterima tanggal, jam*</h6>
                                    <p>{{ $barang->tanggal_sprditerima }} {{ $barang->jam_sprditerima }}</p>
                                    <br>
                                    <h6>Site</h6>
                                    <p>{{ $barang->site }}</p>
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

    </div>

<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <a class="btn btn-success btn-sm" href="{{ route('spr.index') }}">Kembali</a>
        <a id="generatePDF" class="btn btn-success btn-sm">Cetak PDF</a>
    </div>
</div>

<!-- script section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

<script>
    $(document).ready(function(){
        $('#generatePDF').click(function(){
            $('#printPage').printThis();
        });
    });
</script>
{{-- @endsection --}}
</body>
</html>









{{-- <!DOCTYPE html>
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
        <div id=printPage>
            <div class="row" >
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
                            <h6 for="nama_barang">Nama Mesin / Fasilitas / Gedung *</h6>
                            <div>{{ $barang->nama_barang }}</div>
                        </div>
                    
                        <div class="col-2 bordered text-center">
                            <h6 for="lokasi">Lokasi *</h6>
                            <div>{{ $barang->lokasi }}</div>
                        </div>
                        <div class="col-2 bordered text-center">
                            <h6 for="tanggal_kerusakan">Tanggal Kerusakan*</h6>
                            <div>{{ $barang->tanggal_kerusakan }}</div>
                        </div>
                        <div class="col-4 bordered text-center">
                            <h6 for="no_spr">No SPR*</h6>
                            <div>{{ $barang->nomor_spr }}</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 bordered text-center">
                            <h6 for="kode_mesin">Kode Mesin/Nomor Mesin*</h6>
                            <div>{{ $barang->kode_mesin }}</div>
                        </div>
                    
                        <div class="col-2 bordered text-center">
                            <h6 for="no_aset">No. Inventaris/Aset*</h6>
                            <div>{{ $barang->no_aset }}</div>
                        </div>
                        <div class="col-2 bordered text-center">
                            <h6 for="jam_kerusakan">Jam Kerusakan*</h6>
                            <div>{{ $barang->jam_kerusakan }}</div>
                        </div>
                        <div class="col-4 bordered text-center">
                            <h6 for="user_peminta">User Peminta*</h6>
                            <div>{{ $barang->user_peminta }}</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-8 bordered" style="height: 200px;">
                            <h6>Uraian Kerusakan*</h6>
                            <div>{{ $barang->deskripsi_kerusakan }}</div>
                            <div style="margin-top: 60px;">
                                <td colspan="2" style="height: 10vh;">Kondisi Mesin:<br>{{
                                    $barang->status_kerusakan }}</td>
                            </div>
                        </div>
                    
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 bordered text-center" style="height: 80px;">
                                    <h6 style="font-size: 11px;">Departemen <br> Pengendalian & Pemeliharaan Aset</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 bordered text-center" style="height: 120px;>
                                            <h6 for=" tanggal_sprditerima">SPR diterima tanggal, jam*</h6>
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
        
        
</div>
<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <a class="btn btn-success btn-sm" href="{{ route('spr.index') }}">Kembali</a>
<a id="generatePDF" class="btn btn-success btn-sm">Cetak PDF</a>    </div>
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

<script>
    $(document).ready(function(){
        $('#generatePDF').click(function(){
            $('#printPage').printThis();
        })
    })
</script> --}}