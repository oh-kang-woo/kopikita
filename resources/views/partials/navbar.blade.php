<head>
    <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar">
    <div class="logo">KopiKita</div>

    <div class="nav-links">

        <a href="{{route('dashboard')}}">Beranda</a>
        <a href="#">Event</a>

        <!-- 🔽 BAGIAN INI YANG DITAMBAHKAN -->
        <div class="dropdown">
            <a href="#" class="dropbtn">More ▾</a>

            <div class="dropdown-content">
                <a href="#">Alat Seduh</a>
                <a href="#">Jenis Kopi</a>
                <a href="#">Kedai Kopi</a>
                <a href="#">Forum</a>
            </div>
        </div>
        <!-- 🔽 SAMPAI SINI -->

        <a href="{{route('about')}}">Tentang Kami</a>
        <a href="{{route('home')}}" class="btn-login-nav">login</a>
    </div>
</nav>
