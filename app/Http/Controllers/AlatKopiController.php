<?php

namespace App\Http\Controllers;

use App\Models\AlatKopi;
use Illuminate\Http\Request;

class AlatKopiController extends Controller
{
    // Halaman untuk admin input alat kopi
    public function create()
    {
        return view('admin.alat_kopi.create');
    }

    // Simpan data alat kopi
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'deskripsi_panjang' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('alat_kopi', 'public');
        }

        AlatKopi::create([
            'nama' => $request->nama,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi_panjang' => $request->deskripsi_panjang,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.alat_kopi.create')->with('success', 'Alat kopi berhasil ditambahkan!');
    }


    // Tampilkan semua alat kopi di halaman publik
    public function index()
    {
        $alatKopis = AlatKopi::latest()->get();
        return view('alat', compact('alatKopis'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $alatKopis = AlatKopi::where('nama', 'like', "%{$query}%")
                            ->orWhere('deskripsi_singkat', 'like', "%{$query}%")
                            ->get();

        return view('alat_kopi.index', compact('alatKopis'));
    }

    public function show($id)
    {
        $alat = AlatKopi::findOrFail($id);
        return view('show', compact('alat'));
    }


}
