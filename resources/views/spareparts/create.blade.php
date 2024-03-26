@extends('layouts.app')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Chosen+Font&display=swap">
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header" style="background-color: rgb(41, 48, 66); color: white;">
                   <h2 class="font-weight-bold mb-0" style="font-family: 'Your Chosen Font', sans-serif;">Tambah Sparepart Baru</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terdapat kesalahan pada input data.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('spareparts.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kode Material:</strong>
                                    <input type="text" name="kode_material" class="form-control"
                                        placeholder="Kode Material">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Material:</strong>
                                    <input type="text" name="nama_material" class="form-control"
                                        placeholder="Nama Material">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Spek Material:</strong>
                                   
                                    <input type="text" name="spek_material" class="form-control" style="height:150px" placeholder="Spesifikasi Material">
                                </div>
                            </div>
                           <div class="row">
                            <div class="col-xs-12 col-sm-6 text-center">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-center">
                                <a class="btn btn-outline-primary" href="{{ route('spareparts.index') }}"> Kembali</a>
                            </div>
                        </div>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection