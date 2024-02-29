@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card"
            style="width: 24rem; background-color: #f8f9fa; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-header text-center font-weight-bold"
                style="background-color: #007bff; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                Edit Data SPR
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
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                            aria-describedby="nama_barang" value="{{ $barang->nama_barang }}">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi" aria-describedby="lokasi"
                            value="{{ $barang->lokasi }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kerusakan">Tanggal Kerusakan</label>
                        <input type="date" name="tanggal_kerusakan" class="form-control" id="tanggal_kerusakan"
                            aria-describedby="tanggal_kerusakan" value="{{ $barang->tanggal_kerusakan }}">
                    </div>
                    <div class="form-group">
                        <label for="no_spr">Nomor SPR</label>
                        <input type="text" name="no_spr" class="form-control" id="no_spr" aria-describedby="no_spr"
                            value="{{ $barang->no_spr }}">
                    </div>
                    <div class="form-group">
                        <label for="kode_mesin">Kode Mesin</label>
                        <input type="text" name="kode_mesin" class="form-control" id="kode_mesin"
                            aria-describedby="kode_mesin" value="{{ $barang->kode_mesin }}">
                    </div>
                    <div class="form-group">
                        <label for="no_aset">Nomor Aset</label>
                        <input type="text" name="no_aset" class="form-control" id="no_aset" aria-describedby="no_aset"
                            value="{{ $barang->no_aset }}">
                    </div>
                    <div class="form-group">
                        <label for="jam_kerusakan">Jam Kerusakan</label>
                        <input type="time" name="jam_kerusakan" class="form-control" id="jam_kerusakan"
                            aria-describedby="jam_kerusakan" value="{{ $barang->jam_kerusakan }}">
                    </div>
                    <div class="form-group">
                        <label for="pic_penerima">PIC Penerima</label>
                        <input type="text" name="pic_penerima" class="form-control" id="pic_penerima"
                            aria-describedby="pic_penerima" value="{{ $barang->pic_penerima }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                        <textarea class="form-control" name="deskripsi_kerusakan" id="deskripsi_kerusakan"
                            rows="3">{{ $barang->deskripsi_kerusakan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="site">Site</label>
                        <select class="form-control" name="site" id="site">
                            <option value="INKA MADIUN" {{ $barang->site == 'INKA MADIUN' ? 'selected' : '' }}>INKA MADIUN
                            </option>
                            <option value="GA BANYUWANGI" {{ $barang->site == 'GA BANYUWANGI' ? 'selected' : '' }}>GA
                                BANYUWANGI</option>
                            <option value="GA BANDUNG" {{ $barang->site == 'GA BANDUNG' ? 'selected' : '' }}>GA BANDUNG
                            </option>
                            <option value="GA JAKARTA" {{ $barang->site == 'GA JAKARTA' ? 'selected' : '' }}>GA JAKARTA
                            </option>
                            <option value="QC BANYUWANGI" {{ $barang->site == 'QC BANYUWANGI' ? 'selected' : '' }}>QC
                                BANYUWANGI</option>
                            <option value="QC BANDUNG" {{ $barang->site == 'QC BANDUNG' ? 'selected' : '' }}>QC BANDUNG
                            </option>
                            <option value="QC JAKARTA" {{ $barang->site == 'QC JAKARTA' ? 'selected' : '' }}>QC JAKARTA
                            </option>
                            <option value="LAIN NYA" {{ $barang->site == 'LAIN NYA' ? 'selected' : '' }}>LAIN NYA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan"
                            rows="3">{{ $barang->keterangan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status_kerusakan">Status Kerusakan</label>
                        <select class="form-control" name="status_kerusakan" id="status_kerusakan">
                            <option value="breakdown" {{ $barang->status_kerusakan == 'breakdown' ? 'selected' : ''
                                }}>Breakdown</option>
                            <option value="tidak_breakdown" {{ $barang->status_kerusakan == 'tidak_breakdown' ? 'selected'
                                : '' }}>Tidak Breakdown</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('spr.index') }}" class="btn btn-secondary ml-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection