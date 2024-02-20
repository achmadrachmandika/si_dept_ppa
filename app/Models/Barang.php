<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'lokasi',
        'tanggal_kerusakan',
        'no_spr',
        'kode_mesin',
        'no_aset',
        'jam_kerusakan',
        'pic_penerima', // Perbaiki penulisan kolom
        'deskripsi_kerusakan',
        'site',
        'keterangan',
        'status_kerusakan'
    ];
}

