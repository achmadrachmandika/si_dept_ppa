<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lp3m;

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
                \DB::raw("'closed' AS status_lp3m"), 
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
            )
            ->leftJoin('lp3ms', 'barangs.nomor_spr', '=', 'lp3ms.no_spr')
            ->leftJoin('lp3ms AS lpr3ms', 'lp3ms.no_spr', '=', 'lpr3ms.no_spr') // Use a unique alias for the second instance
            ->where('barangs.status_lp3m', 'closed')
            ->get();

        return view('laporan.closed', compact('closed'));
    }
}
