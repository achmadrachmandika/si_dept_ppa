<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
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

            $daftarAset = Barang::select('tipe')
            ->distinct()
            ->pluck('tipe')
            ->toArray();

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
            $queryBulan = $daftarBulan;
            $bulans = collect($queryBulan)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();

            $queryBagian = $daftarAset;

            // //---------------------------------------------------------------------------------------------------------------------//

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
                    ->where(function($query) use ($daftarAset) {
                        foreach ($daftarAset as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprPerBulan[$bulan] = $spr;
                $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);
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
                    ->where('status', 'open')
                    ->where(function($query) use ($daftarAset) {
                        foreach ($daftarAset as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprOpenPerBulan[$bulan] = $spr;
                $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);
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
                    ->where('status', 'close')
                    ->where(function($query) use ($daftarAset) {
                        foreach ($daftarAset as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();
                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprClosePerBulan[$bulan] = $spr;
                $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);
                $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }
            $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------
        // ----------------------------------------Daftar Data Bagian----------------------------------------
        // $daftarDataBagian = [];
        // $daftarDataBagianPerTahun = [];

        // $CountDaftarDataBagianPerTahun= [];

        // $daftarDataBagianPerBulan = [];

        // foreach($daftarBagian as $bagian) {
        //     foreach ($bulans as $bulan) {
        //             $totalBagianPerBulan = 0; // Inisialisasi total per bulan
        
        //             foreach ($queryTahun as $tahun) {
        //                 if($bagian == 'gd'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%gdl%")
        //                                     ->get();
        //                 } else if($bagian == 'g-'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%tbg%") 
        //                                     ->where('kode_mesin', 'NOT LIKE',"%ang%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%jig%")
        //                                     ->get();
        //                 }else if($bagian == 'tb'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%tbg%")
        //                                     ->get();
        //                 }
        //                 else{
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->get();
        //                 }

        //                 $daftarDataBagianPerTahun[$tahun] = $dataBagian;

        //                 $CountDaftarDataBagianPerTahun[$tahun] = count($daftarDataBagianPerTahun[$tahun]);
                        
        //                 $jumlahPerTahun = array_sum($CountDaftarDataBagianPerTahun);

                        
        //         }

        //         $daftarDataBagianPerBulan[$bulan] = $jumlahPerTahun;

                
        //     }
        //     $totalDataBagianPerBulan = array_sum($daftarDataBagianPerBulan);
            
        //     $daftarDataBagian[$bagian] = $totalDataBagianPerBulan;
        //}
    

        // ---------------------------------------------------------------------------------------------

            return view('dashboard', compact('spr', 'queryTahun','queryBagian','daftarSpr','daftarSprClose','daftarSprOpen' ,'daftarAset','tahuns'));
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

            $daftarAset = Barang::select('tipe')
            ->distinct()
            ->pluck('tipe')
            ->toArray();


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

            // //---------------------------------------------------------------------------------------------------------------------//

            // //-----------------------------------------------------FILTER BAGIAN-----------------------------------------------------//

            $queryBagian = $request->aset;
            if($queryBagian == null){
                $queryBagian = $daftarAset;
            } 

            // //---------------------------------------------------------------------------------------------------------------------//


        // $spr = Barang::all();
        // $sprClose = Barang::where('status', 'close')->get();
        // $sprOpen = Barang::where('status', 'open')->get();

        // $countSpr = count($spr);
        // $countsprClose = count($sprClose);
        // $countSprOpen = count($sprOpen);

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
                        foreach ($queryBagian as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprPerBulan[$bulan] = $spr;
                $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);
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
                    ->where('status', 'open')
                    ->where(function($query) use ($queryBagian) {
                        foreach ($queryBagian as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();

                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprOpenPerBulan[$bulan] = $spr;
                $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);
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
                    ->where('status', 'close')
                    ->where(function($query) use ($queryBagian) {
                        foreach ($queryBagian as $tipe) {           
                                $query->orwhere('tipe',$tipe);  
                        }
                    })
                    ->get();
                // Menyimpan data Barang untuk bulan tertentu ke dalam array
                $daftarSprClosePerBulan[$bulan] = $spr;
                $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);
                $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
            }
            $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        }

        // ---------------------------------------------------------------------------------------------


        // ----------------------------------------Daftar Data Bagian----------------------------------------
        // $daftarDataBagian = [];
        // $daftarDataBagianPerTahun = [];

        // $CountDaftarDataBagianPerTahun= [];

        // $daftarDataBagianPerBulan = [];

        // foreach($daftarBagian as $bagian) {
        //     foreach ($bulanBagians as $bulan) {
        //             $totalBagianPerBulan = 0; // Inisialisasi total per bulan
        
        //             foreach ($queryTahun as $tahun) {
        //                 if($bagian == 'gd'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%gdl%")
        //                                     ->get();
        //                 } else if($bagian == 'g-'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%tbg%") 
        //                                     ->where('kode_mesin', 'NOT LIKE',"%ang%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%jig%")
        //                                     ->get();
        //                 }else if($bagian == 'tb'){
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->where('kode_mesin', 'NOT LIKE',"%tbg%")
        //                                     ->get();
        //                 }
        //                 else{
        //                     $dataBagian = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                                     ->whereMonth('tanggal_sprditerima', $bulan)
        //                                     ->where('kode_mesin', 'LIKE', "%$bagian%")
        //                                     ->get();
        //                 }

        //                 $daftarDataBagianPerTahun[$tahun] = $dataBagian;

        //                 $CountDaftarDataBagianPerTahun[$tahun] = count($daftarDataBagianPerTahun[$tahun]);
                        
        //                 $jumlahPerTahun = array_sum($CountDaftarDataBagianPerTahun);

                        
        //         }

        //         $daftarDataBagianPerBulan[$bulan] = $jumlahPerTahun;

                
        //     }
        //     $totalDataBagianPerBulan = array_sum($daftarDataBagianPerBulan);
            
        //     $daftarDataBagian[$bagian] = $totalDataBagianPerBulan;
        // }
        // ---------------------------------------------------------------------------------------------

            return view('dashboard', compact('spr', 'queryTahun','daftarSpr','daftarSprOpen','daftarSprClose','daftarAset','queryBagian','tahuns'));
        }


        // public function monitoringDinamis(){
        //     $tahuns = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
        //     ->groupBy('tahun')
        //     ->pluck('tahun');
        //     $tahunArray = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
        //     ->groupBy('tahun')
        //     ->pluck('tahun')
        //     ->toArray();
        //     $daftarBulan = [
        //         'january', 'february', 'march', 'april', 'may', 'june',
        //         'july', 'august', 'september', 'october', 'november', 'december'
        //     ];

        //     $daftarAset = Barang::select('tipe')
        //     ->distinct()
        //     ->pluck('tipe')
        //     ->toArray();

        //     // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
        //     $queryTahun = $tahuns;
        //     // Konversi data ke integer
        //     $queryTahun = collect($queryTahun)->map(function ($item) {
        //         return (int) $item;
        //     })->toArray();


        //     // Jika $queryTahun kosong, atur nilai menjadi array kosong
        //     if ($queryTahun == null) {
        //         $queryTahun = $tahunArray;
        //     }

        //     // //---------------------------------------------------------------------------------------------------------------------//

        //     // //-----------------------------------------------------FILTER BULAN-----------------------------------------------------//
        //     $queryBulan = $daftarBulan;
        //     $bulans = collect($queryBulan)->map(function ($item) {
        //         return Carbon::parse($item)->month;
        //     })->toArray();

        //     $queryBagian = $daftarAset;

        //     // //---------------------------------------------------------------------------------------------------------------------//

        //     // Buat array untuk menyimpan data Barang untuk setiap bulan

        //     $daftarSpr = [];
        //     $daftarSprPerBulan = [];
        //     $daftarSprPerTahun = [];

        //     $daftarSprOpen = [];
        //     $daftarSprOpenPerBulan = [];
        //     $daftarSprOpenPerTahun = [];


        //     $daftarSprClose = [];
        //     $daftarSprClosePerBulan = [];
        //     $daftarSprClosePerTahun = [];


        //     foreach ($daftarAset as $aset) {
        //         // ----------------------------------------Daftar Spr All----------------------------------------
        //     foreach ($bulans as $bulan) {
        //         $totalPerBulan = 0; // Inisialisasi total per bulan
        //         foreach ($queryTahun as $tahun) {
        //             // Mengambil data Barang untuk bulan tertentu
        //             $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                 ->whereMonth('tanggal_sprditerima', $bulan)
        //                 ->where('tipe',$aset)
        //                 ->get();

        //             // Menyimpan data Barang untuk bulan tertentu ke dalam array
        //             $daftarSprPerBulan[$bulan] = $spr;
        //             $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);
        //             $totalPerBulan += $CountDaftarSprPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
        //         }
        //         $daftarSpr[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        //     }
        
        //     // ---------------------------------------------------------------------------------------------

        //     // ----------------------------------------Daftar Spr Open----------------------------------------

        //     foreach ($bulans as $bulan) {
        //         $totalPerBulan = 0; // Inisialisasi total per bulan
        //         foreach ($queryTahun as $tahun) {
        //             // Mengambil data Barang untuk bulan tertentu
        //             $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                 ->whereMonth('tanggal_sprditerima', $bulan)
        //                 ->where('status', 'open')
        //                 ->where('tipe',$aset)
        //                 ->get();

        //             // Menyimpan data Barang untuk bulan tertentu ke dalam array
        //             $daftarSprOpenPerBulan[$bulan] = $spr;
        //             $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);
        //             $totalPerBulan += $CountDaftarSprOpenPerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
        //         }
        //         $daftarSprOpen[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        //     }

        //     // ---------------------------------------------------------------------------------------------


        //     // ----------------------------------------Daftar Spr Close----------------------------------------

        //     foreach ($bulans as $bulan) {
        //         $totalPerBulan = 0; // Inisialisasi total per bulan

        //         foreach ($queryTahun as $tahun) {
        //             // Mengambil data Barang untuk bulan tertentu
        //             $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
        //                 ->whereMonth('tanggal_sprditerima', $bulan)
        //                 ->where('status', 'close')
        //                 ->where('tipe',$aset)
        //                 ->get();
        //             // Menyimpan data Barang untuk bulan tertentu ke dalam array
        //             $daftarSprClosePerBulan[$bulan] = $spr;
        //             $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);
        //             $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
        //         }
        //         $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
        //     }

        //     // ---------------------------------------------------------------------------------------------
        //         return view('dynamic-dashboard', compact('spr', 'queryTahun','queryBagian','daftarSpr','daftarSprClose','daftarSprOpen' ,'daftarAset','tahuns','aset'));
        //     }
        // }

        public function monitoringDinamis(Request $request){

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

            $queryBulan = $daftarBulan;
            $bulans = collect($queryBulan)->map(function ($item) {
                return Carbon::parse($item)->month;
            })->toArray();

            $queryTahun = $tahuns;
                // Konversi data ke integer
                $queryTahun = collect($queryTahun)->map(function ($item) {
                    return (int) $item;
                })->toArray();

            $daftarAset = session()->get('daftarAset', []);
        
            // Jika daftar aset masih kosong, isi daftar aset dari database
            if (empty($daftarAset)) {
                $daftarAset = Barang::select('tipe')
                    ->distinct()
                    ->pluck('tipe')
                    ->toArray();
        
                session()->put('daftarAset', $daftarAset);
            }
        
            // Ambil aset berikutnya dari daftar aset
            $aset = session()->get('aset_index', 0);
            $asetKey = $aset + 1;
            if ($asetKey >= count($daftarAset)) {
                // Jika sudah mencapai akhir daftar aset, kembali ke awal
                $asetKey = 0;
            }
            session()->put('aset_index', $asetKey);
            $aset = $daftarAset[$asetKey];
        
            $daftarSpr = [];
            $daftarSprClose = [];
            $daftarSprOpen = [];

            foreach ($bulans as $bulan) {
                        $totalPerBulan = 0; // Inisialisasi total per bulan
                        foreach ($queryTahun as $tahun) {
                            // Mengambil data Barang untuk bulan tertentu
                            $spr = Barang::whereYear('tanggal_sprditerima', $tahun)
                                ->whereMonth('tanggal_sprditerima', $bulan)
                                ->where('tipe',$aset)
                                ->get();
        
                            // Menyimpan data Barang untuk bulan tertentu ke dalam array
                            $daftarSprPerBulan[$bulan] = $spr;
                            $CountDaftarSprPerBulan[$bulan] = count($daftarSprPerBulan[$bulan]);
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
                                ->where('status', 'open')
                                ->where('tipe',$aset)
                                ->get();
        
                            // Menyimpan data Barang untuk bulan tertentu ke dalam array
                            $daftarSprOpenPerBulan[$bulan] = $spr;
                            $CountDaftarSprOpenPerBulan[$bulan] = count($daftarSprOpenPerBulan[$bulan]);
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
                                ->where('status', 'close')
                                ->where('tipe',$aset)
                                ->get();
                            // Menyimpan data Barang untuk bulan tertentu ke dalam array
                            $daftarSprClosePerBulan[$bulan] = $spr;
                            $CountDaftarSprClosePerBulan[$bulan] = count($daftarSprClosePerBulan[$bulan]);
                            $totalPerBulan += $CountDaftarSprClosePerBulan[$bulan]; // Menambahkan jumlah ke total per bulan
                        }
                        $daftarSprClose[$bulan] = $totalPerBulan; // Menyimpan total per bulan ke dalam array utama
                    }
        
                    // ---------------------------------------------------------------------------------------------
        
            return view('dynamic-dashboard', compact('daftarSpr','daftarSprClose','daftarSprOpen' ,'daftarAset','aset'));
        }
        

        
}

