<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Carbon\Carbon;
use App\Models\lp3m;
use Illuminate\Support\Facades\DB; 

use Illuminate\Support\Facades\Mail;

use App\Mail\SPRMailer;

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
        $queryBagian = [];
        $queryStatus= [];
    
    
    // Mengambil data SPR dari model Barang
    $spr = Barang::orderBy('created_at', 'desc')->paginate(10);
    
    // Mengirimkan data ke view
    return view('spr.index', compact('spr', 'queryTahun','queryBulan','queryBagian','queryStatus','tahuns'));
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
        'nama_barang' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'tanggal_kerusakan' => 'required|date',
        'kode_mesin' => 'required|string|max:255',
        'no_aset' => 'required|string|max:255',
        'jam_kerusakan' => 'required',
        'user_peminta' => 'required|string|max:255',
        'deskripsi_kerusakan' => 'required|string',
        'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
        'keterangan' => 'nullable|string|max:255',
        'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
        'tanggal_sprditerima' => 'required|date',
        'jam_sprditerima' => 'required',
    ]);
    $user = auth()->user(); // Ambil data pengguna dari sesi saat ini

     $data['status'] = 'open';
     $data['email_user'] = $user->email;
    // Membuat entri barang dengan data yang telah disiapkan
    Barang::create($data);

    $noSprUser = Barang::where('email_user', $user->email)
    ->latest() // Mengurutkan berdasarkan kolom created_at secara descending
    ->value('nomor_spr'); // Mengambil nilai kolom nomor_spr dari entri terbaru
        
            // Kirim email notifikasi SPR
    Mail::to('satriiadaffa@gmail.com')->send(new SPRMailer($user->name, $user->email, $noSprUser));



    
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
            'jam_kerusakan' => 'required',
            'user_peminta' => 'required|string|max:255',
            'deskripsi_kerusakan' => 'required|string',
            'site' => 'required|in:INKA MADIUN,GA BANYUWANGI,GA BANDUNG,GA JAKARTA,QC BANYUWANGI,QC BANDUNG,QC JAKARTA,LAIN NYA',
            'keterangan' => 'nullable|string|max:255',
            'status_kerusakan' => 'required|in:breakdown,tidak_breakdown',
        ]);

        

        $barang = Barang::where('nomor_spr',$id)->first();

        $barang->update([
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

            $daftarBagian = [
                'gd', 'ins', 'wld', 'ms', 'crn', 'gdl',
                'com', 'rd', 'fork', 'tbg', 'golf', 'kran','tb', 'lift', 'crl', 'bjn','g-','viar','lampu','ac', 'zweiweg'
            ];

            $daftarStatus = [
                'open', 'close'
            ];

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

            //-----------------------------------------------------FILTER BAGIAN-----------------------------------------------------//
            
            $queryBagian = $request->bagian;
            if($queryBagian == null){
                $queryBagian = $daftarBagian;
            } else{
                $queryBagian = str_replace('gedung', 'gd', $queryBagian);
                $queryBagian = str_replace('instalasi', 'ins', $queryBagian);
                $queryBagian = str_replace('mesin_las', 'wld', $queryBagian);
                $queryBagian = str_replace('mesin', 'ms', $queryBagian);
                $queryBagian = str_replace('crane', 'crn', $queryBagian);
                $queryBagian = str_replace('gardu_listrik', 'gdl', $queryBagian);
                $queryBagian = str_replace('kompresor', 'com', $queryBagian);
                $queryBagian = str_replace('rolling_door', 'rd', $queryBagian);
                $queryBagian = str_replace('forklift', 'fork', $queryBagian);
                $queryBagian = str_replace('tambangan', 'tbg', $queryBagian); 
                $queryBagian = str_replace('golf_car', 'golf', $queryBagian);
                $queryBagian = str_replace('pompa', 'kran', $queryBagian);
                $queryBagian = str_replace('temporary_bogie', 'tb', $queryBagian); //overlap tbg
                $queryBagian = str_replace('elevator', 'lift', $queryBagian);
                $queryBagian = str_replace('carlifter', 'crl', $queryBagian);
                $queryBagian = str_replace('bejana_tekan', 'bjn', $queryBagian);
                $queryBagian = str_replace('genset', 'g-', $queryBagian); //overlap gd & gdl

            }

            //---------------------------------------------------------------------------------------------------------------------//
            
            //-----------------------------------------------------FILTER STATUS-----------------------------------------------------//
            
            $queryStatus = $request->status;
            
            if($queryStatus == null){
                $queryStatus = $daftarStatus;
            }
            //---------------------------------------------------------------------------------------------------------------------//
            
            
            // Mengambil data barang dengan tanggal_spr dibuat pada bulan dan tahun yang spesifik
            $spr = Barang::whereIn(DB::raw('MONTH(tanggal_sprditerima)'), $bulan)
            ->whereIn(DB::raw('YEAR(tanggal_sprditerima)'), $queryTahun)
            ->where(function($query) use ($queryBagian) {
                foreach ($queryBagian as $bagian) {

                    if($bagian == 'gd'){
                        $query->orWhere('kode_mesin', 'LIKE', "%$bagian%")
                            ->where('kode_mesin', 'NOT LIKE',"%gdl%");
                    } else if($bagian == 'g-'){
                        $query->orWhere('kode_mesin', 'LIKE', "%$bagian%")
                                ->where('kode_mesin', 'NOT LIKE',"%tbg%") 
                                 ->where('kode_mesin', 'NOT LIKE',"%ang%")
                                 ->where('kode_mesin', 'NOT LIKE',"%jig%");
                    }else if($bagian == 'tb'){
                        $query->orWhere('kode_mesin', 'LIKE', "%$bagian%")
                                ->where('kode_mesin', 'NOT LIKE',"%tbg%");
                    }
                    else{
                        $query->orWhere('kode_mesin', 'LIKE', "%$bagian%");
                    }
                    
                }
            })
            ->where(function($query) use ($queryStatus) {
                foreach ($queryStatus as $Status) {
                    $query->orWhere('status', $Status);
                }
                })
            ->get();

            return view('spr.index', compact('spr', 'queryTahun','queryBulan' ,'queryBagian','queryStatus','tahuns'));
        }



        public function sprConvert()
        {   
            // Mendapatkan semua nomor SPR yang ada di tabel lp3m
            $nomorSprLp3m = lp3m::pluck('no_spr')->toArray();
        
            // Mengupdate status menjadi 'close' pada model Barang berdasarkan nomor SPR dari lp3m
            $jumlahUpdated = Barang::whereIn('nomor_spr', $nomorSprLp3m)->update(['status' => 'close']);
                
            // Mengirimkan data ke view atau pesan sukses
            return $jumlahUpdated > 0 ? "Update berhasil" : "Tidak ada data yang diperbarui";
        }



}
