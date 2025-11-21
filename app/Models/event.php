<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'judul',
        'tanggal',
        'tanggal_selesai',
        'lokasi',
        'tipe',
        'status',
        'gambar'
    ];
}
