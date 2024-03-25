<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    use HasFactory;
    protected $table = 'spareparts';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'kode_material';

    protected $fillable = [
        'kode_material',
        'nama_material',
        'spek_material',
    ];
}
