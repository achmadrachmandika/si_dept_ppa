<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\lp3m;
class HomeController extends Controller
{
    public function index()
    {

        $spr = barang::all();
        $lp3m = lp3m::all();

        $countspr = count($spr);
        $countlp3m = count($lp3m);

    
    return view('dashboard',[
            'countSpr' => $countspr,
            'countLp3m' => $countlp3m
    ]);
    }
}

