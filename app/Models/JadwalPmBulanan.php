<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPmBulanan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pm_bulanan'; // Sesuaikan dengan nama tabel yang benar di database Anda
    public $timestamps = true; // Atur ke true jika Anda ingin menggunakan timestamps created_at dan updated_at
    protected $primaryKey = 'no_unit'; // Sesuaikan dengan nama primary key yang benar
    public $incrementing = false;

    protected $fillable = [
        'no_unit',
        'nama_mesin',
        'equipment',
        'no_aset',
        'lokasi',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember',
    ];
}
