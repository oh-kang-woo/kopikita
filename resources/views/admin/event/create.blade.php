@extends('admin.layouts.app')

@section('content')

<style>
    .card-form {
        background-color: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }
    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
    }
    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f5f9;
    }
    .form-label-custom {
        font-weight: 600;
        color: #475569;
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }
    .form-control-custom {
        border: 2px solid #cbd5e1;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 15px;
        color: #334155;
        background-color: #f8fafc;
        transition: all 0.3s ease;
        width: 100%;
    }
    .form-control-custom:focus {
        background-color: #ffffff;
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        outline: none;
    }
    select.form-control-custom {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23475569' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }
</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="page-title">Manajemen Event</h3>
            <p class="text-muted mb-0" style="font-size: 14px;">Buat event baru untuk ditampilkan kepada pengguna.</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn-action btn-cancel">
            &larr; Kembali
        </a>
    </div>

    <div class="card-form p-4 p-md-5">
        <h4 class="form-section-title">Formulir Event Baru</h4>

        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="form-label-custom">Judul Event</label>
                <input type="text" name="judul" class="form-control-custom" required>
            </div>

            {{-- Tanggal Mulai & Tanggal Selesai --}}
            <div class="form-grid mb-4">
                <div>
                    <label class="form-label-custom">Tanggal Mulai</label>
                    <input type="date" name="tanggal" class="form-control-custom" required>
                </div>

                <div>
                    <label class="form-label-custom">Tanggal Selesai (Opsional)</label>
                    <input type="date" name="tanggal_selesai" class="form-control-custom">
                </div>
            </div>

            {{-- Tipe --}}
            <div class="mb-4">
                <label class="form-label-custom">Kategori Event</label>
                <select name="tipe" class="form-control-custom" required>
                    <option value="" disabled selected>Pilih Kategori...</option>
                    <option value="online">🌐 Online</option>
                    <option value="offline">🏢 Offline</option>
                </select>
            </div>

            {{-- Lokasi --}}
            <div class="mb-4">
                <label class="form-label-custom">Platform / Lokasi</label>
                <input type="text" name="lokasi" class="form-control-custom" required>
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="form-label-custom">Status Event</label>
                <select name="status" class="form-control-custom" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            {{-- Gambar --}}
            <div class="mb-5">
                <label class="form-label-custom">Poster Event (Opsional)</label>
                <input type="file" name="gambar" class="form-control-custom" style="padding: 10px;">
            </div>

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn-action btn-cancel">Reset</button>
                <button type="submit" class="btn-action btn-save">Simpan Event</button>
            </div>

        </form>
    </div>
</div>

@endsection
