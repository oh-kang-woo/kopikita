@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Tambah Event</h3>

    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Judul Event</label>
        <input type="text" name="judul" class="form-control mb-3">

        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control mb-3">

        <label>Kategori</label>
        <select name="kategori" class="form-control mb-3">
            <option value="online">Online</option>
            <option value="offline">Offline</option>
        </select>

        <label>Platform / Lokasi</label>
        <input type="text" name="platform" class="form-control mb-3">

        <label>Poster (Opsional)</label>
        <input type="file" name="gambar" class="form-control mb-4">

        <button class="btn btn-primary w-100">Simpan</button>
    </form>
</div>
@endsection
