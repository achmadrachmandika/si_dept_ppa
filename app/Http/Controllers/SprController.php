<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Spr; // Import model Spr

class SprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spr = Barang::orderBy('created_at', 'desc')->paginate(10); // Ubah 'barang' menjadi 'Barang'
        return view('spr.index', compact('spr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_spr' => 'required|integer|unique:barangs,no_spr', // Ubah 'barangs' menjadi 'barangs'
            'nama_barang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_kerusakan' => 'required|date',
            'kode_mesin' => 'required|string|max:255',
            'no_aset' => 'required|string|max:255',
            'jam_kerusakan' => 'required|date_format:H:i',
            'user_peminta' => 'required|string|max:255',
            'deskripsi_kerusakan' => 'required|string',
            'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
            'keterangan' => 'nullable|string|max:255',
            'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
            'tanggal_sprditerima' => 'required|date',
            'jam_sprditerima' => 'required|date_format:H:i',
        ]);

        Barang::create($request->all());

        return redirect()->route('spr.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('spr.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('spr.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_kerusakan' => 'required|date',
            'kode_mesin' => 'required|string|max:255',
            'no_aset' => 'required|string|max:255',
            'jam_kerusakan' => 'required|date_format:H:i',
            'pic_penerima' => 'nullable|string|max:255',
            'deskripsi_kerusakan' => 'required|string',
            'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
            'keterangan' => 'nullable|string|max:255',
            'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('spr.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('spr.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Display the specified resource based on SPR number.
     */
    public function showSprPage($no_spr)
    {
        $spr = Spr::where('no_spr', $no_spr)->first(); // Mengambil data SPR berdasarkan nomor SPR
        return view('nama_view', ['no_spr' => $no_spr, 'spr' => $spr]);
    }
}
