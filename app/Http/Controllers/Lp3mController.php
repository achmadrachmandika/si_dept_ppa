<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lp3m;
use App\Models\Barang;

class Lp3mController extends Controller
{
    public function index(){
    // Mendefinisikan nilai default untuk $no_spr
    $no_spr = ''; // Atau, berikan nilai sesuai dengan kebutuhan aplikasi Anda

    // Mengirimkan nilai $no_spr ke view
    return view('layouts.lp3m')->with('no_spr', $no_spr);
}


    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_spr' => 'required|exists:barangs,no_spr', // Memastikan no_spr ada dalam tabel barangs
            // tambahkan validasi untuk atribut lainnya sesuai kebutuhan
        ]);

        // Dapatkan data dari request
        $data = $request->only([
            'no_spr',
            'hasil_pengukuran',
            'penyebab_kerusakan',
            'alasan',
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'penyelesaian',
            'keterangan'
        ]);

        // Dapatkan data personil dari request
        $personil = [];
        for ($i = 1; $i <= 10; $i++) {
            if ($request->has("nama_personil_$i")) {
                $personil["nama_personil_$i"] = $request->input("nama_personil_$i");
            }
        }

        // Dapatkan data sparepart dari request
        $spareparts = [];
        for ($i = 1; $i <= 10; $i++) {
            if ($request->has("nama_sparepart_$i")) {
                $spareparts[] = [
                    'nama_sparepart' => $request->input("nama_sparepart_$i"),
                    'kode_sparepart' => $request->input("kode_sparepart_$i"),
                    'spek_sparepart' => $request->input("spesifikasi_sparepart_$i"),
                    'jumlah_sparepart' => $request->input("jumlah_sparepart_$i"),
                ];
            }
        }

        // Simpan data LP3M
        $lp3m = Lp3m::create($data);

        // Simpan data personil
        $lp3m->personil()->create($personil);

        // Simpan data sparepart
        $lp3m->spareparts()->createMany($spareparts);

        return redirect('/riwayat-lp3m');
    }

    public function riwayatLp3m()
    {
        $datas = Lp3m::all();
        return view('layouts.riwayat-lp3m', compact('datas'));
    }

    public function showLp3m($id)
    {
        $data = Lp3m::where('no_spr', $id)->firstOrFail();
        return view('layouts.showLp3m', compact('data'));
    }
}
