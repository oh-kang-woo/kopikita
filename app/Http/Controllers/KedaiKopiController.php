<?php

namespace App\Http\Controllers;

use App\Models\KedaiKopi;
use Illuminate\Http\Request;

class KedaiKopiController extends Controller
{
    // USER VIEW
    public function index()
    {
        $kedai = KedaiKopi::all();
        return view('kedai.index', compact('kedai'));
    }

    // ADMIN INDEX
    public function adminIndex()
    {
        $kedai = KedaiKopi::all();
        return view('admin.kedai.index', compact('kedai'));
    }

    // CREATE
    public function create()
    {
        return view('admin.kedai.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'rating' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $fileName);
        }

        KedaiKopi::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileName
        ]);

        return redirect()->route('admin.kedai.index')->with('success', 'Kedai berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $kedai = KedaiKopi::findOrFail($id);
        return view('admin.kedai.edit', compact('kedai'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $kedai = KedaiKopi::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'rating' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $fileName = $kedai->gambar;

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $fileName);
        }

        $kedai->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileName
        ]);

        return redirect()->route('admin.kedai.index')->with('success', 'Kedai berhasil diperbarui');
    }

    // DELETE
    public function destroy($id)
    {
        KedaiKopi::findOrFail($id)->delete();

        return redirect()->route('admin.kedai.index')->with('success', 'Kedai berhasil dihapus');
    }
}
