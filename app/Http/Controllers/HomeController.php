<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\lp3m;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
class HomeController extends Controller
{
  public function index()
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

            // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
            $queryTahun = $tahuns;
            // Konversi data ke integer
            $queryTahun = collect($queryTahun)->map(function ($item) {
                return (int) $item;
            })->toArray();


            // Jika $queryTahun kosong, atur nilai menjadi array kosong
            if ($queryTahun == null) {
                $queryTahun = $tahunArray;
            }

            // //---------------------------------------------------------------------------------------------------------------------//

            // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
            $queryBulanBagian = $daftarBulan;
            $bulans = collect($queryBulanBagian)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();

            // //---------------------------------------------------------------------------------------------------------------------//

            // //-----------------------------------------------------FILTER BAGIAN-----------------------------------------------------//
            $queryBagian = $daftarBagian;
            
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

            


        $spr = Barang::all();
        $sprClose = Barang::where('status', 'close')->get();
        $sprOpen = Barang::where('status', 'open')->get();

        $countSpr = count($spr);
        $countsprClose = count($sprClose);
        $countSprOpen = count($sprOpen);

        // Buat array untuk menyimpan data Barang untuk setiap bulan

        $daftarSpr = [];
        $daftarSprPerBulan = [];
        $daftarSprPerTahun = [];

        $daftarSprOpen = [];
        $daftarSprOpenPerBulan = [];
        $daftarSprOpenPerTahun = [];


        $daftarSprClose = [];
        $daftarSprClosePerBulan = [];
        $daftarSprClosePerTahun = [];



        // ----------------------------------------Daftar Spr All----------------------------------------
        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprPerBulan[$bulan] = $spr;

                $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);

                $daftarSprPerTahun[$tahun] = $CountDaftarSprPerBulan[$bulan];

                $totalPerBulan += $CountDaftarSprPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSpr[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------
        // ----------------------------------------Daftar Spr Open----------------------------------------

        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
                    ->where('status','open')
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprOpenPerBulan[$bulan] = $spr;

                $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);

                $daftarSprOpenPerTahun[$tahun] = $CountDaftarSprOpenPerBulan[$bulan];

                $totalPerBulan += $CountDaftarSprOpenPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSprOpen[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------


        // ----------------------------------------Daftar Spr Open----------------------------------------

        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
                    ->where('status','close')
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprClosePerBulan[$bulan] = $spr;

                $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);

                $daftarSprClosePerTahun[$tahun] = $CountDaftarSprClosePerBulan[$bulan];

                $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------
        // ----------------------------------------Daftar Data Bagian----------------------------------------
        $daftarDataBagian = [];
        $daftarDataBagianPerTahun = [];

        $CountDaftarDataBagianPerTahun= [];

        $daftarDataBagianPerBulan = [];

        foreach($daftarBagian as $bagian) {
            foreach ($bulans as $bulan) {
                    $totalBagianPerBulan = 0; // Inisialisasi total per bulan
        
                    foreach ($queryTahun as $tahun) {
                        if($bagian == 'gd'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%gdl%")
                                            ->get();
                        } else if($bagian == 'g-'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%tbg%") 
                                            ->where('kode_mesin', 'NOT LIKE',"%ang%")
                                            ->where('kode_mesin', 'NOT LIKE',"%jig%")
                                            ->get();
                        }else if($bagian == 'tb'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%tbg%")
                                            ->get();
                        }
                        else{
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->get();
                        }

                        $daftarDataBagianPerTahun[$tahun] = $dataBagian;

                        $CountDaftarDataBagianPerTahun[$tahun] = count($daftarDataBagianPerTahun[$tahun]);
                        
                        $jumlahPerTahun = array_sum($CountDaftarDataBagianPerTahun);

                        
                }

                $daftarDataBagianPerBulan[$bulan] = $jumlahPerTahun;

                
            }
            $totalDataBagianPerBulan = array_sum($daftarDataBagianPerBulan);
            
            $daftarDataBagian[$bagian] = $totalDataBagianPerBulan;
        }
    

        // ---------------------------------------------------------------------------------------------

            return view('dashboard', compact('spr', 'queryTahun','daftarSpr','daftarSprOpen','queryBulanBagian','daftarDataBagian','daftarSprClose' ,'queryBagian','tahuns'));
        }

    public function filterHome(Request $request)
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

            // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
            $queryTahun = $request->tahun;
            // Konversi data ke integer
            $queryTahun = collect($queryTahun)->map(function ($item) {
                return (int) $item;
            })->toArray();


            // Jika $queryTahun kosong, atur nilai menjadi array kosong
            if ($queryTahun == null) {
                $queryTahun = $tahunArray;
            }

            // //---------------------------------------------------------------------------------------------------------------------//

            // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//

            
            $queryBulan = $daftarBulan;
            $bulans = collect($queryBulan)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();

            $queryBulanBagian = $request->bulan;

            if ($queryBulanBagian == null) {
                $queryBulanBagian = $daftarBulan;
            }
            $bulanBagians = collect($queryBulanBagian)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();


            // //---------------------------------------------------------------------------------------------------------------------//

            // //-----------------------------------------------------FILTER BAGIAN-----------------------------------------------------//

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

            // //---------------------------------------------------------------------------------------------------------------------//


        $spr = Barang::all();
        $sprClose = Barang::where('status', 'close')->get();
        $sprOpen = Barang::where('status', 'open')->get();

        $countSpr = count($spr);
        $countsprClose = count($sprClose);
        $countSprOpen = count($sprOpen);

        // Buat array untuk menyimpan data Barang untuk setiap bulan

        $daftarSpr = [];
        $daftarSprPerBulan = [];
        $daftarSprPerTahun = [];

        $daftarSprOpen = [];
        $daftarSprOpenPerBulan = [];
        $daftarSprOpenPerTahun = [];


        $daftarSprClose = [];
        $daftarSprClosePerBulan = [];
        $daftarSprClosePerTahun = [];


        // ----------------------------------------Daftar Spr All----------------------------------------
        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprPerBulan[$bulan] = $spr;

                $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);

                $daftarSprPerTahun[$tahun] = $CountDaftarSprPerBulan[$bulan];

                $totalPerBulan += $CountDaftarSprPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSpr[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------
        // ----------------------------------------Daftar Spr Open----------------------------------------

        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
                    ->where('status','open')
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprOpenPerBulan[$bulan] = $spr;

                $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);

                $daftarSprOpenPerTahun[$tahun] = $CountDaftarSprOpenPerBulan[$bulan];

                $totalPerBulan += $CountDaftarSprOpenPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSprOpen[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------


        // ----------------------------------------Daftar Spr Close----------------------------------------

        foreach ($bulans as $bulan) {
            $totalPerBulan = 0; // Inisialisasi total per bulan

            foreach ($queryTahun as $tahun) {
                // Mengambil data Barang untuk bulan tertentu
                $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                    ->whereMonth('tanggal_sprditerima', $bulan)
                    ->where('status','close')
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
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprClosePerBulan[$bulan] = $spr;
                $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);
                $daftarSprClosePerTahun[$tahun] = $CountDaftarSprClosePerBulan[$bulan];
                $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }

            $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------


        // ----------------------------------------Daftar Data Bagian----------------------------------------
        $daftarDataBagian = [];
        $daftarDataBagianPerTahun = [];

        $CountDaftarDataBagianPerTahun= [];

        $daftarDataBagianPerBulan = [];

        foreach($daftarBagian as $bagian) {
            foreach ($bulanBagians as $bulan) {
                    $totalBagianPerBulan = 0; // Inisialisasi total per bulan
        
                    foreach ($queryTahun as $tahun) {
                        if($bagian == 'gd'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%gdl%")
                                            ->get();
                        } else if($bagian == 'g-'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%tbg%") 
                                            ->where('kode_mesin', 'NOT LIKE',"%ang%")
                                            ->where('kode_mesin', 'NOT LIKE',"%jig%")
                                            ->get();
                        }else if($bagian == 'tb'){
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->where('kode_mesin', 'NOT LIKE',"%tbg%")
                                            ->get();
                        }
                        else{
                            $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
                                            ->whereMonth('tanggal_sprditerima', $bulan)
                                            ->where('kode_mesin', 'LIKE', "%$bagian%")
                                            ->get();
                        }

                        $daftarDataBagianPerTahun[$tahun] = $dataBagian;

                        $CountDaftarDataBagianPerTahun[$tahun] = count($daftarDataBagianPerTahun[$tahun]);
                        
                        $jumlahPerTahun = array_sum($CountDaftarDataBagianPerTahun);

                        
                }

                $daftarDataBagianPerBulan[$bulan] = $jumlahPerTahun;

                
            }
            $totalDataBagianPerBulan = array_sum($daftarDataBagianPerBulan);
            
            $daftarDataBagian[$bagian] = $totalDataBagianPerBulan;
        }
        // ---------------------------------------------------------------------------------------------

            return view('dashboard', compact('spr', 'queryTahun','queryBulanBagian','daftarSpr','daftarSprOpen','daftarSprClose','daftarDataBagian','queryBulan' ,'queryBagian','tahuns'));
        }
}

