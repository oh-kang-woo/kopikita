@extends('layouts.app')

@section('content')
<style>
    /* === Hero Section === */
    .hero {
        position: relative;
        background: url('{{ asset("images/undefined (3).jpeg") }}') center/cover no-repeat;
        height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
    }

    .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-family: 'Merriweather', serif;
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .hero p {
        font-size: 1.4rem;
        font-weight: 400;
        margin-bottom: 1.5rem;
    }

    .hero .btn {
        background-color: #5b3a0d;
        border: none;
        color: #fff;
        font-weight: 500;
        padding: 0.6rem 1.4rem;
        border-radius: 0.5rem;
        transition: 0.3s ease;
    }

    .hero .btn:hover {
        background-color: #704c1a;
    }

    /* Responsif (biar rapi di HP) */
    @media (max-width: 768px) {
        .hero {
            height: 75vh;
        }

        .hero h1 {
            font-size: 2.6rem;
        }

        .hero p {
            font-size: 1.1rem;
        }
    }
</style>

<section class="hero">
    <div class="hero-content">
        <h1>KopiKita</h1>
        <p>pecinta kopi lokal berkumpul</p>
        <a href="{{ route('funfact') }}" class="btn">Funfact kopi nih!!</a>
    </div>
</section>
@endsection
