<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // =================== USER VIEW ====================
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'online');

        $events = Event::where('tipe', $filter)
            ->where('status', 'aktif')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('event', compact('events', 'filter'));
    }

    // =================== ADMIN CRUD ====================
    public function adminIndex()
    {
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal',
            'lokasi' => 'required',
            'tipe' => 'required|in:online,offline',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('event', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal',
            'lokasi' => 'required',
            'tipe' => 'required|in:online,offline',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('event', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
    }
}
