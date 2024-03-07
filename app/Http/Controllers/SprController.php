<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;


class SprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // Membuat instance dari Lp3mController
    $lp3mController = new Lp3mController();
    
    // Memanggil metode riwayatLp3m() untuk mendapatkan data LP3M
    $lp3mData = $lp3mController->riwayatLp3m();
    
    // Mengambil data SPR dari LP3M
    $lp3mSprs = $lp3mData['lp3mSprs'];
    
    // Mengambil data SPR dari model Barang
    $spr = Barang::orderBy('created_at', 'desc')->paginate(10);
    
    // Mengirimkan data ke view
    return view('spr.index', compact('spr', 'lp3mSprs'));
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
            // 'nomor_spr' => 'required|unique:barangs',
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
        $barang = Barang::where('nomor_spr',$id)->first();
        return view('spr.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::where('nomor_spr',$id)->first();
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
            'user_peminta' => 'required|string|max:255',
            'deskripsi_kerusakan' => 'required|string',
            'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
            'keterangan' => 'nullable|string|max:255',
            'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
        ]);

        $barang = Barang::where('nomor_spr',$id)->first();

        $barang->update([
            'nomor_spr' => $request->input('nomor_spr'),
            'nama_barang' => $request->input('nama_barang'),
            'lokasi' => $request->input('lokasi'),
            'tanggal_kerusakan' => $request->input('tanggal_kerusakan'),
            'kode_mesin' => $request->input('kode_mesin'),
            'no_aset' => $request->input('no_aset'),
            'jam_kerusakan' => $request->input('jam_kerusakan'),
            'pic_penerima' => $request->input('pic_penerima'),
            'deskripsi_kerusakan' => $request->input('deskripsi_kerusakan'),
            'site' => $request->input('site'),
            'keterangan' => $request->input('keterangan'),
            'status_kerusakan' => $request->input('status_kerusakan'),
        ]);

        return redirect()->route('spr.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::where('nomor_spr',$id);
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

    public function cetak_pdf($no_spr){
    $spr = Barang::where('nomor_spr', $no_spr)->first(); // Mengambil data dari model Barang dengan menggunakan 'nomor_spr'

    $pdf = PDF::loadview('spr.spr_pdf', compact('spr')); // Menggunakan 'spr' sebagai data yang dikirim ke view
    return $pdf->download('spr-pdf.pdf'); // Mengunduh PDF dengan nama file spr-pdf.pdf
}


}
