<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data sparepart dari database
        $spareparts = Sparepart::latest()->paginate(1000);

        // Mengembalikan view index dengan data sparepart
        return view('spareparts.index', compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat sparepart baru
        return view('spareparts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'kode_material' => 'required',
        'nama_material' => 'required',
        'spek_material' => 'required',
    ]);

    Sparepart::create($request->all());

    return redirect()->route('spareparts.index')->with('success', 'Sparepart created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $kode_material)
    {
        // Mengambil data sparepart berdasarkan ID
        $sparepart = Sparepart::findOrFail($kode_material);

        // Menampilkan detail sparepart
        return view('spareparts.show', compact('sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_material)
{
    // Mengambil data sparepart berdasarkan kode_material
    $sparepart = Sparepart::where('kode_material', $kode_material)->firstOrFail();

    // Menampilkan form untuk mengedit sparepart
    return view('spareparts.edit', compact('sparepart'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_material)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'nama_material' => 'required',
        'spek_material' => 'required',
    ]);

    // Mengambil data sparepart berdasarkan kode_material
    $sparepart = Sparepart::where('kode_material', $kode_material)->firstOrFail();

    // Memperbarui data pada model
    $sparepart->nama_material = $request->input('nama_material');
    $sparepart->spek_material = $request->input('spek_material');

    // Menyimpan perubahan pada model
    $sparepart->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('spareparts.index')
        ->with('success', 'Sparepart berhasil diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_material)
{
    // Mengambil data sparepart berdasarkan kode_material
    $sparepart = Sparepart::where('kode_material', $kode_material)->firstOrFail();

    // Hapus data sparepart dari database
    $sparepart->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('spareparts.index')
        ->with('success', 'Sparepart berhasil dihapus.');
}
}
