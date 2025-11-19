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
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 10px;
        display: block;
        border: 2px solid #ddd;
    }
</style>

<div class="admin-container">
    <h2 class="admin-title">Edit Forum</h2>

    <form action="{{ route('admin.forum.update', $forum->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label>Judul Forum:</label>
            <input type="text" name="judul" class="form-control" value="{{ $forum->judul }}" required>
        </div>

        {{-- Thumbnail Lama --}}
        <div class="mb-3">
            <label>Thumbnail Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $forum->thumbnail) }}" class="preview-img">
        </div>

        {{-- Upload Thumbnail Baru --}}
        <div class="mb-3">
            <label>Ganti Thumbnail (opsional):</label>
            <input type="file" name="thumbnail" id="thumbnailInput" class="form-control" accept="image/*">

            <img id="previewImage" class="preview-img" style="display:none;">
        </div>

        <button class="btn-submit">Update Forum</button>
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
