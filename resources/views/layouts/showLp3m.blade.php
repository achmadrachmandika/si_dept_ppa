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
    <div class=" container">
        <div class="card-body text-center">
            <form action="{{url('/create-lp3m')}}" class="form" method="post">
                @csrf
            <div class="row">
                <div  class="bordered col-2"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
                <div  class="bordered col-10"></div>
            </div>
            
            <div class="row">
                <div  class="bordered col-12 page-title">LAPORAN PEKERJAAN PERAWATAN DAN PERBAIKAN MESIN (LP3M)</div>
            </div>

            <div class="row">
                <div  class="bordered col-2">
                    <label for="nomor_spr">Merujuk SPR No.</label>
                    <input type="text" class="form-control text-input" id="nomor_spr" name="nomor_spr">
                </div>
                <div  class="bordered col-10"></div>
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
                <div class="bordered col-6 row-bot-1">
                    <textarea class="textarea form-control" name="hasil_pengukuran" id="hasil_pengukuran"></textarea>
                </div>
                <div class="bordered col-6 row-bot-1_1">
                    <textarea class="textarea form-control" name="penyebab_kerusakan" id="penyebab_kerusakan"></textarea>
                    
                    <div class=" radio-group mt-3" style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="human_error" value="human_error">
                            <label class="mr-5"  for="human_error">Human Error</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen">
                            <label class="mr-5"  for="usia_komponen">Usia Komponen</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain">
                            <label class="mr-5"  for="lain_lain">Lain - Lain</label>
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
            <div class="row" >
                <div class="bordered col-3" >
                    <input class="form-control" type="text" name="kode_sparepart_1" id="kode_sparepart_1">
                    <div id="personils-container" ></div>
                    <div class="btn btn-secondary form-control mt-3 add-personil"><label>Tambah</label></div>
                </div>
                <div class="bordered col-3">
                    
                    <input type="date" class="form-control text-input" id="tanggal" name="tanggal">

                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control text-input" id="jam_mulai" name="jam_mulai">

                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control text-input" id="jam_selesai" name="jam_selesai">
                </div>
                


                <div class="bordered col-6">
                    
                    <textarea class="textarea form-control" name="penyelesaian" id="penyelesaian"></textarea>
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
            <div class="row" >
                <div class="bordered col-1" >
                    <input class="form-control" type="text" name="kode_sparepart_1" id="kode_sparepart_1">
                    <div id="spareparts-code-container" ></div>
                    <div class="btn btn-secondary form-control mt-3 add-sparepart"><label>Tambah</label></div>
                </div>
                <div class="bordered col-4" >
                    <input class="form-control" type="text" name="nama_sparepart_1" id="nama_sparepart_1">
                    <div id="spareparts-container" ></div>
                </div>
                <div class="bordered col-4" >
                    <input class="form-control" type="text" name="spesifikasi_sparepart_1" id="spesifikasi_sparepart_1">
                    <div id="spareparts-specs-container" ></div>
                </div>
                <div class="bordered col-1" >
                    <input class="form-control" type="text" name="jumlah_sparepart_1" id="jumlah_sparepart_1">
                    <div id="spareparts-count-container" ></div>
                </div>
                <div class="bordered col-2 ">
                    <textarea class="textarea form-control" name="keterangan" id="keterangan"></textarea>
                
                </div>
            </div>
            <br>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
            <div class="mb-3">
                <a href="{{ url('/lp3m')}}"><div class="btn btn-secondary form-control" id="reset" name="reset">Reset</div></a>
            </div>
        </form>
        </div>
                

</div>
{{-- <script>
    var tambahPersonilBtn = document.getElementById('tambah_personil_btn');
var personilContainers = document.querySelectorAll('[id^="personil_"]');
var maxPersonil = 10 // Menentukan maksimum kontainer personil
var currentPersonil = 1; // Menghitung jumlah kontainer personil yang sudah ditampilkan

tambahPersonilBtn.addEventListener('click', function() {
    if (currentPersonil < maxPersonil) {
        personilContainers[currentPersonil].style.display = 'block';
        currentPersonil++;

        if (currentPersonil === maxPersonil) {
            tambahPersonilBtn.style.display = 'none'; // Menghilangkan tombol setelah menambahkan form personil terakhir
        }
    }
});

function add() {
            Count++;
            if (Count > maxs) {
                return;
            }
            const newDiv1 = document.createElement('div');
            newDiv1.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="nama__${Count}" id="nama__${Count}">
            `;
            container.appendChild(newDiv1);

            console.log()

            if (Count === maxs) {
                document.querySelector('.add-').style.display = 'none';
            }
        }
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let personilCount = 1;
        const maxpersonils = 10;
        const container = document.getElementById('personils-container');

        function addPersonil() {
            personilCount++;
            if (personilCount > maxpersonils) {
                return;
            }
            const newDivPersonil = document.createElement('div');
            newDivPersonil.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="nama_personil_${personilCount}" id="nama_personil_${personilCount}">
            `;
            container.appendChild(newDivPersonil);

            console.log()

            if (personilCount === maxpersonils) {
                document.querySelector('.add-personil').style.display = 'none';
            }
        }


        document.querySelector('.add-personil').addEventListener('click', addPersonil);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let sparepartCount = 1;
        let sparepartCodeCount = 1;
        let sparepartCountCount = 1;
        let sparepartSpecsCount = 1;
        const maxSpareparts = 10;
        const container = document.getElementById('spareparts-container');
        const code_container = document.getElementById('spareparts-code-container');
        const count_container = document.getElementById('spareparts-count-container');
        const specs_container = document.getElementById('spareparts-specs-container');

        function addSparepart() {
            sparepartCount++;
            if (sparepartCount > maxSpareparts) {
                return;
            }
            const newDiv1 = document.createElement('div');
            newDiv1.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="nama_sparepart_${sparepartCount}" id="nama_sparepart_${sparepartCount}">
            `;
            container.appendChild(newDiv1);

            console.log()

            if (sparepartCount === maxSpareparts) {
                document.querySelector('.add-sparepart').style.display = 'none';
            }
        }

        function addSparepartCode() {
            sparepartCodeCount++;
            if (sparepartCodeCount > maxSpareparts) {
                return;
            }

            console.log(sparepartCodeCount)

            const newDiv2 = document.createElement('div');
            newDiv2.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="kode_sparepart_${sparepartCodeCount}" id="kode_sparepart_${sparepartCodeCount}">
            `;
            code_container.appendChild(newDiv2);

        }

        function addSparepartCount() {
            sparepartCountCount++;
            if (sparepartCountCount > maxSpareparts) {
                return;
            }
            const newDiv3 = document.createElement('div');
            newDiv3.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="jumlah_sparepart_${sparepartCountCount}" id="jumlah_sparepart_${sparepartCountCount}">
            `;
            count_container.appendChild(newDiv3);
        }

        function addSparepartSpecs() {
            sparepartSpecsCount++;
            if (sparepartSpecsCount > maxSpareparts) {
                return;
            }

            console.log(sparepartCodeCount)
            const newDiv4 = document.createElement('div');
            newDiv4.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="spesifikasi_sparepart_${sparepartSpecsCount}" id="spesifikasi_sparepart_${sparepartSpecsCount}">
            `;
            specs_container.appendChild(newDiv4); // Mengganti count_container menjadi specs_container
            
        }

        document.querySelector('.add-sparepart').addEventListener('click', addSparepart);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCode);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCount);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartSpecs);
    });
</script>

<!-- /.content -->

</body>
@endsection
