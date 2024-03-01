















<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
@extends('layouts.app')


@section('content')
<section class="content">

     
<div class="card-body text-center">
    <table id="myTable" class="table table-striped">
        <thead class="bg-secondary text-white">
            <tr>
                <th>No SPR</th>
                <th>Hasil Pengukuran</th>
                <th>Penyebab</th>
                <th>Tanggal</th>
                <th>Penyelesaian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{$data->nomor_spr}}</td>
                <td>{{$data->hasil_pengukuran}}</td>
                <td>{{$data->penyebab_kerusakan}} ({{$data->alasan}})</td>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->penyelesaian}}</td>
                <td><a href="{{url('show-lp3m/'.$data->nomor_spr)}}" class="btn btn-secondary">Cek E-SPR</a></td>
            </tr>
            @endforeach
            <!-- Data absensi lainnya bisa ditambahkan di sini -->
        </tbody>
    </table>
</div>
</div>
    
            

<!-- /.content -->
@endsection

