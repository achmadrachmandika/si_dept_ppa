<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPmBulanan; // Import model JadwalPmBulanan

class PmController extends Controller
{
    public function index()
    {
        // Mengambil semua data JadwalPmBulanan
        $jadwalPmBulanan = JadwalPmBulanan::all();

        // Mengembalikan view index dengan data JadwalPmBulanan
        return view('pm.index', compact('jadwalPmBulanan'));
    }
}
