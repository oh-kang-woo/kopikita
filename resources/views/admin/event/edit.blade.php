@extends('admin.layouts.app')

@section('content')

<style>
    .card-form {
        background-color: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }
    .page-title { font-size: 24px; font-weight: 700; color: #1e293b; }
    .form-section-title { font-size: 18px; font-weight: 600; color: #334155; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #f1f5f9; }
    .form-label-custom { font-weight: 600; color: #475569; font-size: 14px; margin-bottom: 8px; display: block; }
    .form-control-custom {
        border: 2px solid #cbd5e1; border-radius: 10px; padding: 12px 15px;
        font-size: 15px; color: #334155; background-color: #f8fafc;
        transition: all 0.3s ease; width: 100%;
    }
    .form-control-custom:focus {
        background-color: #ffffff; border-color: #6366f1;
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
    .btn-action { padding: 12px 30px; border-radius: 10px; font-weight: 600; font-size: 15px; border: none; cursor: pointer; transition: 0.2s; }
    .btn-save { background-color: #4f46e5; color: #fff; }
    .btn-save:hover { background-color: #4338ca; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3); }
    .btn-cancel { background-color: #fff; color: #64748b; border: 1px solid #cbd5e1; margin-right: 10px; text-decoration: none; }
    .btn-cancel:hover { background-color: #f1f5f9; color: #0f172a; }
    .current-poster { width: 120px; height: 120px; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 10px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    @media (max-width: 768px) { .form-grid { grid-template-columns: 1fr; } }
</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="page-title">Edit Event</h3>
            <p class="text-muted mb-0" style="font-size: 14px;">Perbarui informasi event <strong>"{{ $event->judul }}"</strong></p>
        </div>
        <a href="{{ route('admin.event.index') }}" class="btn-action btn-cancel">&larr; Kembali</a>
    </div>

    <div class="card-form p-4 p-md-5">
        <h4 class="form-section-title">Formulir Perubahan Data</h4>

        <form action="{{ route('admin.event.edit', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <label class="form-label-custom">Judul Event</label>
                <input type="text" name="judul" value="{{ old('judul', $event->judul) }}" class="form-control-custom" required>
            </div>

            {{-- Tanggal Mulai & Tanggal Selesai --}}
            <div class="form-grid mb-4">
                <div>
                    <label class="form-label-custom">Tanggal Mulai</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $event->tanggal) }}" class="form-control-custom" required>
                </div>

                <div>
                    <label class="form-label-custom">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}" class="form-control-custom" required>
                </div>
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label class="form-label-custom">Kategori</label>
                <select name="kategori" class="form-control-custom" required>
                    <option value="online" {{ old('kategori', $event->kategori) == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ old('kategori', $event->kategori) == 'offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>

            {{-- Lokasi --}}
            <div class="mb-4">
                <label class="form-label-custom">Platform / Lokasi</label>
                <input type="text" name="platform" value="{{ old('platform', $event->platform) }}" class="form-control-custom" required>
            </div>

            {{-- Poster --}}
            <div class="mb-5 p-3" style="background: #f8fafc; border-radius: 12px; border: 1px dashed #cbd5e1;">
                <label class="form-label-custom mb-3">Poster Event</label>

                <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
                    @if($event->gambar)
                        <div class="text-center">
                            <span class="d-block text-muted" style="font-size: 12px;">Poster Saat Ini:</span>
                            <img src="{{ asset('storage/' . $event->gambar) }}" class="current-poster">
                        </div>
                    @endif

                    <div style="flex-grow: 1;">
                        <label class="text-muted mb-1" style="font-size: 13px;">Upload poster baru jika ingin mengganti:</label>
                        <input type="file" name="gambar" class="form-control-custom" style="padding: 10px;">
                        <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengubah poster.</small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn-action btn-save">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</div>
@endsection
