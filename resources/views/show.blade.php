@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: serif;
    }

    .article-container {
        background: #EAE5D6;
        min-height: 100vh;
        padding: 60px 20px;
        color: #1f1f1f;
    }

    .back-link {
        font-size: 14px;
        text-decoration: underline;
        display: inline-block;
        margin-bottom: 25px;
        color: #333;
    }

    /* Judul */
    .article-title {
        text-align: center;
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 35px;
    }

    /* Gambar */
    .article-image-box {
        max-width: 900px;
        height: 420px;
        margin: 0 auto 40px auto;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .article-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Isi artikel */
    .article-content {
        max-width: 900px;
        margin: 0 auto;
        font-size: 19px;
        line-height: 1.7;
        color: #333;
        text-align: justify;
        background: white;
        padding: 30px 40px;
        border-radius: 14px;
        box-shadow: 0 2px 7px rgba(0,0,0,0.1);
    }

    @media(max-width: 768px) {
        .article-title {
            font-size: 28px;
        }

        .article-image-box {
            height: 260px;
        }

        .article-content {
            padding: 22px;
            font-size: 17px;
        }
    }
</style>


<div class="article-container">

    <a href="{{ route('alat') }}" class="back-link">
        ← Kembali
    </a>

    {{-- Judul Artikel --}}
    <h1 class="article-title">{{ $alat->nama }}</h1>

    {{-- Gambar Artikel --}}
    <div class="article-image-box">
        <img src="{{ asset('storage/' . $alat->gambar) }}" class="article-image">
    </div>

    {{-- Isi Artikel --}}
    <div class="article-content">
        {!! nl2br(e($alat->deskripsi_panjang)) !!}
    </div>

</div>

@endsection
