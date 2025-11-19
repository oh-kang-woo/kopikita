@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Edit Event</h3>

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <label>Judul Event</label>
        <input type="text" name="judul" value="{{ $event->judul }}" class="form-control mb-3">

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $event->tanggal }}" class="form-control mb-3">

        <label>Kategori</label>
        <select name="kategori" class="form-control mb-3">
            <option value="online" {{ $event->kategori == 'online' ? 'selected' : '' }}>Online</option>
            <option value="offline" {{ $event->kategori == 'offline' ? 'selected' : '' }}>Offline</option>
        </select>

        <label>Platform / Lokasi</label>
        <input type="text" name="platform" value="{{ $event->platform }}" class="form-control mb-3">

        <label>Poster Baru (Opsional)</label>
        <input type="file" name="gambar" class="form-control mb-4">

        <button class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection
