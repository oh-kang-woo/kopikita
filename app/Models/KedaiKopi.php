<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KedaiKopi extends Model
{
    use HasFactory;

    protected $table = 'kedai_kopi'; // ← FIX NAMA TABEL

    protected $fillable = [
        'nama',
        'lokasi',
        'rating',
        'deskripsi',
        'gambar'
    ];
}
