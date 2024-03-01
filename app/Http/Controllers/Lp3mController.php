<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\lp3m;

class Lp3mController extends Controller
{


        public function index(){
                
                return view('layouts/lp3m');
        }

        public function create(request $request){


                
                $data = [
                        'hasil_pengukuran' => $request->input('hasil_pengukuran'),
                        'penyebab_kerusakan' => $request->input('penyebab_kerusakan'),
                        'nama_personil_1' => $request->input('nama_personil_1'),
                        'nama_personil_2' => $request->input('nama_personil_2'),
                        'nama_personil_3' => $request->input('nama_personil_3'),
                        'nama_personil_4' => $request->input('nama_personil_4'),
                        'nama_personil_5' => $request->input('nama_personil_5'),
                        'nama_personil_6' => $request->input('nama_personil_6'),
                        'nama_personil_7' => $request->input('nama_personil_7'),
                        'nama_personil_8' => $request->input('nama_personil_8'),
                        'nama_personil_9' => $request->input('nama_personil_9'),
                        'nama_personil_10' => $request->input('nama_personil_10'),
                        'alasan' => $request->input('alasan'),
                        'tanggal' => $request->input('tanggal'),
                        'jam_mulai' => $request->input('jam_mulai'),
                        'jam_selesai' => $request->input('jam_selesai'),
                        'penyelesaian' => $request->input('penyelesaian'),
                        'nama_sparepart_1' => $request->input('nama_sparepart_1'),
                        'kode_sparepart_1' => $request->input('kode_sparepart_1'),
                        'spek_sparepart_1' => $request->input('spesifikasi_sparepart_1'),
                        'jumlah_sparepart_1' => $request->input('jumlah_sparepart_1'),

                        'nama_sparepart_2' => $request->input('nama_sparepart_2'),
                        'kode_sparepart_2' => $request->input('kode_sparepart_2'),
                        'spek_sparepart_2' => $request->input('spesifikasi_sparepart_2'),
                        'jumlah_sparepart_2' => $request->input('jumlah_sparepart_2'),

                        'nama_sparepart_3' => $request->input('nama_sparepart_3'),
                        'kode_sparepart_3' => $request->input('kode_sparepart_3'),
                        'spek_sparepart_3' => $request->input('spesifikasi_sparepart_3'),
                        'jumlah_sparepart_3' => $request->input('jumlah_sparepart_3'),

                        'nama_sparepart_4' => $request->input('nama_sparepart_4'),
                        'kode_sparepart_4' => $request->input('kode_sparepart_4'),
                        'spek_sparepart_4' => $request->input('spesifikasi_sparepart_4'),
                        'jumlah_sparepart_4' => $request->input('jumlah_sparepart_4'),

                        'nama_sparepart_5' => $request->input('nama_sparepart_5'),
                        'kode_sparepart_5' => $request->input('kode_sparepart_5'),
                        'spek_sparepart_5' => $request->input('spesifikasi_sparepart_5'),
                        'jumlah_sparepart_5' => $request->input('jumlah_sparepart_5'),

                        'nama_sparepart_6' => $request->input('nama_sparepart_6'),
                        'kode_sparepart_6' => $request->input('kode_sparepart_6'),
                        'spek_sparepart_6' => $request->input('spesifikasi_sparepart_6'),
                        'jumlah_sparepart_6' => $request->input('jumlah_sparepart_6'),

                        'nama_sparepart_7' => $request->input('nama_sparepart_7'),
                        'kode_sparepart_7' => $request->input('kode_sparepart_7'),
                        'spek_sparepart_7' => $request->input('spesifikasi_sparepart_7'),
                        'jumlah_sparepart_7' => $request->input('jumlah_sparepart_7'),

                        'nama_sparepart_8' => $request->input('nama_sparepart_8'),
                        'kode_sparepart_8' => $request->input('kode_sparepart_8'),
                        'spek_sparepart_8' => $request->input('spesifikasi_sparepart_8'),
                        'jumlah_sparepart_8' => $request->input('jumlah_sparepart_8'),

                        'nama_sparepart_9' => $request->input('nama_sparepart_9'),
                        'kode_sparepart_9' => $request->input('kode_sparepart_9'),
                        'spek_sparepart_9' => $request->input('spesifikasi_sparepart_9'),
                        'jumlah_sparepart_9' => $request->input('jumlah_sparepart_9'),

                        'nama_sparepart_10' => $request->input('nama_sparepart_10'),
                        'kode_sparepart_10' => $request->input('kode_sparepart_10'),
                        'spek_sparepart_10' => $request->input('spesifikasi_sparepart_10'),
                        'jumlah_sparepart_10' => $request->input('jumlah_sparepart_10'),

                        'keterangan' => $request->input('keterangan'),
                ];

                lp3m::create($data);
                return redirect('/riwayat-lp3m');
        }

        public function riwayatLp3m(){

                $data = lp3m::all();
                
                return view('layouts.riwayat-lp3m',[
                        'datas' => $data
                ]);
        }

        public function showLp3m($id){


                $data = lp3m::where('nomor_spr', $id)->first();
                
                return view('layouts.showLp3m',[
                        'data' => $data
                ]);
        }


}
