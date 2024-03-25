<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambahkan Aset</title>
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
        <div class="col-12 text-center page-title" style="font-size: 34px;">
            <u>Tambah Aset</u>
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

        <form method="post" action="{{ route('aset.store') }}" id="myForm">
            @csrf
        
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="h5" for="no_unit">No Unit</label>
                        <input class="form-control" type="text" name="no_unit" value="{{ old('no_unit') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="h5" for="equipment">Equipment</label>
                        <input class="form-control" type="text" name="equipment" value="{{ old('equipment') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="h5" for="no_aset">No Aset</label>
                        <input class="form-control" type="text" name="no_aset" value="{{ old('no_aset') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label class="h5" for="nama_unit">Nama Unit</label>
                        <input class="form-control" type="text" name="nama_unit" value="{{ old('nama_unit') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="h5" for="tipe">Tipe</label>
                        <input class="form-control" type="text" name="tipe" value="{{ old('tipe') }}">
                    </div>
                </div>
            </div>
            <div class="text-center form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary ml-2">Kembali</a>
            </div>
        </form>        
    </div>
</div>


@endsection

