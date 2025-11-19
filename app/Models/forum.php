<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; // <-- WAJIB DITAMBAHKAN

class Forum extends Model
{
    protected $fillable = ['judul', 'thumbnail'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'forum_id');
    }
}
