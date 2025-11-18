@extends('layouts.app')

@section('content')

<style>
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

    .card {
        background: #ffffff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: 0.3s all ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .card-img-box {
        height: 180px;
        overflow: hidden;
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s all ease;
    }

    .card:hover .card-img {
        transform: scale(1.08);
    }

    .card-content {
        padding: 18px;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .card-desc {
        font-size: 14px;
        color: #555;
        line-height: 1.4;
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

                <div class="card-img-box">
                    <img src="{{ asset('storage/' . $alat->gambar) }}"
                         class="card-img"
                         alt="{{ $alat->nama }}">
                </div>

                <div class="card-content">
                    <div class="card-title">Artikel - {{ $alat->nama }}</div>
                    <div class="card-desc">{{ $alat->deskripsi_singkat }}</div>

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
