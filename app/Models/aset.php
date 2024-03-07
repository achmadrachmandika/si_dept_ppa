<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_unit',
        'equipment',
        'nama_unit',
        'no_aset',
        'tipe',
    ];

}
