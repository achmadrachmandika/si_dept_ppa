@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <h1 class="h3 mb-3">Halaman Surat Permintaan Perawatan / Perbaikan</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Form Pengisian SPR</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk pengisian barang -->
                            <form method="POST" action="{{ route('proses-pengisian-barang') }}">
                                @csrf

                                <!-- Input nama barang -->
                                <div class="form-group">
                                    <label for="nama_barang">Nama Mesin/ Fasilitas/ Gedung:</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        placeholder="Masukkan nama barang">
                                </div>

                                <!-- Input lokasi -->
                                <div class="form-group">
                                    <label for="lokasi">Lokasi:</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        placeholder="Masukkan lokasi">
                                </div>

                                <!-- Input tanggal kerusakan -->
                                <div class="form-group">
                                    <label for="tanggal_kerusakan">Tanggal Kerusakan:</label>
                                    <input type="date" class="form-control" id="tanggal_kerusakan"
                                        name="tanggal_kerusakan">
                                </div>

                                <!-- Input nomor SPR -->
                                <div class="form-group">
                                    <label for="no_spr">Nomor SPR:</label>
                                    <input type="text" class="form-control" id="no_spr" name="no_spr"
                                        placeholder="Masukkan nomor SPR">
                                </div>

                                <!-- Input kode mesin -->
                                <div class="form-group">
                                    <label for="kode_mesin">Kode Mesin/ Nomor Mesin/ Gedung:</label>
                                    <input type="text" class="form-control" id="kode_mesin" name="kode_mesin"
                                        placeholder="Masukkan kode mesin">
                                </div>

                                <!-- Input nomor aset -->
                                <div class="form-group">
                                    <label for="no_aset">Nomor Aset:</label>
                                    <input type="text" class="form-control" id="no_aset" name="no_aset"
                                        placeholder="Masukkan nomor aset">
                                </div>

                                <!-- Input jam kerusakan -->
                                <div class="form-group">
                                    <label for="jam_kerusakan">Jam Kerusakan:</label>
                                    <input type="time" class="form-control" id="jam_kerusakan" name="jam_kerusakan">
                                </div>

                                <!-- Input PIC penerima -->
                                <div class="form-group">
                                    <label for="pic_penerima">PIC Penerima SPR:</label>
                                    <input type="text" class="form-control" id="pic_penerima" name="pic_penerima"
                                        placeholder="Masukkan PIC penerima">
                                </div>

                                <!-- Input deskripsi kerusakan -->
                                <div class="form-group">
                                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan:</label>
                                    <textarea class="form-control" id="deskripsi_kerusakan" name="deskripsi_kerusakan"
                                        rows="3" placeholder="Masukkan deskripsi kerusakan"></textarea>
                                </div>

                                <!-- Input site -->
                                <div class="form-group">
                                    <label for="site">Site:</label>
                                    <select class="form-control" id="site" name="site">
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

                                <!-- Input keterangan -->
                                <div class="form-group">
                                    <label for="keterangan">Penyebab Kerusakan:</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                                        placeholder="Masukkan keterangan"></textarea>
                                </div>
                                <!-- Input status kerusakan -->
                                <div class="form-group">
                                    <label for="status_kerusakan">Status Kerusakan:</label>
                                    <select class="form-control" id="status_kerusakan" name="status_kerusakan">
                                        <option value="breakdown">Breakdown</option>
                                        <option value="tidak_breakdown">Tidak Breakdown</option>
                                    </select>
                                </div>

                                <!-- Tombol submit -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <!-- Akhir form untuk pengisian barang -->

                            <!-- Tampilkan pesan sukses jika ada -->
                            @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection