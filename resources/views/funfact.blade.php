@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5efdf;
        font-family: 'Poppins', sans-serif;
        color: #1b1b1b;
    }

    .funfact-section {
        padding: 60px 100px;
        position: relative;
        text-align: justify;
    }

    .funfact-section h1 {
        font-family: 'Comic Neue', cursive;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .funfact-section p {
        font-size: 35px;
        line-height: 1.7;
        margin-bottom: 1rem;
        margin: 40px;
    }

    .funfact-section strong {
        font-weight: 600;
    }

    /* Gambar kiri */
    .img-left {
        position: absolute;
        left: 40px;
        top: 50px;
        width: 120px;
        opacity: 0.9;
    }

    /* Gambar kanan */
    .img-right {
        position: absolute;
        right: 40px;
        bottom: 40px;
        width: 120px;
        opacity: 0.9;
    }

    @media (max-width: 992px) {
        .funfact-section {
            padding: 40px 40px;
        }

        .img-left, .img-right {
            display: none;
        }
    }
</style>

<section class="funfact-section">
    <img src="{{ asset('images/magnify.png') }}" alt="Magnify coffee bean" class="img-left">
    <h1>Funfact!!!</h1>
    <p><strong>Kopi adalah Komoditas Terbesar Kedua di Dunia</strong>
        Setelah minyak bumi, kopi adalah komoditas yang paling banyak diperdagangkan secara global.
        Ada lebih dari 25 juta petani kopi di seluruh dunia.
    </p>

    <p><strong>Kopi pertama</strong> kali ditemukan di Ethiopia pada abad ke-9 oleh penggembala kambing bernama Kaldi,
        yang melihat kambingnya menjadi aktif setelah memakan buah kopi. Dari situ, kopi menyebar ke Yaman,
        lalu ke Arab, Turki, Eropa, hingga akhirnya ke seluruh dunia. Kopi kemudian menjadi minuman populer
        karena efeknya yang dapat meningkatkan energi dan menjaga kewaspadaan. Hingga kini, kopi berkembang
        menjadi bagian penting dari budaya dan gaya hidup di berbagai negara di dunia.
    </p>

    <img src="{{ asset('images/coffee-cup.png') }}" alt="Coffee cup" class="img-right">
</section>
@endsection
