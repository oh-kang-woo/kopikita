<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $forumId)
    {
        $request->validate([
            'isi' => 'required'
        ]);

        Comment::create([
            'forum_id' => $forumId,
            'user_id' => Auth::id(),
            'isi' => $request->isi
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
