<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<body>
    <div class="card" style="margin:0px 20px;padding:20px">
        <div class="text-center">
            <form action="{{url('/update-lp3m/'.$data->no_spr)}}" class="form" method="post">
                @csrf
            <div class="row">
                <div  class=" col-2"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
                <div  class=" col-10"></div>
            </div>
            
            <div class="row">
                <div  class=" col-12 page-title">LAPORAN PEKERJAAN PERAWATAN DAN PERBAIKAN MESIN (LP3M)</div>
            </div>

            <div class="row">
                <div  class=" col-2">
                    <label for="no_spr">Merujuk SPR No.</label>
                    <input type="text" name="no_spr" id="no_spr" class="form-control @error('no_spr') is-invalid @enderror" value="{{$data->no_spr}}"
                    placeholder="Masukkan kode.." required />
                    <div id="barangList"></div>
                    @error('no_spr')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div  class=" col-10"></div>
            </div>
            <br>
            <div class="row">
                <div  class=" col-6">
                    <label for="hasil_pengukuran">Hasil Pengukuran/Pengecekan</label>
                </div>
                <div  class=" col-6">
                    <label for="penyebab_kerusakan">Penyebab Kerusakan</label>
                </div>
            </div>

            <div class="row">
                <div class=" col-6 row-bot-1">
                    <textarea class="textarea form-control @error('hasil_pengukuran') is-invalid @enderror"  name="hasil_pengukuran" id="hasil_pengukuran">{{$data->hasil_pengukuran }}</textarea>
                    @error('hasil_pengukuran')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" col-6 ">
                    <textarea class="textarea form-control @error('penyebab_kerusakan') is-invalid @enderror" name="penyebab_kerusakan" id="penyebab_kerusakan">{{$data->penyebab_kerusakan }}</textarea>
                    @error('penyebab_kerusakan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col ">
                    <div class="form-control radio-group mt-3 @error('alasan') is-invalid @enderror" style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="human_error" value="human_error" {{$data->alasan == 'human_error' ? 'checked' : '' }}>
                            <label class="mr-5"  for="human_error">Human Error</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" {{$data->alasan == 'usia_komponen' ? 'checked' : '' }}>
                            <label class="mr-5"  for="usia_komponen">Usia Komponen</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" {{$data->alasan == 'lain_lain' ? 'checked' : '' }}>
                            <label class="mr-5"  for="lain_lain">Lain - Lain</label>
                        </div>
                    </div>
                    @error('alasan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div  class=" col-3">
                    <label for="nama_personil_1">Nama Personil</label>
                </div>
                <div  class=" col-3">
                    <label for="tanggal">Tanggal</label>
                </div>
                <div  class=" col-6">
                    <label for="penyelesaian">Penyelesaian</label>
                </div>
            </div>
            <div class="row" >
                <div class=" col-3" >
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["nama_personil_$i"]))
                            <input style="margin-bottom:3px" type="text" class="form-control" readonly value="{{ $data["nama_personil_$i"] }}">
                        @endif
                    @endfor
                </div>
                <div class=" col-3">
                    
                    <input type="date" class="form-control text-input @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{$data->tanggal }}">
                    @error('tanggal')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control text-input @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{$data->jam_mulai }}">
                    @error('jam_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control text-input @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{$data->jam_selesai }}">
                    @error('jam_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                


                <div class=" col-6">
                    
                    <textarea class="textarea form-control @error('penyelesaian') is-invalid @enderror" name="penyelesaian" id="penyelesaian">{{$data->penyelesaian}}</textarea>
                    @error('penyelesaian')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <br>

            <div class="row">
                <div class=" col-8">
                    <label for="">Sparepart/Material Yang Digunakan</label>
                </div>
                <div class=" col-4"></div>
            </div>

            <div class="row " >
                <div class=" col-1" >
                    <label for="kode_sparepart_1">Kode</label>
                </div>
                <div class=" col-3" >
                    <label for="nama_sparepart_1">Nama Sparepart</label>
                </div>
                <div class=" col-4" >
                    <label for="spesifikasi_sparepart_1">Spesifikasi Sparepart</label>
                </div>
                <div class=" col-1" >
                    <label for="jumlah_sparepart_1">Jumlah</label>
                </div>
                <div class=" col-1" >
                    <label for="satuan_sparepart_1">Satuan</label>
                </div>
                <div class=" col-2">
                    <label for="keterangan">Keterangan</label>
                
                </div>
            </div>
            <div class="row" >
                <div class="col-1">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["kode_sparepart_$i"]))
                            <input type="text" style="margin-bottom:3px" class="form-control" value="{{ $data["kode_sparepart_$i"]}}"readonly>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="col-3">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["nama_sparepart_$i"]))
                            <input type="text" style="margin-bottom:3px" class="form-control" value="{{ $data["nama_sparepart_$i"]}}"readonly>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="col-4">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["spek_sparepart_$i"]))
                            <input type="text" style="margin-bottom:3px" class="form-control" value="{{ $data["spek_sparepart_$i"]}}"readonly>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="col-1">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["jumlah_sparepart_$i"]))
                            <input type="text" style="margin-bottom:3px" class="form-control" value="{{ $data["jumlah_sparepart_$i"]}}"readonly>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="col-1">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["satuan_sparepart_$i"]))
                            <input type="text" style="margin-bottom:3px" class="form-control" value="{{ $data["satuan_sparepart_$i"]}}"readonly>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class=" col-2 ">
                    <textarea class="textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan">{{$data->keterangan}}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
            <div class="mb-3">
                <a href="{{ url('/edit-lp3m/'.$data->no_spr)}}"><div class="btn btn-secondary form-control" id="reset" name="reset">Reset</div></a>
            </div>
        </form>
        </div>
                

</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#no_spr').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="csrf-token"]').val();
                $.ajax({
                    url: '/ajax-autocomplete',
                    method: "GET",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#barangList').fadeIn();
                        $('#barangList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function() {
            $('#no_spr').val($(this).text());
            $('#barangList').fadeOut();
        });

    });

</script>

<!-- /.content -->

</body>
@endsection

