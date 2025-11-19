@extends('admin.layouts.app')

@section('content')

<style>
    body {
        background-color: #f5efdf;
        font-family: 'Poppins', sans-serif;
    }

    .admin-container {
        max-width: 650px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
    }

    .admin-title {
        font-weight: 700;
        font-size: 26px;
        margin-bottom: 20px;
        text-align: center;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #c9c2b8;
        padding: 12px;
        font-size: 15px;
    }

    .form-control:focus {
        border-color: #7b5e47;
        box-shadow: 0 0 5px rgba(123, 94, 71, 0.4);
    }

    .btn-submit {
        background: #7b5e47;
        border: none;
        padding: 12px 20px;
        margin-top: 10px;
        width: 100%;
        font-weight: 600;
        border-radius: 10px;
        color: white;
        transition: 0.2s ease;
    }

    .btn-submit:hover {
        background: #604837;
        transform: scale(1.02);
    }

    .preview-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: none;
    }
</style>

<div class="admin-container">
    <h2 class="admin-title">Tambah Forum Baru</h2>

    <form action="{{ route('admin.forum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul Forum --}}
        <div class="mb-3">
            <label>Judul Forum:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul forum..." required>
        </div>

        {{-- Upload Thumbnail --}}
        <div class="mb-3">
            <label>Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnailInput" class="form-control" accept="image/*">

            {{-- Preview Image --}}
            <img id="previewImage" class="preview-img">
        </div>

        <button class="btn-submit">Simpan Forum</button>
    </form>
</div>

<script>
document.getElementById('thumbnailInput').addEventListener('change', function(event) {
    let preview = document.getElementById('previewImage');
    preview.style.display = "block";
    preview.src = URL.createObjectURL(event.target.files[0]);
});
</script>

@endsection
