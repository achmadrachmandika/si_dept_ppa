@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="bordered col-2 text-center"><img style="width:100%"
                src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="logo inka"></div>
        <div class="bordered col-8 text-center"></div>
        <div class="bordered col-2 text-center"></div>
    </div>
    <div class="row">
        <div class="bordered col-12 text-center page-title" style="font-size: 24px;"><u>EDIT SURAT PERMINTAAN PERAWATAN
                /
                PERBAIKAN</u>
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

        <form method="post" action="{{ route('spr.update', $barang->no_spr) }}" id="myForm">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <td style="width: 20%; padding-right: 10px;">
                        <div style="height: 4vw" class="bordered">
                            <label for="nama_barang">Nama Mesin / Fasilitas / Gedung *</label>
                            <textarea class="form-control" name="nama_barang" id="nama_barang" rows="4"
                                aria-describedby="nama_barang" style="width: 100%; height: 100%;"
                                placeholder="Masukkan Nama Mesin/Bangunan/Fasilitas">{{ $barang->nama_barang }}</textarea>
                        </div>
                    </td>
                    <td style="width: 20%; padding-right: 10px;">
                        <div style="height: 4vw" class="bordered">
                            <label for="lokasi">Lokasi *</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Lokasi">{{ $barang->lokasi }}</textarea>
                        </div>
                    </td>
                    <td style="width: 15%; padding-right: 10px;">
                        <div style="height: 4vw" class="bordered">
                            <label for="tanggal_kerusakan">Tanggal Kerusakan*</label>
                            <input type="date" name="tanggal_kerusakan" class="form-control" id="tanggal_kerusakan"
                                value="{{ $barang->tanggal_kerusakan }}">
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <div style="height: 4vw" class="bordered">
                            <label for="no_spr">No SPR*</label>
                            <input type="text" name="no_spr" class="form-control" id="no_spr"
                                style="width: 100%; height: 100%;" placeholder="NO. SPR" value="{{ $barang->no_spr }}">
                        </div>
                    </td>
                </tr>
            </table>

            <table style="margin-top: 50px;">
                <tr>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw" class="bordered">
                            <label for="kode_mesin">Kode Mesin</label>
                            <textarea class="form-control" name="kode_mesin" id="kode_mesin" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Kode Mesin">{{ $barang->kode_mesin }}</textarea>
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw" class="bordered">
                            <label for="no_aset">Nomor Aset</label>
                            <textarea class="form-control" name="no_aset" id="no_aset" rows="4"
                                style="width: 100%; height: 100%;"
                                placeholder="Masukkan Nomor Aset">{{ $barang->no_aset }}</textarea>
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw" class="bordered">
                            <label for="jam_kerusakan">Jam Kerusakan*</label>
                            <input type="time" name="jam_kerusakan" class="form-control" id="jam_kerusakan"
                                style="width: 100%; height: 100%;" placeholder="HH:MM"
                                value="{{ date('H:i', strtotime($barang->jam_kerusakan)) }}">
                        </div>
                    </td>
                    <td style="width: 25%; padding-right: 10px;">
                        <div style="height: 3vw" class="bordered">
                            <label for="user_peminta">User Peminta</label>
                            <input type="text" name="user_peminta" class="form-control" id="user_peminta"
                                style="width: 100%; height: 100%;" placeholder="Masukkan User Peminta"
                                value="{{ $barang->user_peminta }}">
                        </div>
                    </td>
                </tr>
            </table>

            <div class="form-group" style="margin-top: 50px; display: flex;">
                <div style="width: 50%;">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea class="form-control" name="deskripsi_kerusakan" id="deskripsi_kerusakan" rows="4"
                        style="width: 100%; height: 150px;"
                        placeholder="Masukkan Deskripsi Kerusakan">{{ $barang->deskripsi_kerusakan }}</textarea>
                </div>
                <td style="width: 25%; padding-right: 10px;">
                    <div style="height: 3vw" class="bordered">
                        <label for="tanggal_sprditerima">SPR diterima tanggal, jam</label>
                        <div style="display: flex;">
                            <input type="date" name="tanggal_sprditerima" class="form-control" id="tanggal_sprditerima"
                                aria-describedby="tanggal_sprditerima" style="width: 60%; height: 100%;"
                                placeholder="Tanggal SPR diterima" value="{{ $barang->tanggal_sprditerima }}">
                            <input type="time" name="jam_sprditerima" class="form-control" id="jam_sprditerima"
                                aria-describedby="tanggal_sprditerima" style="width: 60%; height: 100%;"
                                placeholder="Jam SPR diterima" value="{{ $barang->jam_sprditerima }}">
                        </div>
                    </div>

                    <div style="margin-left: 20px;">
                        <label for="site">Site</label>
                        <select class="form-control" name="site" id="site">
                            <option value="INKA MADIUN" {{ $barang->site == 'INKA MADIUN' ? 'selected' : '' }}>INKA
                                MADIUN
                            </option>
                            <option value="GA BANYUWANGI" {{ $barang->site == 'GA BANYUWANGI' ? 'selected' : '' }}>GA
                                BANYUWANGI
                            </option>
                            <option value="GA BANDUNG" {{ $barang->site == 'GA BANDUNG' ? 'selected' : '' }}>GA BANDUNG
                            </option>
                            <option value="GA JAKARTA" {{ $barang->site == 'GA JAKARTA' ? 'selected' : '' }}>GA JAKARTA
                            </option>
                            <option value="QC BANYUWANGI" {{ $barang->site == 'QC BANYUWANGI' ? 'selected' : '' }}>QC
                                BANYUWANGI
                            </option>
                            <option value="QC BANDUNG" {{ $barang->site == 'QC BANDUNG' ? 'selected' : '' }}>QC BANDUNG
                            </option>
                            <option value="QC JAKARTA" {{ $barang->site == 'QC JAKARTA' ? 'selected' : '' }}>QC JAKARTA
                            </option>
                            <option value="LAIN NYA" {{ $barang->site == 'LAIN NYA' ? 'selected' : '' }}>LAIN NYA
                            </option>
                        </select>
                    </div>
            </div>
            <div style="margin-top: 20px; margin-left: 20px;">
                <label>Status Kerusakan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_breakdown" value="breakdown" {{
                        $barang->status_kerusakan == 'breakdown' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_breakdown">Breakdown</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_kerusakan" id="status_tidak_breakdown"
                        value="tidak_breakdown" {{ $barang->status_kerusakan == 'tidak_breakdown' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_tidak_breakdown">Tidak Breakdown</label>
                </div>
            </div>
    </div>
    </td>
</div>



<div style="margin-top: 20px; margin-left: 20px;">
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('spr.index') }}" class="btn btn-secondary ml-2">Kembali</a>
    </div>
</div>
</form>
</div>
</div>
@endsection