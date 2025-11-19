@extends('admin.layouts.app')

@section('content')

<style>
    body {
        background-color: #f5efdf;
        font-family: 'Poppins', sans-serif;
    }

    .admin-container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
    }

    .admin-title {
        font-weight: 700;
        font-size: 26px;
        margin-bottom: 25px;
        text-align: center;
    }

    .forum-row {
        display: flex;
        align-items: center;
        padding: 14px 16px;
        background: #faf7f3;
        border-radius: 12px;
        margin-bottom: 14px;
        transition: 0.2s ease;
    }

    .forum-row:hover {
        transform: scale(1.02);
        background: #f2ebe1;
    }

    .thumbnail {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 18px;
    }

    .forum-title-text {
        flex: 1;
        font-size: 17px;
        font-weight: 600;
    }

    .actions button,
    .actions form {
        display: inline-block;
    }

    .btn-edit {
        background: #5a7fc8;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #4a6bb0;
    }

    .btn-delete {
        background: #d9534f;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #b94440;
    }

    .btn-add {
        background: #7b5e47;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 600;
        margin-bottom: 20px;
        transition: .2s ease;
    }

    .btn-add:hover {
        background: #604837;
        transform: scale(1.03);
    }
</style>


<div class="admin-container">
    <h2 class="admin-title">Kelola Forum</h2>

    <a href="{{ route('admin.forum.create') }}" class="btn-add">+ Tambah Forum</a>

    @foreach ($forums as $forum)
        <div class="forum-row">

            {{-- Thumbnail --}}
            <img src="{{ $forum->thumbnail ? asset('storage/' . $forum->thumbnail) : asset('images/coffee.jpg') }}"
                 class="thumbnail">

            {{-- Judul --}}
            <div class="forum-title-text">
                {{ $forum->judul }}
            </div>

            {{-- Action Buttons --}}
            <div class="actions">

                <a href="{{ route('admin.forum.edit', $forum->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('admin.forum.delete', $forum->id) }}" method="POST" onsubmit="return confirm('Hapus forum ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">Hapus</button>
                </form>

            </div>
        </div>
    @endforeach
</div>

@endsection
