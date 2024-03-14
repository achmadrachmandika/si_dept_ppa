{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit SPR</title>
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
<div class="container bordered bg-white">
    <div class="row">
        <div class="col-2 text-center"><img style="width:100%"
                src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
        <div class="col-8 text-center"></div>
        <div class="col-2 text-center"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center page-title" style="font-size: 24px;"><u>EDIT SURAT PERMINTAAN PERAWATAN
                /
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

        <form method="post" action="{{ route('spr.update', $barang->nomor_spr) }}" id="myForm">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <td style="width: 20%; padding-right: 10px;">
                        <div style="height: 4vw">
                            <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                            <textarea class="form-control" name="nama_barang" id="nama_barang" rows="4"
                                aria-describedby="nama_barang" style="width: 100%; height: 100%;"
                                placeholder="Masukkan Nama Mesin/Bangunan/Fasilitas">{{ $barang->nama_barang }}</textarea>
                        </div>
                    </td>
                    <td style="width: 20%; padding-right: 10px;">
                        <div style="height: 4vw">
                            <label for="lokasi">Lokasi *</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Lokasi">{{ $barang->lokasi }}</textarea>
                        </div>
                    </td>
                    <td style="width: 15%; padding-right: 10px;">
                        <div style="height: 4vw">
                            <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                            <input type="date" name="tanggal_kerusakan" class="form-control" id="tanggal_kerusakan"
                                value="{{ $barang->tanggal_kerusakan }}">
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <div style="height: 4vw">
                            <label for="nomor_spr">No SPR*</label>
                            <input type="text" name="nomor_spr" class="form-control" id="nomor_spr"
                                style="width: 100%; height: 100%;" placeholder="NO. SPR" value="{{ $barang->nomor_spr }}">
                        </div>
                    </td>
                </tr>
            </table>

            <table style="margin-top: 50px;">
                <tr>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw">
                            <label for="kode_mesin">Kode Mesin</label>
                            <textarea class="form-control" name="kode_mesin" id="kode_mesin" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Kode Mesin">{{ $barang->kode_mesin }}</textarea>
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw">
                            <label for="no_aset">Nomor Aset</label>
                            <textarea class="form-control" name="no_aset" id="no_aset" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Nomor Aset">{{ $barang->no_aset }}</textarea>
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw">
                            <label for="jam_kerusakan">Jam Kerusakan*</label>
                            <input type="time" name="jam_kerusakan" class="form-control" id="jam_kerusakan"
                                style="width: 100%; height: 100%;" placeholder="HH:MM"
                                value="{{ date('H:i', strtotime($barang->jam_kerusakan)) }}">
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw">
                            <label for="user_peminta">User Peminta</label>
                            <input type="text" name="user_peminta" class="form-control" id="user_peminta"
                                style="width: 100%; height: 100%;" placeholder="Masukkan User Peminta"
                                value="{{ $barang->user_peminta }}">
                        </div>
                    </td>
                </tr>
            </table>

            <div class="form-group" style="margin-top: 50px; display: flex;">
                <div style="width: 50%;">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea class="form-control" name="deskripsi_kerusakan" id="deskripsi_kerusakan" rows="4"
                        style="width: 100%; height: 150px;"
                        placeholder="Masukkan Deskripsi Kerusakan">{{ $barang->deskripsi_kerusakan }}</textarea>
                </div>
             <td style="width: 25%; padding-right: 10px;">
                <div style="height: 3vw">
                    <label for="tanggal_sprditerima">SPR diterima tanggal, jam</label>
                    <div style="display: flex;">
                        <input type="date" name="tanggal_sprditerima" class="form-control" id="tanggal_sprditerima"
                            aria-describedby="tanggal_sprditerima" style="width: 60%; height: 100%;"
                            placeholder="Tanggal SPR diterima" value="{{ $barang->tanggal_sprditerima }}" disabled>
                        <input type="time" name="jam_sprditerima" class="form-control" id="jam_sprditerima"
                            aria-describedby="tanggal_sprditerima" style="width: 60%; height: 100%;" placeholder="Jam SPR diterima"
                            value="{{ $barang->jam_sprditerima }}" disabled>
                    </div>
                </div>
            </td>

                    <div style="margin-left: 20px;">
                        <label for="site">Site</label>
                        <select class="form-control" name="site" id="site">
                            <option value="INKA MADIUN" {{ $barang->site == 'INKA MADIUN' ? 'selected' : '' }}>INKA
                                MADIUN
                            </option>
                            <option value="GA BANYUWANGI" {{ $barang->site == 'GA BANYUWANGI' ? 'selected' : '' }}>GA
                                BANYUWANGI
                            </option>
                            <option value="GA BANDUNG" {{ $barang->site == 'GA BANDUNG' ? 'selected' : '' }}>GA BANDUNG
                            </option>
                            <option value="GA JAKARTA" {{ $barang->site == 'GA JAKARTA' ? 'selected' : '' }}>GA JAKARTA
                            </option>
                            <option value="QC BANYUWANGI" {{ $barang->site == 'QC BANYUWANGI' ? 'selected' : '' }}>QC
                                BANYUWANGI
                            </option>
                            <option value="QC BANDUNG" {{ $barang->site == 'QC BANDUNG' ? 'selected' : '' }}>QC BANDUNG
                            </option>
                            <option value="QC JAKARTA" {{ $barang->site == 'QC JAKARTA' ? 'selected' : '' }}>QC JAKARTA
                            </option>
                            <option value="LAIN NYA" {{ $barang->site == 'LAIN NYA' ? 'selected' : '' }}>LAIN NYA
                            </option>
                        </select>
                    </div>
            </div>
            <div style="margin-top: 20px; margin-left: 20px;">
                <label>Status Kerusakan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_breakdown" value="breakdown" {{
                        $barang->status_kerusakan == 'breakdown' ? 'checked' : '' }}>

                   <label class="form-check-label" for="status_breakdown" style="font-size: 16px;">Breakdown</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_tidak_breakdown"
                        value="tidak_breakdown" {{ $barang->status_kerusakan == 'tidak_breakdown' ? 'checked' : '' }}>

                    <label class="form-check-label" for="status_tidak_breakdown" style="font-size: 16px;">Tidak Breakdown</label>
                </div>
            </div>
    </div>
    </td>
    <div style="margin-top: 20px; margin-left: 20px;">
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('spr.index') }}" class="btn btn-secondary ml-2">Kembali</a>
        </div>
    </div>
</div>


</form>
</div>
</div>
@endsection --}}

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

<div class="container bordered bg-white">
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

        <form method="post" action="{{ route('spr.update', $barang->nomor_spr) }}" id="myForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3 bordered">
                    <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                </div>
                <div class="col-3 bordered">
                    <label for="lokasi">Lokasi *</label>
                </div>
                <div class="col-3 bordered">
                    <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                </div>
                <div class="col-3 bordered">
                    <label for="no_spr">No SPR*</label>
                </div>
            </div>
            <div class="row">
                <div class="col-3 bordered">
                    <input class="textarea form-control" value="{{ $barang->nama_barang }}" name="nama_barang" id="nama_barang"
                        aria-describedby="nama_barang" placeholder="Masukkan Nama Mesin/Bangunan/Fasilitas" />
                </div>
                <div class="col-3 bordered">
                    <input class="textarea form-control" value="{{ $barang->lokasi }}" name="lokasi" id="lokasi" aria-describedby="lokasi"
                        placeholder="Masukkan Lokasi" />
                </div>
                <div class="col-3 bordered">
                    <input type="date" name="tanggal_kerusakan" value="{{ $barang->tanggal_kerusakan }}" class="form-control" id="tanggal_kerusakan"
                        aria-describedby="tanggal_kerusakan" onfocus="(this.type='date')"
                        placeholder="Tanggal Kerusakan">
                </div>
                <div class="col-3 bordered">
                    <input type="text" name="no_spr" class="form-control" value="{{ $barang->nomor_spr }}" id="no_spr" aria-describedby="no_spr"
                        placeholder="NO. SPR">
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-3 bordered">
                    <label for="kode_mesin">Kode Mesin*</label>
                </div>
                <div class="col-3 bordered">
                    <label for="no_aset">Nomor Aset*</label>
                </div>
                <div class="col-3 bordered">
                    <label for="jam_kerusakan">Jam Kerusakan*</label>
                </div>
                <div class="col-3 bordered">
                    <label for="user_peminta">User Peminta*</label>
                </div>
            </div>

            <div class="row">
                <div class="col-3 bordered">
                    <input class="textarea form-control" value="{{ $barang->kode_mesin }}" name="kode_mesin" id="kode_mesin" aria-describedby="kode_mesin"
                        placeholder="Masukkan Kode Mesin">
                        <div id="kodeMesinList"></div>
                </div>
                <div class="col-3 bordered">
                    <input class="textarea form-control" value="{{ $barang->no_aset }}" name="no_aset" id="no_aset" aria-describedby="no_aset"
                        placeholder="Masukkan Nomor Aset" />
                </div>
                <div class="col-3 bordered">
                    <input type="time" name="jam_kerusakan" class="form-control" value="{{ $barang->jam_kerusakan }}" id="jam_kerusakan"
                        aria-describedby="jam_kerusakan" style="height: 90%; font-size: 13px"
                        placeholder="Masukkan Jam Kerusakan">
                </div>
                <div class="col-3 bordered">
                    <input type="text" name="user_peminta" class="form-control" value="{{ $barang->user_peminta }}" id="user_peminta"
                        aria-describedby="user_peminta" style="height: 90%; font-size: 13px"
                        placeholder="Masukkan User Peminta">
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-6 bordered" style="height: 200px;">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea class="form-control" style="height: 160px; resize:none;" name="deskripsi_kerusakan"
                        id="deskripsi_kerusakan">{{ $barang->deskripsi_kerusakan}}</textarea>
                </div>

                <div class="col-2 bordered" style="height: 100%;">
                    <label for="tanggal_sprditerima">Spr diterima tanggal,*</label>
                    <input type="date" name="tanggal_sprditerima" class="form-control" value="{{ $barang->tanggal_sprditerima}}" id="tanggal_sprditerima"
                        style="height: 35px;" placeholder="Tanggal SPR diterima">
                </div>

                <div class="col-2 bordered" style="height: 100%;">
                    <label for="jam_sprditerima">Jam,*</label>
                    <input type="time" name="jam_sprditerima" class="form-control ml-2" value="{{ $barang->jam_sprditerima}}" id="jam_sprditerima"
                        style="height: 35px;" placeholder="Jam SPR diterima">
                </div>

                <div class="col-2 bordered" style="height: 100%;">
                    <label for="site">Site</label>
                        <select class="form-control" name="site" id="site">
                            <option value="INKA MADIUN" {{ $barang->site == 'INKA MADIUN' ? 'selected' : '' }}>INKA
                                MADIUN
                            </option>
                            <option value="GA BANYUWANGI" {{ $barang->site == 'GA BANYUWANGI' ? 'selected' : '' }}>GA
                                BANYUWANGI
                            </option>
                            <option value="GA BANDUNG" {{ $barang->site == 'GA BANDUNG' ? 'selected' : '' }}>GA BANDUNG
                            </option>
                            <option value="GA JAKARTA" {{ $barang->site == 'GA JAKARTA' ? 'selected' : '' }}>GA JAKARTA
                            </option>
                            <option value="QC BANYUWANGI" {{ $barang->site == 'QC BANYUWANGI' ? 'selected' : '' }}>QC
                                BANYUWANGI
                            </option>
                            <option value="QC BANDUNG" {{ $barang->site == 'QC BANDUNG' ? 'selected' : '' }}>QC BANDUNG
                            </option>
                            <option value="QC JAKARTA" {{ $barang->site == 'QC JAKARTA' ? 'selected' : '' }}>QC JAKARTA
                            </option>
                            <option value="LAIN NYA" {{ $barang->site == 'LAIN NYA' ? 'selected' : '' }}>LAIN NYA
                            </option>
                        </select>
                </div>
            </div>

            <div class="row">
                <div class="col mt-2 bordered">
                    <label>Status Kerusakan</label>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col bordered mb-3">
                    <div style="display:flex;justify-content: space-evenly;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_kerusakan" id="status_breakdown" value="breakdown" {{
                                $barang->status_kerusakan == 'breakdown' ? 'checked' : '' }}>

                        <label class="form-check-label" for="status_breakdown" style="font-size: 16px;">Breakdown</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_kerusakan" id="status_tidak_breakdown"
                                value="tidak_breakdown" {{ $barang->status_kerusakan == 'tidak_breakdown' ? 'checked' : '' }}>

                            <label class="form-check-label" for="status_tidak_breakdown" style="font-size: 16px;">Tidak Breakdown</label>
                        </div>
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