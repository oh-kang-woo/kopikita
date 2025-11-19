@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5efdf;
        font-family: 'Poppins', sans-serif;
        color: #1b1b1b;
    }

    .forum-title {
        font-weight: 700;
        text-align: center;
        margin-bottom: 40px;
    }

    .forum-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        transition: transform .2s ease;
    }

    .forum-card:hover {
        transform: scale(1.02);
    }

    .forum-thumb {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        background-size: cover;
        background-position: center;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .forum-content {
        flex: 1;
    }

    .forum-content h5 {
        margin: 0;
        font-weight: 600;
        font-size: 18px;
    }

    .forum-reply {
        color: #777;
        font-size: 14px;
        white-space: nowrap;
    }
</style>

<div class="container py-4">
    <h2 class="forum-title">Forum Diskusi</h2>

    @foreach ($forums as $forum)
        <a href="{{ route('forum.show', $forum->id) }}" style="text-decoration:none; color:inherit;">
            <div class="forum-card">
                {{-- Thumbnail Kiri --}}
                <div class="forum-thumb"
                    style="background-image: url('{{ $forum->thumbnail ? asset('storage/' . $forum->thumbnail) : asset('images/coffee.jpg') }}');">
                </div>

                {{-- Bagian Tengah --}}
                <div class="forum-content">
                    <h5>{{ $forum->judul }}</h5>
                </div>

                {{-- Jumlah Balasan --}}
                <div class="forum-reply">
                    {{ $forum->comments_count ?? 0 }} Balasan
                </div>
            </div>
        </a>
    @endforeach

</div>
@endsection
