<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'no_spr';

    /**
     * Indicates if the primary key is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_spr',
        'nama_barang',
        'lokasi',
        'tanggal_kerusakan',
        'kode_mesin',
        'no_aset',
        'jam_kerusakan',
        'user_peminta',
        'deskripsi_kerusakan',
        'site',
        'status_kerusakan',
        'tanggal_sprditerima',
        'jam_sprditerima'
    ];
}

