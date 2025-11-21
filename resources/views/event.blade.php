@extends('layouts.app')

@section('content')
{{-- Wrapper utama dengan Background Image --}}
<div class="main-bg">
    <div class="overlay">
        <div class="event-wrapper">

            <h2 class="event-title">EVENT KOMUNITAS</h2>

            {{-- Filter Buttons --}}
            <div class="event-filter">
                <a href="{{ route('event.index', ['filter' => 'offline']) }}"
                   class="filter-btn {{ $filter == 'offline' || $filter == null ? 'active' : '' }}">
                    Offline
                </a>

                <a href="{{ route('event.index', ['filter' => 'online']) }}"
                   class="filter-btn {{ $filter == 'online' ? 'active' : '' }}">
                    Online
                </a>
            </div>

            {{-- Event List --}}
            <div class="event-list">
                @foreach ($events as $event)
                    <div class="event-card">

                        {{-- Sisi Kiri: Icon + Judul + Tanggal Mulai --}}
                        <div class="card-left">
                            <div class="icon-box">
                                {{-- SVG Calendar Icon mirip desain --}}
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 2V6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 2V6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 10H21" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    {{-- Ikon jam kecil di pojok --}}
                                    <circle cx="16.5" cy="16.5" r="3.5" fill="white" stroke="#000" stroke-width="1.5"/>
                                    <path d="M16.5 15V16.5H17.5" stroke="#000" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <div class="event-details">
                                <h3>{{ $event->judul }}</h3>
                                <p class="date-primary">{{ date('d F Y', strtotime($event->tanggal)) }}</p>
                            </div>
                        </div>

                        {{-- Sisi Kanan: Tanggal Akhir (opsional) + Lokasi --}}
                        <div class="card-right">
                            {{-- Jika ada tanggal selesai, tampilkan. Jika tidak, kosongkan --}}
                            <p class="date-secondary">
                                {{ isset($event->tanggal_selesai) ? date('d F Y', strtotime($event->tanggal_selesai)) : '' }}
                            </p>
                            <p class="location">{{ $event->lokasi }}</p>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<style>
/* Reset & Font Dasar */
@import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Inter:wght@400;600&display=swap');

/* Background Container Full Screen */
.main-bg {
    /* Ganti URL ini dengan gambar background kopi/orang ngopi Anda */
   background-image: url('{{ asset('images/bg-events.jpg') }}');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    width: 100%;
    font-family: 'Inter', sans-serif;
}

/* Overlay Coklat Gelap Transparan */
.overlay {
    /* background: linear-gradient(to bottom, rgba(62, 44, 28, 0.85), rgba(62, 44, 28, 0.9)); */
    min-height: 100vh;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
}

.event-wrapper {
    width: 100%;
    max-width: 800px;
}

/* Judul Header */
.event-title {
    text-align: center;
    color: white;
    font-family: 'Merriweather', serif; /* Font Serif seperti di gambar */
    font-size: 36px;
    margin-bottom: 30px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* Filter Buttons */
.event-filter {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 40px;
}

.filter-btn {
    padding: 10px 30px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    font-family: 'Merriweather', serif;
    transition: all 0.3s ease;
}

/* Tombol Tidak Aktif (Krem) */
.filter-btn {
    background: #EDE6D6;
    color: #3E2C1C;
}

/* Tombol Aktif (Coklat Tua) */
.filter-btn.active {
    background: #3E2C1C;
    color: #EDE6D6;
    border: 1px solid #5c4531;
}

/* === PERUBAHAN DI SINI === */

/* Event List Container */
.event-list {
    /* Hitungan max-height:
      Tinggi 1 card = ~76px (padding 15*2 + konten ~46px)
      Margin bottom = 15px
      Tinggi 3 card = (76px * 3) + (15px * 2 margin) = 228 + 30 = 258px
      Kita bulatkan ke 260px
    */
    max-height: 260px; /* Menampilkan 3 item */
    overflow-y: auto;  /* Tambah scrollbar jika item lebih dari 3 */
    padding-right: 10px; /* Ruang untuk scrollbar */
}

/* Card Design */
.event-card {
    /* Efek Glassmorphism (Putih Transparan) - Dibuat lebih pekat */
    background: rgba(255, 255, 255, 0.8); /* Lebih pekat dari 0.65 */
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-radius: 12px;
    padding: 15px 25px;
    margin-bottom: 15px;

    display: flex;
    justify-content: space-between; /* Memisah kiri dan kanan */
    align-items: center;
    /* box-shadow dihapus agar lebih flat seperti gambar */
    transition: all 0.2s ease-in-out; /* Transisi untuk hover */
}

/* === EFEK HOVER BARU === */
.event-card:hover {
    background: rgba(255, 255, 255, 0.95); /* Lebih pekat/terang saat hover */
    transform: scale(1.01); /* Sedikit membesar */
    cursor: pointer; /* Menandakan bisa diklik */
}
/* === AKHIR EFEK HOVER === */

/* === AKHIR PERUBAHAN === */


/* Bagian Kiri Card */
.card-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.icon-box svg {
    display: block;
}

.event-details h3 {
    margin: 0;
    font-family: 'Merriweather', serif;
    font-size: 18px;
    color: #1a1a1a;
    font-weight: 700;
}

.event-details .date-primary {
    margin: 4px 0 0 0;
    font-size: 14px;
    font-weight: 600;
    color: #333;
}

/* Bagian Kanan Card */
.card-right {
    text-align: right;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-right .date-secondary {
    margin: 0;
    font-size: 13px;
    color: #444;
    margin-bottom: 4px;
}

.card-right .location {
    margin: 0;
    font-size: 13px;
    color: #222;
    font-weight: 500;
}

/* Custom Scrollbar Styling */
.event-list::-webkit-scrollbar {
    width: 6px;
}
.event-list::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.1);
    border-radius: 10px;
}
.event-list::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 10px;
}
.event-list::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.8);
}


/* Responsif untuk HP */
@media (max-width: 600px) {
    .event-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .card-right {
        text-align: left;
        padding-left: 55px; /* Menyesuaikan indentasi dengan teks judul */
    }
}
</style>
@endsection
