<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class SprController extends Controller
{
    public function index()
    {
        return view('layouts.spr');
    }

    public function prosesPengisianBarang(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_kerusakan' => 'required|date',
            'no_spr' => 'required|string|max:255',
            'kode_mesin' => 'required|string|max:255',
            'no_aset' => 'required|string|max:255',
            'jam_kerusakan' => 'required|date_format:H:i',
            'pic_penerima' => 'required|string|max:255',
            'deskripsi_kerusakan' => 'required|string',
            'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
            'keterangan' => 'nullable|string|max:255',
            'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
        ]);

        // Proses penyimpanan data ke dalam basis data
        Barang::create($request->all());

        // Jika penyimpanan data berhasil, arahkan kembali pengguna ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data SPR berhasil disimpan.');
    }
}
