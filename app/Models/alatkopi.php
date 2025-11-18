<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatKopi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi_singkat',
        'deskripsi_panjang',
        'gambar',
    ];
}
