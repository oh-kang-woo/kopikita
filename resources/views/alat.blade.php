@extends('layouts.app')

@section('content')

<style>
/* ... (Bagian CSS yang tidak berubah) ... */

    body {
        font-family: serif;
    }

    .page-bg {
        background: #EAE5D6;
        min-height: 100vh;
        padding: 60px 40px;
        color: #1f1f1f;
    }

    /* Search */
    .search-box {
        margin-top: 50px;
        display: flex;
        justify-content: center;
        margin-bottom: 50px;
    }

    .search-input {
        width: 100%;
        max-width: 450px;
        padding: 12px;
        font-size: 18px;
        border: 1px solid black;
        border-radius: 8px;
    }

    /* GRID CARD */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
    }

    /* Penyesuaian untuk kartu */
    .card {
        background: #ffffff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: 0.3s all ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        padding-top: 0;

        /* === MODIFIKASI UNTUK PERSEGI === */
        display: flex; /* Gunakan flexbox untuk menyusun item secara vertikal */
        flex-direction: column;

        /* Hapus properti tinggi tetap */
        height: auto;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    /* Gaya untuk Header/Judul Artikel */
    .card-header-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
        padding: 15px 18px 0;
    }

    /* Deskripsi Singkat */
    .card-desc {
        font-size: 14px;
        color: #555;
        line-height: 1.4;
        margin-bottom: 10px;
        padding: 0 18px;
    }

    /* === MODIFIKASI UTAMA UNTUK RASIO ASPEK (PERSEGI) === */
    .card-img-box {
        /* Hapus tinggi tetap (180px) */
        height: 0;

        /* Rasio Aspek 1:1 (Tinggi = Lebar) */
        /* Padding-bottom 100% dari lebar parent (kolom grid) */
        padding-bottom: 100%;
        position: relative;
        overflow: hidden;

        /* Tambahkan margin atas untuk memisahkan dari deskripsi */
        margin-top: auto;
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s all ease;

        /* Pastikan gambar mengisi kotak gambar 1:1 */
        position: absolute;
        top: 0;
        left: 0;
    }

    .card:hover .card-img {
        transform: scale(1.08);
    }

    /* Hapus/sesuaikan elemen yang tidak digunakan */
    .card-content {
        display: none; /* Menyembunyikan card-content jika tidak digunakan */
    }

    .card-title {
        display: none;
    }

    @media(max-width: 768px) {
        .card-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="page-bg">

    {{-- SEARCH --}}
    <div class="search-box">
        <form action="{{ route('alat_kopi.index') }}" method="GET">
            <input type="text" name="query" placeholder="Alat seduh"
                class="search-input"
                value="{{ request('query') }}">
        </form>
    </div>

    {{-- CARD GRID --}}
    <div class="card-grid">

        @forelse ($alatKopis as $alat)

            {{-- CARD dengan LINK ke halaman SHOW --}}
            <a href="{{ route('alat_kopi.show', $alat->id) }}" class="card">

                {{-- 1. Judul Artikel Diletakkan di Paling Atas --}}
                <div class="card-header-title">
                    Artikel - {{ $alat->nama }}
                </div>

                {{-- 2. Deskripsi Singkat Diletakkan di Bawah Judul --}}
                <div class="card-desc">{{ $alat->deskripsi_singkat }}</div>


                {{-- 3. Gambar Diletakkan di Bawah Deskripsi - Ini akan menjadi persegi --}}
                <div class="card-img-box">
                    <img src="{{ asset('storage/' . $alat->gambar) }}"
                         class="card-img"
                         alt="{{ $alat->nama }}">
                </div>

                {{-- Konten yang tidak lagi digunakan bisa disembunyikan/dihapus --}}
                <div class="card-content">
                    {{-- Kosong --}}
                </div>


            </a>

        @empty

            <p style="grid-column: span 3; text-align:center; padding: 20px; color:#666;">
                Belum ada alat kopi untuk ditampilkan.
            </p>

        @endforelse

    </div>
</div>

@endsection
