<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aset;

class asetController extends Controller
{
      public function index()
    {   
        // Mengambil daftar equipment yang unik dari aset
        $daftarAset = Aset::select('tipe')
            ->distinct()
            ->pluck('tipe')
            ->toArray();

        // Inisialisasi queryBagian kosong
        $queryBagian = [];

        // Mengambil semua aset terurut berdasarkan tanggal dibuat
        $asets = Aset::orderBy('created_at', 'desc')->get();
    
        // Mengirimkan data ke view
        return view('aset.index', compact('asets', 'daftarAset', 'queryBagian'));
    }

    public function filterAset(Request $request)
    {
        // Mengambil daftar equipment yang unik dari aset
        $daftarAset = Aset::select('tipe')
            ->distinct()
            ->pluck('tipe')
            ->toArray();

        // Mengambil nilai 'tipe' dari permintaan
        $queryBagian = $request->tipe;
        
        // Jika nilai 'tipe' tidak ada atau null, kita menggunakan semua tipe yang tersedia
        if ($queryBagian === null) {
            $queryBagian = $daftarAset;
        }

        // Mengambil aset berdasarkan tipe yang dipilih
        $asets = Aset::whereIn('tipe', $queryBagian)
            ->orderBy('created_at', 'desc')
            ->get();

        // Mengirimkan data ke view
        return view('aset.index', compact('asets', 'daftarAset', 'queryBagian'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'no_unit' => 'required|string|max:255|unique:asets',
        'equipment' => 'required|string|max:255',
        'no_aset' => 'required|string|max:255',
        'nama_unit' => 'required|string|max:255',
        'tipe' => 'required|string|max:255'
    ]);
    
    // Membuat entri barang dengan data yang telah disiapkan
    Aset::create([
        'no_unit' => $data['no_unit'],
        'equipment' => $data['equipment'],
        'no_aset' => $data['no_aset'],
        'nama_unit' => $data['nama_unit'],
        'tipe' => $data['tipe']
    ]);
    
    return redirect()->route('aset.index')->with('success', 'Data berhasil disimpan.');
}


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aset = aset::where('no_unit',$id)->first();
        return view('aset.edit', compact('aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'equipment' => 'required|string|max:255',
            'no_aset' => 'required|string|max:255',
            'nama_unit' => 'required|string|max:255',
            'tipe' => 'required|string|max:255'
        ]);
        
        // Membuat entri barang dengan data yang telah disiapkan
        Aset::where('no_unit',$id)->update([
            'equipment' => $data['equipment'],
            'no_aset' => $data['no_aset'],
            'nama_unit' => $data['nama_unit'],
            'tipe' => $data['tipe']
        ]);

        return redirect()->route('aset.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = aset::where('no_unit',$id);
        $barang->delete();

        return redirect()->route('aset.index')->with('message-delete', 'Data berhasil dihapus.');
    }
}
