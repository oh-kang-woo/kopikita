@extends('layouts.app')

@section('content')

<!-- FONT IMPORT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #ede3cf;
        font-family: 'Poppins', sans-serif;
    }

    /* SEARCH PADA TENGAH */
    .search-center {
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 60px 0 35px;
    }

    .search-center input {
        width: 45%;
        padding: 14px 18px;
        border-radius: 14px;
        border: 2px solid #b9b09b;
        background: #fff;
        outline: none;
        font-size: 16px;
        transition: 0.25s ease;
    }

    .search-center input:focus {
        border-color: #8b7558;
        box-shadow: 0 0 10px rgba(139,117,88,0.25);
    }

    /* LAYOUT */
    .layout-container {
        display: grid;
        grid-template-columns: 38% 62%;
        align-items: flex-start;
        padding: 0 100px;
        gap: 40px;
    }

    /* GAMBAR KIRI */
    .left-img {
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top: 40px;
    }

    .left-img img {
        width: 80%;
        max-width: 400px;
    }

    /* LIST */
    .kedai-container {
        margin-top: 10px;
    }

    /* CARD KEDAI */
    .kedai-card {
        background: #fff;
        padding: 20px;
        border-radius: 18px;
        margin-bottom: 20px;
        width: 100%;
        border: 1px solid #dfd2bd;
        display: flex;
        gap: 18px;
        transition: .25s;
        box-shadow: 0px 3px 10px rgba(0,0,0,0.06);
    }

    .kedai-card:hover {
        transform: translateY(-3px);
        box-shadow: 0px 6px 14px rgba(0,0,0,0.12);
    }

    .kedai-card img {
        width: 120px;
        height: 90px;
        border-radius: 12px;
        object-fit: cover;
    }

    .kedai-info h2 {
        margin: 0 0 6px;
        font-family: Georgia, serif;
        font-size: 20px;
        color: #3b2f23;
    }

    .kedai-info p {
        margin: 4px 0;
        font-size: 14px;
        color: #4b4b4b;
    }

    /* RESPONSIVE */
    @media(max-width: 992px) {
        .layout-container {
            grid-template-columns: 1fr;
            padding: 0 30px;
        }

        .search-center input {
            width: 85%;
        }

        .kedai-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .kedai-card img {
            width: 90%;
            height: 180px;
        }
    }

</style>

<!-- SEARCH -->
<div class="search-center">
    <input type="text" placeholder="Tempat ngopi santai...">
</div>

<!-- CONTENT -->
<div class="layout-container">

    <!-- Gambar -->
    <div class="left-img">
        <img src="/images/kopi-magnifier.png" alt="">
    </div>

    <!-- daftar kedai -->
    <div class="kedai-container">

        @foreach($kedai as $k)
        <div class="kedai-card">
            
            <img src="/images/{{ $k['gambar'] }}" alt="">
            
            <div class="kedai-info">
                <h2>{{ $k['nama'] }}</h2>
                <p>📍 {{ $k['lokasi'] }} | ⭐ {{ $k['rating'] }}</p>
                <p>{{ $k['deskripsi'] }}</p>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
