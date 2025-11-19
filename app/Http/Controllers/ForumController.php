<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Halaman forum user
     */
    public function index()
    {
        $forums = Forum::withCount('comments')->get();
        return view('forum.index', compact('forums'));
    }

    /**
     * Detail forum user
     */
    public function show($id)
    {
        $forum = Forum::with('comments.user')->findOrFail($id);
        return view('forum.show', compact('forum'));
    }

    /**
     * Admin – list forum
     */
    public function adminIndex()
    {
        $forums = Forum::all();
        return view('admin.forum.index', compact('forums'));
    }

    /**
     * Admin – form create
     */
    public function create()
    {
        return view('admin.forum.create');
    }

    /**
     * Admin – store
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $thumbnailPath = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('forum_thumbnails', 'public')
            : null;

        Forum::create([
            'judul' => $request->judul,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('admin.forum.index')
            ->with('success', 'Forum berhasil dibuat!');
    }

    /**
     * Admin – edit
     */
    public function edit($id)
    {
        $forum = Forum::findOrFail($id);
        return view('admin.forum.edit', compact('forum'));
    }

    /**
     * Admin – update
     */
    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $forum->thumbnail = $request->file('thumbnail')->store('forum_thumbnails', 'public');
        }

        $forum->judul = $request->judul;
        $forum->save();

        return redirect()->route('admin.forum.index')
            ->with('success', 'Forum berhasil diperbarui!');
    }

    /**
     * Admin – delete
     */
    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();

        return redirect()->route('admin.forum.index')
            ->with('success', 'Forum berhasil dihapus!');
    }
}
