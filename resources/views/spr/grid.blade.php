<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
@extends('layouts.app')


@section('content')
<section class=" container">

     
        <div class="card-body text-center">
            <form action="{{url('/create-lp3m')}}" class="form" method="post">
                @csrf
            <div class="row">
                <div  class="bordered col-2"><img style="width:80%" src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
                <div  class="bordered col-8"></div>
                <div  class="bordered col-2">
                    <a  href="{{ url('riwayat-lp3m')}}"class="btn btn-secondary" style="width:100%">
                        <label>Lihat Riwayat LP3M</label>
                    </a>
                </div>
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
                <div style=";height:5vw" class="bordered col-6">
                    <textarea class="textarea form-control" name="hasil_pengukuran" id="hasil_pengukuran" style="width: 100%; height:100%;"></textarea>
                </div>
                <div style=";height:3vw" class="bordered col-6">
                    <textarea class="textarea form-control" name="penyebab_kerusakan" id="penyebab_kerusakan" style="width: 100%; height:100%"></textarea>
                    
                    <div class="radio-group mt-3" style="display: flex; flex-wrap: wrap;">
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
                <div id="personil_container" style="height: 14vw;" class="bordered col-3">
                    <label for="nama_personil_1">Nama Personil</label>
                    <input style="margin-bottom:5px;" type="text" class="form-control text-input" id="nama_personil_1" name="nama_personil_1">
                
                    <div id="personil_2_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_2" name="nama_personil_2">
                    </div>
                
                    <div id="personil_3_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_3" name="nama_personil_3">
                    </div>
                    <div id="personil_4_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_4" name="nama_personil_4">
                    </div>
                    <div id="personil_5_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_5" name="nama_personil_5">
                    </div>
                    <div id="personil_6_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_6" name="nama_personil_6">
                    </div>
                    <div id="personil_7_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_7" name="nama_personil_7">
                    </div>
                    <div id="personil_8_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_8" name="nama_personil_8">
                    </div>
                    <div id="personil_9_container" style="display: none;margin-bottom:5px">
                        <input type="text" class="form-control text-input" id="nama_personil_9" name="nama_personil_9">
                    </div>
                    <div id="personil_10_container" style="display: nonemargin-bottom:5px;">
                        <input type="text" class="form-control text-input" id="nama_personil_10" name="nama_personil_10">
                    </div>
                
                    <div id="tambah_personil_btn" class="btn btn-secondary form-control mt-3"><label>Tambah Personil</label></div>
                </div>
                <div class="bordered col-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control text-input" id="tanggal" name="tanggal">

                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control text-input" id="jam_mulai" name="jam_mulai">

                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control text-input" id="jam_selesai" name="jam_selesai">
                </div>
                


                <div style=";height:14vw" class="bordered col-6">
                    <label for="penyelesaian">Penyelesaian</label>
                    <textarea class="textarea form-control" name="penyelesaian" id="penyelesaian" style="width: 100%; height:100%"></textarea>
                
                </div>
            </div>

            <div class="row" style="margin-top:22vw">
                <div class="bordered col-8">
                    <label for="">Sparepart/Material Yang Digunakan</label>
                </div>
                <div class="bordered col-2"></div>
            </div>
            <div class="row mt-3" >
                <div class="bordered col-5" >
                    <label for="nama_sparepart_1">Nama Sparepart</label>
                    <input class="form-control" type="text" name="nama_sparepart_1" id="nama_sparepart_1">
                    <div id="spareparts-container" ></div>
                    <div class="btn btn-secondary form-control mt-3 add-sparepart"><label>Tambah Sparepart</label></div>
                </div>
                <div class="bordered col-3" >
                    <label for="kode_sparepart_1">Kode</label>
                    <input class="form-control" type="text" name="kode_sparepart_1" id="kode_sparepart_1">
                    <div id="spareparts-code-container" ></div>
                </div>
                <div class="bordered col-1" >
                    <label for="jumlah_sparepart_1">Jumlah</label>
                    <input class="form-control" type="text" name="jumlah_sparepart_1" id="jumlah_sparepart_1">
                    <div id="spareparts-count-container" ></div>
                </div>
                <div style=";height:37vw" class="bordered col-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="textarea form-control" name="keterangan" id="keterangan" style="width: 100%; height:34.1vw"></textarea>
                
                </div>
            </div>
        
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
            <div class="mb-3">
                <a href="{{ url('/lp3m')}}"><div class="btn btn-secondary form-control" id="reset" name="reset">Reset</div></a>
            </div>
        </form>
        </div>
                

</section>


<script>
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
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let sparepartCount = 1;
        let sparepartCodeCount = 1;
        let sparepartCountCount = 1;
        const maxSpareparts = 10;
        const container = document.getElementById('spareparts-container');
        const code_container = document.getElementById('spareparts-code-container');
        const count_container = document.getElementById('spareparts-count-container');

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

            if (sparepartCount === maxSpareparts - 1) {
                document.querySelector('.add-sparepart').style.display = 'none';
            }
        }

        function addSparepartCode() {
            sparepartCodeCount++;
            if (sparepartCodeCount > maxSpareparts) {
                return;
            }

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

        document.querySelector('.add-sparepart').addEventListener('click', addSparepart);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCode);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCount);
    });
</script>

<!-- /.content -->
@endsection