<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LP3M dan SPR No. {{$data->no_spr}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('riwayatLp3m') }}" class="btn btn-primary">Kembali</a>
                <a onclick="generatePDF()" class="btn btn-success">Cetak PDF</a>
            </div>
        </div>
        <br>
        <div id="content-to-print">
            <div class="card-body text-center bordered">
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
                                    <div class="col bordered text-center" style="height: 120px;">
                                        <h6>Departemen <br> Pengendalian & Pemeliharaan Aset</h6>
                                        <br><br>
                                        <h6>SM</h6>
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
            <div style="height: 850px"></div>
            <div class="card-body text-center bordered" >
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
                        <h6 for="nomor_spr">Merujuk SPR No.</h6>
                    </div>
                    <div  class="col-10"></div>
                </div>
                <div class="row">
                    <div  class="bordered col-2">
                        <p class="h3" style="text-align:center !important">{{$data->no_spr}}</p>
                    </div>
                    <div  class="col-10"></div>
                </div>
                <br>
                <div class="row">
                    <div  class="bordered col-6">
                        <h6 for="hasil_pengukuran">Hasil Pengukuran/Pengecekan</h6>
                    </div>
                    <div  class="bordered col-6">
                        <h6 for="penyebab_kerusakan">Penyebab Kerusakan</h6>
                    </div>
                </div>
    
                <div class="row">
                    <div class="bordered-no-bot col-6 row-bot-1">
                        <p>{{$data->hasil_pengukuran}}</p>
                    </div>
                    <div class="bordered col-6 row-bot-1_1">
                        <p>{{$data->penyebab_kerusakan}}</p>
                          
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
                                <p class="mr-5" for="human_error">Human Error</p>
                            </div>
                            <div style="flex: 1;">
                                @if($data->alasan == "usia_komponen")
                                    <input class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" checked disabled>
                                @else
                                    <input class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" disabled>
                                @endif
                                <p class="mr-5" for="usia_komponen">Usia Komponen</p>
                            </div>
                            <div style="flex: 1;">
                                @if($data->alasan == "lain_lain")
                                    <input class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" checked disabled>
                                @else
                                    <input class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" disabled>
                                @endif
                                <p class="mr-5" for="lain_lain">Lain - Lain</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row mt-3">
                    <div  class="bordered col-3">
                        <h6 for="nama_personil_1">Nama Personil</h6>
                    </div>
                    <div  class="bordered col-3">
                        <h6 for="tanggal">Tanggal</h6>
                    </div>
                    <div  class="bordered col-6">
                        <h6 for="penyelesaian">Penyelesaian</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="bordered col-3">
                        @for ($i = 1; $i <= 10; $i++)
                            @if (!empty($data["nama_personil_$i"]))
                                <p>{{ $data["nama_personil_$i"] }}</p>
                                <hr>
                            @endif
                        @endfor
                    </div>
                    <div class="bordered col-3">
                        
                        <p>{{$data->tanggal}}</p>
    
                        <h6 class="" for="jam_mulai">Jam Mulai</h6>
                        <p>{{$data->jam_mulai}}</p>
    
                        <h6 class="" for="jam_selesai">Jam Selesai</h6>
                        <p>{{$data->jam_selesai}}</p>
                    </div>
                    
    
    
                    <div class="bordered col-6">
                        
                        <p>{{$data->penyelesaian}}</p>
                    </div>
                </div>
    
                <br>
    
                <div class="row">
                    <div class="col-10">
                        <div class="row">
                            <div class="bordered col">
                                <h6 for="">Sparepart/Material Yang Digunakan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="bordered col-2"></div>
                </div>
    
                <div class="row " >
                    <div class="col-10 bordered-no-bot">
                        <div class="row">
                            <div class="bordered col-2" >
                                <h6 for="kode_sparepart_1">Kode</h6>
                            </div>
                            <div class="bordered col-4" >
                                <h6 for="nama_sparepart_1">Nama Sparepart</h6>
                            </div>
                            <div class="bordered col-4" >
                                <h6 for="spesifikasi_sparepart_1">Spesifikasi Sparepart</h6>
                            </div>
                            <div class="bordered col-2" >
                                <h6 for="jumlah_sparepart_1">Jumlah</h6>
                            </div>
                        </div>
                    </div>
                    <div class="bordered col-2">
                        <h6 for="keterangan">Keterangan</h6>
                    
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-10 bordered">
                        @for ($i = 1; $i <= 10; $i++)
                        @if (!empty($data["kode_sparepart_$i"]))
                            <div class="row">
                                <div class="bordered col-2">
                                    <p>{{ $data["kode_sparepart_$i"] }}</p>
                                </div>
                                <div class="bordered col-4">
                                    <p>{{ $data["nama_sparepart_$i"] }}</p>
                                </div>
                                <div class="bordered col-4">
                                    <p>{{ $data["spek_sparepart_$i"] }}</p>
                                </div>
                                <div class="bordered col-2">
                                    <p>{{ $data["jumlah_sparepart_$i"] }} {{ $data["satuan_sparepart_$i"] }}</p>
                                </div>
                            </div>
                        @endif
                    @endfor
                    </div>
                    <div class="bordered col-2 ">
                        <p>{{$data->keterangan}}</p>
                    
                    </div>
                </div>
                <br>
                </form>
            </div>
            <p class="h4" style="margin:10px 0px 0px 10px">Form No.:IV-01.097 Rev. C</p> 
        </div>

</div>



<script>
    function generatePDF() {
        $('#content-to-print').printThis();
    }
</script>

</body>
