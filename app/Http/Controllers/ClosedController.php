<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lp3m;
use Illuminate\Support\Facades\DB; 

class ClosedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
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
            ->get();

           $tahuns = Barang::selectRaw('YEAR(tanggal_sprditerima) as tahun')
            ->groupBy('tahun')
            ->pluck('tahun');

        $queryTahun = [];
        $queryBulan = [];

        return view('laporan.closed', compact('closed', 'tahuns', 'queryTahun', 'queryBulan'));
    }
}
