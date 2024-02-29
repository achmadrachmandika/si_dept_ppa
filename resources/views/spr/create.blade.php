@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Data SPR</div>

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
                        <div class="form-group row">
                            <label for="nama_barang" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                            <div class="col-md-6">
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    aria-describedby="nama_barang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lokasi" class="col-md-4 col-form-label text-md-right">Lokasi</label>
                            <div class="col-md-6">
                                <input type="text" name="lokasi" class="form-control" id="lokasi"
                                    aria-describedby="lokasi">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_kerusakan" class="col-md-4 col-form-label text-md-right">Tanggal
                                Kerusakan</label>
                            <div class="col-md-6">
                                <input type="date" name="tanggal_kerusakan" class="form-control" id="tanggal_kerusakan"
                                    aria-describedby="tanggal_kerusakan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_spr" class="col-md-4 col-form-label text-md-right">Nomor SPR</label>
                            <div class="col-md-6">
                                <input type="text" name="no_spr" class="form-control" id="no_spr"
                                    aria-describedby="no_spr">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kode_mesin" class="col-md-4 col-form-label text-md-right">Kode Mesin</label>
                            <div class="col-md-6">
                                <input type="text" name="kode_mesin" class="form-control" id="kode_mesin"
                                    aria-describedby="kode_mesin">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_aset" class="col-md-4 col-form-label text-md-right">Nomor Aset</label>
                            <div class="col-md-6">
                                <input type="text" name="no_aset" class="form-control" id="no_aset"
                                    aria-describedby="no_aset">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jam_kerusakan" class="col-md-4 col-form-label text-md-right">Jam
                                Kerusakan</label>
                            <div class="col-md-6">
                                <input type="time" name="jam_kerusakan" class="form-control" id="jam_kerusakan"
                                    aria-describedby="jam_kerusakan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pic_penerima" class="col-md-4 col-form-label text-md-right">PIC Penerima</label>
                            <div class="col-md-6">
                                <input type="text" name="pic_penerima" class="form-control" id="pic_penerima"
                                    aria-describedby="pic_penerima">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi_kerusakan" class="col-md-4 col-form-label text-md-right">Deskripsi
                                Kerusakan</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="deskripsi_kerusakan" id="deskripsi_kerusakan"
                                    rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="site" class="col-md-4 col-form-label text-md-right">Site</label>
                            <div class="col-md-6">
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

                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_kerusakan" class="col-md-4 col-form-label text-md-right">Status
                                Kerusakan</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status_kerusakan" id="status_kerusakan">
                                    <option value="breakdown">Breakdown</option>
                                    <option value="tidak_breakdown">Tidak Breakdown</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('spr.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection