<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<nav class="navbar">
    <div class="logo">KopiKita</div>

    <div class="nav-links">

        <a href="{{ route('dashboard') }}">Beranda</a>
        <a href="{{ route('event.index') }}">Event</a>

        <!-- Dropdown More -->
        <div class="dropdown">
            <a href="#" class="dropbtn">More ▾</a>

            <div class="dropdown-content">

                <a href="{{ route('alat') }}">Alat Seduh</a>

                <a href="{{ route('forum.index') }}">Jenis Kopi</a>

                <!-- ✔ LINK SUDAH BENAR -->
                <a href="{{ route('kedai.kopi') }}">Kedai Kopi</a>

                <a href="{{ route('forum.index') }}">Forum</a>

            </div>
        </div>
        <!-- End Dropdown -->

        <a href="{{ route('about') }}">Tentang Kami</a>
        <a href="{{ route('login') }}" class="btn-login-nav">Login</a>

    </div>
</nav>
