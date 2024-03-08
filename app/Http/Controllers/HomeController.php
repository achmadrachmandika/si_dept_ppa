<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\lp3m;
class HomeController extends Controller
{
  public function index()
    {
        $spr = Barang::all();
        $lp3m = Lp3m::all();

        $countSpr = count($spr);
        $countLp3m = count($lp3m);

        return view('dashboard', [
            'countSpr' => $countSpr,
            'countLp3m' => $countLp3m,
            'countProcessedSpr' => $countLp3m
        ]);
    }
}

