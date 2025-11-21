@extends('admin.layouts.app')

@section('content')
{{-- Custom CSS untuk Halaman Index --}}
<style>
    /* Container & Card */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 800;
        color: #1e293b;
    }

    .card-table {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        overflow: hidden; /* Agar sudut tabel tdk lancip */
    }

    /* Table Styling */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table thead {
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
    }

    .custom-table th {
        text-align: left;
        padding: 18px 24px;
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .custom-table td {
        padding: 20px 24px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
        font-size: 15px;
    }

    .custom-table tbody tr:hover {
        background-color: #fdfdfd;
    }

    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Judul Event dipertegas */
    .event-title {
        font-weight: 600;
        color: #0f172a;
    }

    /* Badges untuk Kategori */
    .badge-category {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-online {
        background-color: #dcfce7;
        color: #166534; /* Hijau */
    }

    .badge-offline {
        background-color: #f3e8ff;
        color: #6b21a8; /* Ungu */
    }

    /* Tombol Tambah */
    .btn-add {
        background-color: #0f172a;
        color: #fff;
        padding: 10px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.2s;
        border: none;
    }

    .btn-add:hover {
        background-color: #334155;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.2);
    }

    /* Tombol Aksi (Edit/Delete) */
    .action-group {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid transparent;
        background: transparent;
        transition: 0.2s;
        cursor: pointer;
    }

    .btn-edit {
        color: #d97706; /* Amber */
        background: #fffbeb;
    }
    .btn-edit:hover {
        border-color: #d97706;
    }

    .btn-delete {
        color: #ef4444; /* Red */
        background: #fef2f2;
    }
    .btn-delete:hover {
        border-color: #ef4444;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    .empty-icon {
        font-size: 40px;
        color: #cbd5e1;
        margin-bottom: 15px;
    }
</style>

<div class="container py-5">

    {{-- Header: Judul & Tombol Tambah --}}
    <div class="page-header">
        <div>
            <h3 class="page-title">Manajemen Event</h3>
            <p class="text-muted mb-0" style="font-size: 14px;">Kelola daftar event yang akan ditampilkan.</p>
        </div>
        <a href="{{ route('admin.event.create') }}" class="btn-add">
            <span>+</span> Tambah Event Baru
        </a>
    </div>

    {{-- Table Container --}}
    <div class="card-table">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th width="35%">Detail Event</th>
                        <th width="20%">Kategori</th>
                        <th width="25%">Platform / Lokasi</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            {{-- Kolom 1: Judul & Tanggal digabung agar rapi --}}
                            <td>
                                <div class="event-title">{{ $event->judul }}</div>
                                <div class="text-muted" style="font-size: 13px; margin-top: 4px;">
                                    📅 {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}
                                </div>
                            </td>

                            {{-- Kolom 2: Badge Kategori --}}
                            <td>
                                @if(strtolower($event->kategori) == 'online')
                                    <span class="badge-category badge-online">🌐 Online</span>
                                @else
                                    <span class="badge-category badge-offline">🏢 Offline</span>
                                @endif
                            </td>

                            {{-- Kolom 3: Platform --}}
                            <td>
                                <span style="color: #475569; font-weight:500;">{{ $event->platform }}</span>
                            </td>

                            {{-- Kolom 4: Aksi --}}
                            <td>
                                <div class="action-group">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn-icon btn-edit" title="Edit">
                                        {{-- Icon Pencil SVG --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')" class="btn-icon btn-delete" title="Hapus">
                                            {{-- Icon Trash SVG --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        {{-- Tampilan jika data kosong --}}
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <div class="empty-icon">📂</div>
                                    <h5 style="font-weight: 600; color: #334155;">Belum ada event</h5>
                                    <p class="text-muted">Silakan tambahkan event baru untuk memulai.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
