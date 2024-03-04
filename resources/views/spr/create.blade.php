@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="bordered col-2 text-center"><img style="width:100%" src="{{ asset('assets/dist/img/logo-inka.png') }}"
            alt="logo inka"></div>
    <div class="bordered col-8 text-center"></div>
    <div class="bordered col-2 text-center"></div>
</div>
<div class="row">
    <div class="bordered col-12 text-center page-title" style="font-size: 24px;"><u>SURAT PERMINTAAN PERAWATAN / PERBAIKAN</u>
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


                    <form method="post" action="{{ route('spr.store') }}" id="myForm">
                        @csrf

                        
                 <table>
                    <tr>
                        <td style="width: 20%; padding-right: 10px;">
                            <div style="height: 4vw" class="bordered">
                                <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                                <textarea class="textarea form-control" name="nama_barang" id="nama_barang"
                                    aria-describedby="nama_barang" style="width: 100%; height: 90%;"
                                    placeholder="Masukkan Nama Mesin/Bangunan/Fasilitas"></textarea>
                            </div>
                        </td>
                        <td style="width: 20%; padding-right: 10px;">
                            <div style="height: 4vw" class="bordered">
                                <label for="lokasi">Lokasi *</label>
                                <textarea class="textarea form-control" name="lokasi" id="lokasi" aria-describedby="lokasi"
                                    style="width: 100%; height: 100%;" placeholder="Masukkan Lokasi"></textarea>
                            </div>
                        </td>
                        <td style="width: 15%; padding-right: 10px;">
                            <div style="height: 4vw" class="bordered">
                                <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                                <input type="date" name="tanggal_kerusakan" class="form-control" id="tanggal_kerusakan"
                                    aria-describedby="tanggal_kerusakan" onfocus="(this.type='date')" placeholder="Tanggal Kerusakan">
                            </div>
                        </td>
                        <td style="width: 15%;">
                            <div style="height: 4vw" class="bordered">
                                <label for="no_spr">No SPR*</label>
                                <input type="text" name="no_spr" class="form-control" id="no_spr" aria-describedby="no_spr"
                                    style="width: 100%; height: 100%;" placeholder="NO. SPR">
                            </div>
                        </td>
                    </tr>
                </table>

                     <table style="margin-top: 50px;">
                        <tr>
                            <td style="width: 25%; padding-right: 10px;">
                                <div style="height: 3vw" class="bordered">
                                    <label for="kode_mesin">Kode Mesin</label>
                                    <textarea class="textarea form-control" name="kode_mesin" id="kode_mesin" aria-describedby="kode_mesin"
                                        style="width: 100%; height: 100%;" placeholder="Masukkan Kode Mesin"></textarea>
                                </div>
                            </td>
                            <td style="width: 25%; padding-right: 10px;">
                                <div style="height: 3vw" class="bordered">
                                    <label for="no_aset">Nomor Aset</label>
                                    <textarea class="textarea form-control" name="no_aset" id="no_aset" aria-describedby="no_aset"
                                        style="width: 100%; height: 100%;" placeholder="Masukkan Nomor Aset"></textarea>
                                </div>
                            </td>
                            <td style="width: 25%; padding-right: 10px;">
                                <div style="height: 3vw" class="bordered">
                                    <label for="jam_kerusakan">Jam Kerusakan</label>
                                    <input type="time" name="jam_kerusakan" class="form-control" id="jam_kerusakan"
                                        aria-describedby="jam_kerusakan" style="width: 100%; height: 100%;"
                                        placeholder="Masukkan Jam Kerusakan">
                                </div>
                            </td>
                            <td style="width: 20%; padding-right: 10px;">
                               <div style="height: 3vw" class="bordered">
                                    <label for="user_peminta">User Peminta</label>
                                    <input type="text" name="user_peminta" class="form-control" id="user_peminta"
                                        aria-describedby="user_peminta" style="width: 100%; height: 100%;"
                                        placeholder="Masukkan User Peminta">
                                </div>
                            </td>
                        </tr>
                    </table>

             <div class="form-group" style="margin-top: 50px; display: flex;">
                <div style="width: 50%;">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea class="form-control" name="deskripsi_kerusakan" id="deskripsi_kerusakan" rows="3"
                        style="width: 100%; height: 150px;"></textarea>
                </div>

          <td style="width: 25%; padding-right: 10px;">
            <div style="height: 3vw" class="bordered">
                <label for="tanggal_sprditerima">SPR diterima tanggal, jam</label>
                <div style="display: flex;">
                    <input type="date" name="tanggal_sprditerima" class="form-control" id="tanggal_sprditerima"
                        aria-describedby="tanggal_sprditerima" style="width: 60%; height: 100%;"
                        placeholder="Tanggal SPR diterima">
                    <input type="time" name="jam_sprditerima" class="form-control ml-2" id="jam_sprditerima"
                        aria-describedby="jam_sprditerima" style="width: 60%; height: 100%;" placeholder="Jam SPR diterima">
                </div>
            </div>
        </td>

                <div style="margin-left: 20px;">
                    <label for="site">Site</label>
                    <select class="form-control" name="site" id="site">
                        <option value="INKA MADIUN">INKA MADIUN</option>
                        <option value="GA BANYUWANGI">GA BANYUWANGI</option>
                        <option value="GA BANDUNG">GA BANDUNG</option>
                        <option value="GA JAKARTA">GA JAKARTA</option>
                        <option value="QC BANYUWANGI">QC BANYUWANGI</option>
                        <option value="QC BANDUNG">QC BANDUNG</option>
                        <option value="QC JAKARTA">QC JAKARTA</option>
                        <option value="LAIN NYA">LAIN NYA</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px; margin-left: 20px;">
                <label>Status Kerusakan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_breakdown" value="breakdown">
                    <label class="form-check-label" for="status_breakdown">Breakdown</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_tidak_breakdown"
                        value="tidak_breakdown">
                    <label class="form-check-label" for="status_tidak_breakdown">Tidak Breakdown</label>
                </div>
            </div>
        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('spr.index') }}" class="btn btn-secondary ml-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection