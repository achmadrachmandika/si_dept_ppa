<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitorController extends Controller
{
    // Menampilkan halaman monitor
    public function index()
    {
        return view('monitoring.monitor');
    }
}
