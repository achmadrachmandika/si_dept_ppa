<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lp3m;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;


class ClosedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {

        $daftarAset = Barang::select('tipe')
            ->distinct()
            ->pluck('tipe')
            ->toArray();

        $closed = Barang::select(
                'barangs.nomor_spr', 
                'barangs.nama_barang', 
                'barangs.lokasi', 
                'barangs.tanggal_kerusakan', 
                'barangs.kode_mesin', 
                'barangs.no_aset', 
                'barangs.jam_kerusakan', 
                'barangs.user_peminta', 
                'barangs.deskripsi_kerusakan', 
                'barangs.site', 
                'barangs.status_kerusakan', 
                'barangs.tanggal_sprditerima', 
                'barangs.jam_sprditerima', 
                DB::raw("'close' AS status"), 
                'lp3ms.no_spr', 
                'lp3ms.hasil_pengukuran', 
                'lp3ms.penyebab_kerusakan',
                'lp3ms.tanggal',
                'lp3ms.jam_mulai',
                'lp3ms.jam_selesai',
                'lp3ms.penyelesaian',
                'lp3ms.nama_sparepart_1',
                'lp3ms.kode_sparepart_1',
                'lp3ms.spek_sparepart_1',
                'lp3ms.jumlah_sparepart_1',
                'lp3ms.satuan_sparepart_1',
                'lp3ms.nama_sparepart_2',
                'lp3ms.kode_sparepart_2',
                'lp3ms.spek_sparepart_2',
                'lp3ms.jumlah_sparepart_2',
                'lp3ms.satuan_sparepart_2',
                'lp3ms.nama_sparepart_3',
                'lp3ms.kode_sparepart_3',
                'lp3ms.spek_sparepart_3',
                'lp3ms.jumlah_sparepart_3',
                'lp3ms.satuan_sparepart_3',
                'lp3ms.nama_sparepart_4',
                'lp3ms.kode_sparepart_4',
                'lp3ms.spek_sparepart_4',
                'lp3ms.jumlah_sparepart_4',
                'lp3ms.satuan_sparepart_4',
                 'lp3ms.nama_sparepart_5',
                'lp3ms.kode_sparepart_5',
                'lp3ms.spek_sparepart_5',
                'lp3ms.jumlah_sparepart_5',
                'lp3ms.satuan_sparepart_5',
                
                 'lp3ms.nama_sparepart_6',
                'lp3ms.kode_sparepart_6',
                'lp3ms.spek_sparepart_6',
                'lp3ms.jumlah_sparepart_6',
                'lp3ms.satuan_sparepart_6',

                 'lp3ms.nama_sparepart_7',
                'lp3ms.kode_sparepart_7',
                'lp3ms.spek_sparepart_7',
                'lp3ms.jumlah_sparepart_7',
                'lp3ms.satuan_sparepart_7',

                 'lp3ms.nama_sparepart_8',
                'lp3ms.kode_sparepart_8',
                'lp3ms.spek_sparepart_8',
                'lp3ms.jumlah_sparepart_8',
                'lp3ms.satuan_sparepart_8',

                 'lp3ms.nama_sparepart_9',
                'lp3ms.kode_sparepart_9',
                'lp3ms.spek_sparepart_9',
                'lp3ms.jumlah_sparepart_9',
                'lp3ms.satuan_sparepart_9',

                 'lp3ms.nama_sparepart_10',
                'lp3ms.kode_sparepart_10',
                'lp3ms.spek_sparepart_10',
                'lp3ms.jumlah_sparepart_10',
                'lp3ms.satuan_sparepart_10',

                'lp3ms.nama_personil_1',
                'lp3ms.nama_personil_2',
                'lp3ms.nama_personil_3',
                'lp3ms.nama_personil_4',
                'lp3ms.nama_personil_5',
                'lp3ms.nama_personil_6',
                'lp3ms.nama_personil_7',
                'lp3ms.nama_personil_8',
                'lp3ms.nama_personil_9',
                'lp3ms.nama_personil_10',

                'lp3ms.keterangan',

                
            )
            ->leftJoin('lp3ms', 'barangs.nomor_spr', '=', 'lp3ms.no_spr')
            ->leftJoin('lp3ms AS lpr3ms', 'lp3ms.no_spr', '=', 'lpr3ms.no_spr') // Use a unique alias for the second instance
            ->where('barangs.status', 'close')
            ->paginate(10);

           $tahuns = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
            ->groupBy('tahun')
            ->pluck('tahun');

        $queryTahun = [];
        $queryBulan = [];
        $queryBagian = [];

        return view('laporan.closed', compact('closed', 'tahuns', 'queryTahun', 'queryBulan', 'queryBagian', 'daftarAset'));

    }

      public function filterClosed(Request $request)
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
    
    $queryBagian = $request->aset;
    if($queryBagian == null){
        $queryBagian = $daftarAset;
    }

    //---------------------------------------------------------------------------------------------------------------------//
    
    //-----------------------------------------------------FILTER STATUS-----------------------------------------------------//
    
    $queryStatus = $request->status;
    
    if($queryStatus == null){
        $queryStatus = $daftarStatus;
    }
    //---------------------------------------------------------------------------------------------------------------------//
    
    
    // Mengambil data barang dengan tanggal_spr dibuat pada bulan dan tahun yang spesifik
       $closed = Barang::leftJoin('lp3ms', 'barangs.nomor_spr', '=', 'lp3ms.no_spr')
    ->leftJoin('lp3ms AS lpr3ms', 'lp3ms.no_spr', '=', 'lpr3ms.no_spr') // Alias unik untuk instansi kedua
    ->where('barangs.status', 'close')
    ->whereIn(DB::raw('MONTH(tanggal_sprditerima)'), $bulan)
    ->whereIn(DB::raw('YEAR(tanggal_sprditerima)'), $queryTahun)
    ->where(function($query) use ($daftarAset) {
        foreach ($daftarAset as $tipe) {           
                $query->orwhere('tipe',$tipe);  
        }
    })
    ->whereIn('status', ['close', 'closed']) // Memperbaiki kondisi untuk status tertutup
        ->get();

    return view('laporan.closed', compact('closed','queryTahun','queryBulan' ,'queryBagian','queryStatus','tahuns', 'daftarAset'));
}

}
