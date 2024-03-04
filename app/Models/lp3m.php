<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lp3m extends Model
{
    use HasFactory;

    protected $fillable = [
            'no_spr', // Menambah kolom no_spr
            'hasil_pengukuran',
            'penyebab_kerusakan',
            'alasan',
            'nama_personil_1',
            'nama_personil_2',
            'nama_personil_3',
            'nama_personil_4',
            'nama_personil_5',
            'nama_personil_6',
            'nama_personil_7',
            'nama_personil_8',
            'nama_personil_9',
            'nama_personil_10',
            'tanggal',
            'jam_mulai',
            'jam_selesai',
            'penyelesaian',
            'nama_sparepart_1',
            'kode_sparepart_1',
            'spek_sparepart_1',
            'jumlah_sparepart_1',
            'nama_sparepart_2',
            'kode_sparepart_2',
            'spek_sparepart_2',
            'jumlah_sparepart_2',
            'nama_sparepart_3',            
            'kode_sparepart_3',
            'spek_sparepart_3',
            'jumlah_sparepart_3',
            'nama_sparepart_4',
            'kode_sparepart_4',
            'spek_sparepart_4',
            'jumlah_sparepart_4',
            'nama_sparepart_5',
            'kode_sparepart_5',
            'spek_sparepart_5',
            'jumlah_sparepart_5',
            'nama_sparepart_6',
            'kode_sparepart_6',
            'spek_sparepart_6',
            'jumlah_sparepart_6',
            'nama_sparepart_7',
            'kode_sparepart_7',
            'spek_sparepart_7',
            'jumlah_sparepart_7',
            'nama_sparepart_8',
            'kode_sparepart_8',
            'spek_sparepart_8',
            'jumlah_sparepart_8',
            'nama_sparepart_9',
            'kode_sparepart_9',
            'spek_sparepart_9',
            'jumlah_sparepart_9',
            'nama_sparepart_10',
            'kode_sparepart_10',
            'spek_sparepart_10',
            'jumlah_sparepart_10',
            'keterangan',
    ];
}
