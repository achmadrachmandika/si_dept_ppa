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
    protected $primaryKey = 'nomor_spr';

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
        'nomor_spr',
        'nama_barang',
        'lokasi',
        'tanggal_kerusakan',
        'kode_mesin',
        'no_aset',
        'tipe',
        'jam_kerusakan',
        'user_peminta',
        'email_user',
        'status',
        'deskripsi_kerusakan',
        'site',
        'status_kerusakan',
        'tanggal_sprditerima',
        'jam_sprditerima',
        'status_lp3m',
    ];
}

