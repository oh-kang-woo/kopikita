@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Kedai Kopi</h2>

    <form action="{{ route('admin.kedai.update', $kedai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kedai</label>
            <input type="text" name="nama" class="form-control" value="{{ $kedai->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $kedai->lokasi }}" required>
        </div>

        <div class="mb-3">
            <label>Rating</label>
            <input type="number" step="0.1" name="rating" class="form-control" value="{{ $kedai->rating }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $kedai->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Baru (opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="/images/{{ $kedai->gambar }}" width="150">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <form action="{{ route('admin.kedai.delete', $kedai->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Hapus kedai?')">Hapus</button>
    </form>
</div>
@endsection
