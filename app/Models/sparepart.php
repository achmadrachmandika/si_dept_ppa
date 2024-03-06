<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_material',
        'nama_material',
        'spek_material',
    ];
}
