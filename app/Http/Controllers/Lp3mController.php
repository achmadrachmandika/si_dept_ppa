<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\lp3m;
use Illuminate\Support\Facades\DB; 
use PDF;

class Lp3mController extends Controller
{

        public function index(){
                
                return view('lp3m.lp3m');
        }


        public function searchCode(Request $request)
        {

                if ($request->get('query')) {
                        $query = $request->get('query');
                        $data = DB::table('barangs')
                            ->where('nomor_spr', 'LIKE', "%{$query}%")
                            ->get();
                    
                        $output = '<ul class="dropdown-menu" style="display:block; position:absolute;; max-height: 120px; overflow-y: auto;">';
                    
                        foreach ($data as $row) {
                            $output .= '
                            <a href="#" style="text-decoration:none; color:black;">
                                <li style="background-color: white; list-style-type: none; cursor: pointer; padding-left:10px" onmouseover="this.style.backgroundColor=\'grey\'" onmouseout="this.style.backgroundColor=\'initial\'">'
                                    . $row->nomor_spr .
                                '</li>
                            </a>
                            ';
                        }
                    
                        $output .= '</ul>';
                        echo $output;
                    }
        }

        public function searchCodeSparepart(Request $request)
        {       
                if ($request->get('query')) {
                        $query = $request->get('query');
                        $data = DB::table('spareparts')
                            ->where('kode_material', 'LIKE', "%{$query}%")
                            ->get();
                    
                        $output = '<ul class="dropdown-menu" style="display:block; position:absolute;; max-height: 120px; overflow-y: auto;">';
                    
                        foreach ($data as $row) {
                                $output .= '
                                <a href="#" style="text-decoration:none; color:black;">
                                    <li data-nama="' . $row->nama_material . '" data-spek="' . $row->spek_material . '" style="background-color: white; list-style-type: none; cursor: pointer; padding-left:10px" onmouseover="this.style.backgroundColor=\'grey\'" onmouseout="this.style.backgroundColor=\'initial\'">'
                                        . $row->kode_material .
                                    '</li>
                                </a>
                                ';
                        }
                    
                        $output .= '</ul>';
                        echo $output;
                    }
        }

        public function create(request $request){

                $validated = $request->validate([
                        'no_spr' => 'required|unique:lp3ms',
                        'hasil_pengukuran' => 'required|string|max:255',
                        'penyebab_kerusakan' => 'required|string|max:255',
                        'nama_personil_1' => 'required|string|max:255',
                        'alasan' => 'required',
                        'tanggal' => 'required',
                        'jam_mulai' => 'required',
                        'jam_selesai' => 'required',
                        'penyelesaian' => 'required|string|max:255',
                        'keterangan' => 'required|string|max:255',
                    ]);
                
                $data = [
                        'no_spr' => $request->input('no_spr'),
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
                        'satuan_sparepart_1' => $request->input('satuan_sparepart_1'),

                        'nama_sparepart_2' => $request->input('nama_sparepart_2'),
                        'kode_sparepart_2' => $request->input('kode_sparepart_2'),
                        'spek_sparepart_2' => $request->input('spesifikasi_sparepart_2'),
                        'jumlah_sparepart_2' => $request->input('jumlah_sparepart_2'),
                        'satuan_sparepart_2' => $request->input('satuan_sparepart_2'),

                        'nama_sparepart_3' => $request->input('nama_sparepart_3'),
                        'kode_sparepart_3' => $request->input('kode_sparepart_3'),
                        'spek_sparepart_3' => $request->input('spesifikasi_sparepart_3'),
                        'jumlah_sparepart_3' => $request->input('jumlah_sparepart_3'),
                        'satuan_sparepart_3' => $request->input('satuan_sparepart_3'),

                        'nama_sparepart_4' => $request->input('nama_sparepart_4'),
                        'kode_sparepart_4' => $request->input('kode_sparepart_4'),
                        'spek_sparepart_4' => $request->input('spesifikasi_sparepart_4'),
                        'jumlah_sparepart_4' => $request->input('jumlah_sparepart_4'),
                        'satuan_sparepart_4' => $request->input('satuan_sparepart_4'),

                        'nama_sparepart_5' => $request->input('nama_sparepart_5'),
                        'kode_sparepart_5' => $request->input('kode_sparepart_5'),
                        'spek_sparepart_5' => $request->input('spesifikasi_sparepart_5'),
                        'jumlah_sparepart_5' => $request->input('jumlah_sparepart_5'),
                        'satuan_sparepart_5' => $request->input('satuan_sparepart_5'),

                        'nama_sparepart_6' => $request->input('nama_sparepart_6'),
                        'kode_sparepart_6' => $request->input('kode_sparepart_6'),
                        'spek_sparepart_6' => $request->input('spesifikasi_sparepart_6'),
                        'jumlah_sparepart_6' => $request->input('jumlah_sparepart_6'),
                        'satuan_sparepart_6' => $request->input('satuan_sparepart_6'),

                        'nama_sparepart_7' => $request->input('nama_sparepart_7'),
                        'kode_sparepart_7' => $request->input('kode_sparepart_7'),
                        'spek_sparepart_7' => $request->input('spesifikasi_sparepart_7'),
                        'jumlah_sparepart_7' => $request->input('jumlah_sparepart_7'),
                        'satuan_sparepart_7' => $request->input('satuan_sparepart_7'),

                        'nama_sparepart_8' => $request->input('nama_sparepart_8'),
                        'kode_sparepart_8' => $request->input('kode_sparepart_8'),
                        'spek_sparepart_8' => $request->input('spesifikasi_sparepart_8'),
                        'jumlah_sparepart_8' => $request->input('jumlah_sparepart_8'),
                        'satuan_sparepart_8' => $request->input('satuan_sparepart_8'),

                        'nama_sparepart_9' => $request->input('nama_sparepart_9'),
                        'kode_sparepart_9' => $request->input('kode_sparepart_9'),
                        'spek_sparepart_9' => $request->input('spesifikasi_sparepart_9'),
                        'jumlah_sparepart_9' => $request->input('jumlah_sparepart_9'),
                        'satuan_sparepart_9' => $request->input('satuan_sparepart_9'),

                        'nama_sparepart_10' => $request->input('nama_sparepart_10'),
                        'kode_sparepart_10' => $request->input('kode_sparepart_10'),
                        'spek_sparepart_10' => $request->input('spesifikasi_sparepart_10'),
                        'jumlah_sparepart_10' => $request->input('jumlah_sparepart_10'),
                        'satuan_sparepart_10' => $request->input('satuan_sparepart_10'),

                        'keterangan' => $request->input('keterangan'),
                        
                ];


                
                lp3m::create($data);

                Barang::where('nomor_spr', $request->input('no_spr'))->update(['status' => 'close']);
                
                return redirect('/riwayat-lp3m')->with('message', "LP3M  Untuk SPR No. " . $validated['no_spr'] . " Berhasil Dibuat");
        }

        public function riwayatLp3m()
        {
        
        // Ambil data LP3M
        $datas = Lp3m::paginate(100);;
        
        // Kirimkan data ke view
        return view('lp3m.riwayat-lp3m', compact('datas'));
        }



      

        public function showLp3m($id){

                $barang = Barang::where('nomor_spr', $id)->first(); // Mengambil data dari model Barang dengan menggunakan 'nomor_spr'
                $data = lp3m::where('no_spr', $id)->first();
                
                return view('lp3m.showLp3m',[
                        'data' => $data,
                        'barang' => $barang
                ]);
        }
        public function editLp3m($id){


                $data = lp3m::where('no_spr', $id)->first();
                
                return view('lp3m.edit-Lp3m',[
                        'data' => $data
                ]);
        }

        public function updateLp3m(request $request, $id){

                $validated = $request->validate([
                        'no_spr' => 'required',
                        'hasil_pengukuran' => 'required|string|max:255',
                        'penyebab_kerusakan' => 'required|string|max:255',
                        'alasan' => 'required',
                        'tanggal' => 'required',
                        'jam_mulai' => 'required',
                        'jam_selesai' => 'required',
                        'penyelesaian' => 'required|string|max:255',
                        'keterangan' => 'required|string|max:255',
        ]);
                

                lp3m::where('no_spr',$id)->update([
                        'no_spr' => $validated['no_spr'],
                        'hasil_pengukuran' => $validated['hasil_pengukuran'],
                        'penyebab_kerusakan' => $validated['penyebab_kerusakan'],
                        'alasan' => $validated['alasan'],
                        'tanggal' => $validated['tanggal'],
                        'jam_mulai' => $validated['jam_mulai'],
                        'jam_selesai' => $validated['jam_selesai'],
                        'penyelesaian' => $validated['penyelesaian'],
                        'keterangan' => $validated['keterangan'],
                ]);
                return redirect('/riwayat-lp3m')->with('message', "LP3M Untuk SPR No. " . $validated['no_spr'] . " Berhasil Diedit");

        }

        public function deleteLp3m($id){

        
                lp3m::where('no_spr', $id)->delete();
                Barang::where('nomor_spr', $id)->update(['status_lp3m' => 'Open']); 
                return redirect('/riwayat-lp3m')->with('message-delete',"LP3M Untuk SPR No. " . $id . " Berhasil Dihapus");
        }



}
