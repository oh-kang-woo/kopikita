<head>
    <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar">
    <div class="logo">KopiKita</div>

    <div class="nav-links">

        <a href="{{route('dashboard')}}">Beranda</a>
        <a href="{{route('event.index')}}">Event</a>

        <!-- 🔽 BAGIAN INI YANG DITAMBAHKAN -->
        <div class="dropdown">
            <a href="#" class="dropbtn">More ▾</a>

            <div class="dropdown-content">
                <a href="{{route('alat')}}">Alat Seduh</a>
                <a href="{{route('forum.index')}}">Jenis Kopi</a>
                <a href="#">Kedai Kopi</a>
            <a href="#">Forum</a>
            </div>
        </div>
        <!-- 🔽 SAMPAI SINI -->

        <a href="{{route('about')}}">Tentang Kami</a>
        <a href="{{route('login')}}" class="btn-login-nav">login</a>
    </div>
</nav>
