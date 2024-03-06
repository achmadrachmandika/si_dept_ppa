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
<body>
    <div class=" container" style="margin-top:30px">
        <div class="card-body text-center bordered">
            <form action="{{url('/create-lp3m')}}" class="form" method="post">
                @csrf
            <div class="row">
                <div  class="col-2"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
                <div  class="col-10"></div>
            </div>
            
            <div class="row">
                <div  class="col-12 page-title">LAPORAN PEKERJAAN PERAWATAN DAN PERBAIKAN MESIN (LP3M)</div>
            </div>

            <div class="row">
                <div  class="bordered col-2">
                    <label for="nomor_spr">Merujuk SPR No.</label>
                </div>
                <div  class="col-10"></div>
            </div>
            <div class="row">
                <div  class="bordered col-2">
                    <p class="h3">{{$data->no_spr}}</p>
                </div>
                <div  class="col-10"></div>
            </div>
            <br>
            <div class="row">
                <div  class="bordered col-6">
                    <label for="hasil_pengukuran">Hasil Pengukuran/Pengecekan</label>
                </div>
                <div  class="bordered col-6">
                    <label for="penyebab_kerusakan">Penyebab Kerusakan</label>
                </div>
            </div>

            <div class="row">
                <div class="bordered-no-bot col-6 row-bot-1">
                    <p class="h6">{{$data->hasil_pengukuran}}</p>
                </div>
                <div class="bordered col-6 row-bot-1_1">
                    <p class="h6">{{$data->penyebab_kerusakan}}</p>
                      
                </div>
            </div>
            
            <div class="row">
                <div class="col bordered-no-top"></div>
                <div class="col bordered">
                    <div class="radio-group mt-3" style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1;">
                            @if($data->alasan == "human_error")
                                <input class="form-control" type="radio" name="alasan" id="human_error" value="human_error" checked disabled>
                            @else
                                <input class="form-control" type="radio" name="alasan" id="human_error" value="human_error" disabled>
                            @endif
                            <label class="mr-5" for="human_error">Human Error</label>
                        </div>
                        <div style="flex: 1;">
                            @if($data->alasan == "usia_komponen")
                                <input class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" checked disabled>
                            @else
                                <input class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" disabled>
                            @endif
                            <label class="mr-5" for="usia_komponen">Usia Komponen</label>
                        </div>
                        <div style="flex: 1;">
                            @if($data->alasan == "lain_lain")
                                <input class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" checked disabled>
                            @else
                                <input class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" disabled>
                            @endif
                            <label class="mr-5" for="lain_lain">Lain - Lain</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div  class="bordered col-3">
                    <label for="nama_personil_1">Nama Personil</label>
                </div>
                <div  class="bordered col-3">
                    <label for="tanggal">Tanggal</label>
                </div>
                <div  class="bordered col-6">
                    <label for="penyelesaian">Penyelesaian</label>
                </div>
            </div>
            <div class="row">
                <div class="bordered col-3">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["nama_personil_$i"]))
                            <p class="h6">{{ $data["nama_personil_$i"] }}</p>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="bordered col-3">
                    
                    <p class="h6">{{$data->tanggal}}</p>

                    <label class="" for="jam_mulai">Jam Mulai</label>
                    <p class="h6">{{$data->jam_mulai}}</p>

                    <label class="" for="jam_selesai">Jam Selesai</label>
                    <p class="h6">{{$data->jam_selesai}}</p>
                </div>
                


                <div class="bordered col-6">
                    
                    <p class="h6">{{$data->penyelesaian}}</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="bordered col-8">
                    <label for="">Sparepart/Material Yang Digunakan</label>
                </div>
                <div class="bordered col-4"></div>
            </div>

            <div class="row " >
                <div class="bordered col-1" >
                    <label for="kode_sparepart_1">Kode</label>
                </div>
                <div class="bordered col-4" >
                    <label for="nama_sparepart_1">Nama Sparepart</label>
                </div>
                <div class="bordered col-4" >
                    <label for="spesifikasi_sparepart_1">Spesifikasi Sparepart</label>
                </div>
                <div class="bordered col-1" >
                    <label for="jumlah_sparepart_1">Jumlah</label>
                </div>
                <div class="bordered col-2">
                    <label for="keterangan">Keterangan</label>
                
                </div>
            </div>

            <div class="row">
                <div class="bordered col-1">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["kode_sparepart_$i"]))
                            <p class="h6">{{ $data["kode_sparepart_$i"] }}</p>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="bordered col-4">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["nama_sparepart_$i"]))
                            <p class="h6">{{ $data["nama_sparepart_$i"] }}</p>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="bordered col-4">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["spek_sparepart_$i"]))
                            <p class="h6">{{ $data["spek_sparepart_$i"] }}</p>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="bordered col-1">
                    @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["jumlah_sparepart_$i"]))
                            <p class="h6">{{ $data["jumlah_sparepart_$i"] }} {{ $data["satuan_sparepart_$i"] }}</p>
                            <hr>
                        @endif
                    @endfor
                </div>
                <div class="bordered col-2 ">
                    <p class="h6">{{$data->keterangan}}</p>
                
                </div>
            </div>
            <br>
        </form>
        </div>
        <p class="h6" style="margin:10px 0px 0px 10px">Form No.:IV-01.097 Rev. C</p> 

</div>


<!-- /.content -->

</body>
