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
                <div  class=" col-2"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
                <div  class=" col-8"></div>
                <div  class=" col-2">
                    <a  href="{{ url('riwayat-lp3m')}}"class="btn btn-secondary" style="width:100%">
                        <label>Lihat Riwayat LP3M</label>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div  class=" col-12 page-title">LAPORAN PEKERJAAN PERAWATAN DAN PERBAIKAN MESIN (LP3M)</div>
            </div>

            <div class="row">
                <div  class=" col-2">
                    <label for="no_spr">Merujuk SPR No.</label>
                    <input type="text" name="no_spr" id="no_spr" class="form-control @error('no_spr') is-invalid @enderror" value="{{ old('no_spr') }}"
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
                    <textarea class="textarea form-control @error('hasil_pengukuran') is-invalid @enderror"  name="hasil_pengukuran" id="hasil_pengukuran">{{ old('hasil_pengukuran') }}</textarea>
                    @error('hasil_pengukuran')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" col-6 ">
                    <textarea class="textarea form-control @error('penyebab_kerusakan') is-invalid @enderror" name="penyebab_kerusakan" id="penyebab_kerusakan">{{ old('penyebab_kerusakan') }}</textarea>
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
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="human_error" value="human_error" {{ old('alasan') == 'human_error' ? 'checked' : '' }}>
                            <label class="mr-5"  for="human_error">Human Error</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="usia_komponen" value="usia_komponen" {{ old('alasan') == 'usia_komponen' ? 'checked' : '' }}>
                            <label class="mr-5"  for="usia_komponen">Usia Komponen</label>
                        </div>
                        <div style="flex: 1;">
                            <input class="ml-2" class="form-control" type="radio" name="alasan" id="lain_lain" value="lain_lain" {{ old('alasan') == 'lain_lain' ? 'checked' : '' }}>
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
                    <input class="form-control" type="text" name="nama_personil_1" id="nama_personil_1" value="{{ old('nama_personil_1') }}" required>
                    <div id="personils-container" ></div>
                    <div class="btn btn-secondary form-control mt-3 add-personil"><label>Tambah</label></div>
                </div>
                <div class=" col-3">
                    
                    <input type="date" class="form-control text-input @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control text-input @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}">
                    @error('jam_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control text-input @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}">
                    @error('jam_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                


                <div class=" col-6">
                    
                    <textarea class="textarea form-control @error('penyelesaian') is-invalid @enderror" name="penyelesaian" id="penyelesaian">{{ old('penyelesaian') }}</textarea>
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
                <div class=" col-1" >
                    <div id="spareparts-code-container" ></div>
                    <div class="btn btn-secondary form-control mt-3 add-sparepart"><label>Tambah</label></div>
                </div>
                <div class=" col-3" >
                    <div id="spareparts-container" ></div>
                </div>
                <div class=" col-4" >
                    <div id="spareparts-specs-container" ></div>
                </div>
                <div class=" col-1" >
                    <div id="spareparts-count-container" ></div>
                </div>
                <div class=" col-1" >
                    <div id="spareparts-count-type-container" ></div>
                </div>
                <div class=" col-2 ">
                    <textarea class="textarea form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
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
                <a href="{{ url('/lp3m')}}"><div class="btn btn-secondary form-control" id="reset" name="reset">Reset</div></a>
            </div>
        </form>
        </div>
                

</div>

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
                <input class="form-control" style="margin-top:5px" type="text" name="nama_personil_${personilCount}" id="nama_personil_${personilCount}" required>
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
        let sparepartCount = 0;
        let sparepartCodeCount = 0;
        let sparepartCountCount = 0;
        let sparepartCountTypeCount = 0;
        let sparepartSpecsCount = 0;
        const maxSpareparts = 10;
        const container = document.getElementById('spareparts-container');
        const code_container = document.getElementById('spareparts-code-container');
        const count_container = document.getElementById('spareparts-count-container');
        const count_type_container = document.getElementById('spareparts-count-type-container');
        const specs_container = document.getElementById('spareparts-specs-container');

        function addSparepart() {
            sparepartCount++;
            if (sparepartCount > maxSpareparts) {
                return;
            }
            const newDiv1 = document.createElement('div');
            newDiv1.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="nama_sparepart_${sparepartCount}" id="nama_sparepart_${sparepartCount}" required>
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
                <input class="form-control" style="margin-top:5px" type="text" name="kode_sparepart_${sparepartCodeCount}" id="kode_sparepart_${sparepartCodeCount}" required>
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
                <input class="form-control" style="margin-top:5px" type="text" name="jumlah_sparepart_${sparepartCountCount}" id="jumlah_sparepart_${sparepartCountCount}" required>
            `;
            count_container.appendChild(newDiv3);
        }

        function addSparepartCountType() {
            
            sparepartCountTypeCount++;
            if (sparepartCountTypeCount > maxSpareparts) {
                return;
            }
            const newDiv5 = document.createElement('div');
            newDiv5.innerHTML = `
                <select style="margin-top:5px" name="satuan_sparepart_${sparepartCountTypeCount}" id="satuan_sparepart_${sparepartCountTypeCount}" class="form-control" required>
                        <option disabled selected value="">-Pilih-</option>
                        <option value="Liter">Liter</option>
                        <option value="Meter">Meter</option>
                        <option value="m<sup>2</sup>">m2</option>
                        <option value="m<sup>3</sup>">m3</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Roll">Roll</option>
                        <option value="Set">Set</option>
                    </select>
            `;
            count_type_container.appendChild(newDiv5);
        }

        function addSparepartSpecs() {
            sparepartSpecsCount++;
            if (sparepartSpecsCount > maxSpareparts) {
                return;
            }

            console.log(sparepartCodeCount)
            const newDiv4 = document.createElement('div');
            newDiv4.innerHTML = `
                <input class="form-control" style="margin-top:5px" type="text" name="spesifikasi_sparepart_${sparepartSpecsCount}" id="spesifikasi_sparepart_${sparepartSpecsCount}" required>
            `;
            specs_container.appendChild(newDiv4); // Mengganti count_container menjadi specs_container
            
        }

        document.querySelector('.add-sparepart').addEventListener('click', addSparepart);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCode);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCount);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartCountType);
        document.querySelector('.add-sparepart').addEventListener('click', addSparepartSpecs);
    });
</script>

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

<!-- Kode CSRF -->
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}


<!-- Kode form pencarian -->

    

