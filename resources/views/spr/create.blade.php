<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat SPR</title>
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

<div class="container bg-white">
    <div class="row">
        <div class="col-2 text-center"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}"
                alt="logo inka"></div>
        <div class="col-8 text-center"></div>
        <div class="col-2 text-center"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center page-title" style="font-size: 24px;"><u>SURAT PERMINTAAN PERAWATAN /
                PERBAIKAN</u>
        </div>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat beberapa masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('spr.store') }}" id="myForm">
            @csrf

            <div class="row">
                <div class="col-3">
                    <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                </div>
                <div class="col-3">
                    <label for="lokasi">Lokasi *</label>
                </div>
                <div class="col-3">
                    <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                </div>
                <div class="col-3">
                    <label for="no_spr">No SPR*</label>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <input class="textarea form-control" value="{{ old('nama_barang') }}" name="nama_barang" id="nama_barang"
                        aria-describedby="nama_barang" placeholder="Masukkan Nama Mesin/Bangunan/Fasilitas" />
                </div>
                <div class="col-3">
                    <input class="textarea form-control" value="{{ old('lokasi') }}" name="lokasi" id="lokasi" aria-describedby="lokasi"
                        placeholder="Masukkan Lokasi" />
                </div>
                <div class="col-3">
                    <input type="date" name="tanggal_kerusakan" value="{{ old('tanggal_kerusakan') }}" class="form-control" id="tanggal_kerusakan"
                        aria-describedby="tanggal_kerusakan" onfocus="(this.type='date')"
                        placeholder="Tanggal Kerusakan">
                </div>
                <div class="col-3">
                    <input type="text" name="no_spr" class="form-control" value="{{ old('no_spr') }}" id="no_spr" aria-describedby="no_spr"
                        placeholder="NO. SPR">
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-3">
                    <label for="kode_mesin">Kode Mesin*</label>
                </div>
                <div class="col-3">
                    <label for="no_aset">Nomor Aset*</label>
                </div>
                <div class="col-3">
                    <label for="jam_kerusakan">Jam Kerusakan*</label>
                </div>
                <div class="col-3">
                    <label for="user_peminta">User Peminta*</label>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <input class="textarea form-control" value="{{ old('kode_mesin') }}" name="kode_mesin" id="kode_mesin" aria-describedby="kode_mesin"
                        placeholder="Masukkan Kode Mesin">
                        <div id="kodeMesinList"></div>
                </div>
                <div class="col-3">
                    <input class="textarea form-control" value="{{ old('no_aset') }}" name="no_aset" id="no_aset" aria-describedby="no_aset"
                        placeholder="Masukkan Nomor Aset" />
                </div>
                <div class="col-3">
                    <input type="time" name="jam_kerusakan" class="form-control" value="{{ old('jam_kerusakan') }}" id="jam_kerusakan"
                        aria-describedby="jam_kerusakan" style="height: 90%; font-size: 13px"
                        placeholder="Masukkan Jam Kerusakan">
                </div>
                <div class="col-3">
                    <input type="text" name="user_peminta" class="form-control" value="{{ old('user_peminta') }}" id="user_peminta"
                        aria-describedby="user_peminta" style="height: 90%; font-size: 13px"
                        placeholder="Masukkan User Peminta">
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-6" style="height: 200px;">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea class="form-control" value="{{ old('deskripsi_kerusakan') }}" style="height: 160px;" name="deskripsi_kerusakan"
                        id="deskripsi_kerusakan"></textarea>
                </div>

                <div class="col-2" style="height: 100%;">
                    <label for="tanggal_sprditerima">Spr diterima tanggal,*</label>
                    <input type="date" name="tanggal_sprditerima" class="form-control" value="{{ old('tanggal_sprditerima') }}" id="tanggal_sprditerima"
                        style="height: 35px;" placeholder="Tanggal SPR diterima">
                </div>

                <div class="col-2" style="height: 100%;">
                    <label for="jam_sprditerima">Jam,*</label>
                    <input type="time" name="jam_sprditerima" class="form-control ml-2" value="{{ old('jam_sprditerima') }}" id="jam_sprditerima"
                        style="height: 35px;" placeholder="Jam SPR diterima">
                </div>

                <div class="col-2" style="height: 100%;">
                    <label for="site">Site,*</label>
                    <select class="form-control" value="{{ old('site') }}" name="site" id="site" style="height: 35px";>

                        <option value="INKA MADIUN">INKA MADIUN</option>
                        <option value="GA BANYUWANGI">GA BANYUWANGI</option>
                        <option value="GA BANDUNG">GA BANDUNG</option>
                        <option value="GA JAKARTA">GA JAKARTA</option>
                        <option value="QC BANYUWANGI">QC BANYUWANGI</option>
                        <option value="QC BANDUNG">QC BANDUNG</option>
                        <option value="QC JAKARTA">QC JAKARTA</option>
                        <option value="LAIN NYA">LAIN NYA</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col mt-2">
                    <label>Status Kerusakan</label>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <div style="display:flex;justify-content: space-evenly;">
                        <input type="radio" name="status_kerusakan" id="status_breakdown" value="breakdown">
                        <label for="status_breakdown">Breakdown</label>
                        <input type="radio" name="status_kerusakan" id="status_tidak_breakdown" value="tidak_breakdown">
                        <label for="status_tidak_breakdown">Tidak Breakdown</label>
                    </div>
                </div>
                <div class="col"></div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('spr.index') }}" class="btn btn-secondary ml-2">Kembali</a>
            </div>
        </form>
    </div>
</div>


@endsection

<script type="text/javascript">


    $(document).on('keyup', `#kode_mesin`, function() {
        var query = $(this).val();
        
        if (query != '') {  
            console.log(query);
            var _token = $('input[name="csrf-token"]').val();
            $.ajax({
                url: '/ajax-autocomplete-machine-code',
                method: "GET",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $(`#kodeMesinList`).fadeIn();
                    $(`#kodeMesinList`).html(data);
                }
            });
        }
    });

    $(document).on('click', `#kodeMesinList li`, function() {
        var no_aset = $(this).data('nama');

        console.log('tes');
        console.log(no_aset);
        $(`#kode_mesin`).val($(this).text());
        $(`#no_aset`).val(no_aset);
        $(`#kodeMesinList`).fadeOut();
    });


</script>