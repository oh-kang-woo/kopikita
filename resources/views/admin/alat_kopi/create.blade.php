@extends('layouts.app')

@section('content')
<div class="container py-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Alat Kopi</h1>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    <form action="{{ route('admin.alat_kopi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Alat --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Nama Alat</label>
            <input
                type="text"
                name="nama"
                class="w-full p-3 border rounded-lg"
                placeholder="Contoh: French Press"
                required
            >
        </div>

        {{-- Deskripsi Singkat --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Deskripsi Singkat</label>
            <textarea
                name="deskripsi_singkat"
                class="w-full p-3 border rounded-lg"
                rows="3"
                placeholder="Deskripsi yang tampil di card tampilan awal..."
            ></textarea>
        </div>

        {{-- Deskripsi Panjang --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Deskripsi Panjang</label>
            <textarea
                name="deskripsi_panjang"
                class="w-full p-3 border rounded-lg"
                rows="8"
                placeholder="Penjelasan lengkap yang muncul di halaman detail (show.blade)..."
            ></textarea>
        </div>

        {{-- Upload Gambar --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Gambar</label>
            <input
                type="file"
                name="gambar"
                accept="image/*"
                class="block w-full"
            >
        </div>

        {{-- Submit --}}
        <button
            type="submit"
            class="bg-[#3E2B1D] text-white px-6 py-3 rounded-lg shadow-md hover:bg-[#2B1F14]"
        >
            Simpan
        </button>
    </form>
</div>
@endsection
