<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;
use Carbon\Carbon;
use App\Models\lp3m;
use Illuminate\Support\Facades\DB; 

class SprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tahuns = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
        ->groupBy('tahun')
        ->pluck('tahun');

        $queryTahun = [];
        $queryBulan = [];

      // Membuat instance dari Lp3mController
    $lp3mController = new Lp3mController();
    
    // Memanggil metode riwayatLp3m() untuk mendapatkan data LP3M
    $lp3mData = $lp3mController->riwayatLp3m();
    
    // Mengambil data SPR dari LP3M
    $lp3mSprs = $lp3mData['lp3mSprs'];
    
    
    // Mengambil data SPR dari model Barang
    $spr = Barang::orderBy('created_at', 'desc')->paginate(10);
    
    // Mengirimkan data ke view
    return view('spr.index', compact('spr', 'lp3mSprs', 'queryTahun','queryBulan','tahuns'));
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
    $data = $request->validate([
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

      // Cek apakah nomor SPR sudah digunakan oleh LP3M
    if ($request->has('nomor_spr')) {
        // Jika nomor SPR sudah diisi, cek apakah nomor SPR sudah ada di LP3M
        $lp3mSpr = lp3m::where('no_spr', $request->nomor_spr)->first();

        if ($lp3mSpr) {
            // Jika nomor SPR sudah ada di LP3M, maka status LP3M menjadi "Closed"
            $data['status_lp3m'] = 'Closed';
        } else {
            // Jika nomor SPR tidak ada di LP3M, maka status LP3M menjadi kosong
            $data['status_lp3m'] = '';
        }
    } else {
        // Jika nomor SPR belum diisi, maka status LP3M menjadi "Open"
        $data['status_lp3m'] = 'Open';
    }

    // Menambahkan status_lp3m ke dalam data sebelum membuat entri barang
    $data['status_lp3m'] = $data['status_lp3m'];

    // Membuat entri barang dengan data yang telah disiapkan
    Barang::create($data);

    // Mengubah status_lp3m menjadi 'Closed' jika nomor SPR sudah terisi pada LP3M
    if ($data['status_lp3m'] === 'Closed') {
        lp3m::where('no_spr', $request->nomor_spr)->update(['status_lp3m' => 'Closed']);
    }

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
            'user_peminta' => $request->input('user_peminta'),
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

        return redirect()->route('spr.index')->with('message-delete', 'Data berhasil dihapus.');
    }

    /**
     * Display the specified resource based on SPR number.
     */

    public function cetak_pdf($no_spr){
    $spr = Barang::where('nomor_spr', $no_spr)->first(); // Mengambil data dari model Barang dengan menggunakan 'nomor_spr'

    $pdf = PDF::loadview('spr.spr_pdf', compact('spr')); // Menggunakan 'spr' sebagai data yang dikirim ke view
    return $pdf->download('spr-pdf.pdf'); // Mengunduh PDF dengan nama file spr-pdf.pdf
    }

    public function searchCodeMachine(Request $request)
        {       
                if ($request->get('query')) {
                    
                        $query = $request->get('query');
                        $data = DB::table('asets')
                            ->where('no_unit', 'LIKE', "%{$query}%")
                            ->get();
                    
                        $output = '<ul class="dropdown-menu" style="display:block; position:absolute;; max-height: 120px; overflow-y: auto;">';
                    
                        foreach ($data as $row) {
                                $output .= '
                                <a href="#" style="text-decoration:none; color:black;">
                                    <li data-nama="' . $row->no_aset . '" style="background-color: white; list-style-type: none; cursor: pointer; padding-left:10px" onmouseover="this.style.backgroundColor=\'grey\'" onmouseout="this.style.backgroundColor=\'initial\'">'
                                        . $row->no_unit .
                                    '</li>
                                </a>
                                ';
                        }
                    
                        $output .= '</ul>';
                        echo $output;
                    }
        }


        public function filterSPR(Request $request)
        {   
            $tahuns = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
            ->groupBy('tahun')
            ->pluck('tahun');

            $tahunArray = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
            ->groupBy('tahun')
            ->pluck('tahun')
            ->toArray();

            $daftarBulan = [
                'january', 'february', 'march', 'april', 'may', 'june',
                'july', 'august', 'september', 'october', 'november', 'december'
            ];

            $lp3mController = new Lp3mController();
            // Memanggil metode riwayatLp3m() untuk mendapatkan data LP3M
            $lp3mData = $lp3mController->riwayatLp3m();
            // Mengambil data SPR dari LP3M
            $lp3mSprs = $lp3mData['lp3mSprs'];

            //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
            $queryTahun = $request->tahun;
            // Konversi data ke integer
            $queryTahun = collect($queryTahun)->map(function ($item) {
                return (int) $item;
            })->toArray();


            // Jika $queryTahun kosong, atur nilai menjadi array kosong
            if ($queryTahun == null) {
                $queryTahun = $tahunArray;
            }

            //---------------------------------------------------------------------------------------------------------------------//

            //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
            $queryBulan = $request->bulan;
            if($queryBulan == null){
                $queryBulan = $daftarBulan;
            }
             // Mengambil nilai 'date' dari request
            // Mengonversi nama bulan menjadi nilai bulan dalam format angka
            $bulan = collect($queryBulan)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();

            //---------------------------------------------------------------------------------------------------------------------//


            // Mengambil data barang dengan tanggal_spr dibuat pada bulan dan tahun yang spesifik
            $spr = Barang::whereIn(DB::raw('MONTH(tanggal_sprditerima)'), $bulan)
            ->whereIn(DB::raw('YEAR(tanggal_sprditerima)'), $queryTahun)
            ->get();


            return view('spr.index', compact('spr', 'lp3mSprs', 'queryTahun','queryBulan','tahuns'));
        }



}
