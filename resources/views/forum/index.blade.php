@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #EAE5D6;
        font-family: 'Poppins', sans-serif;
        color: #1b1b1b;
    }

    .forum-title {
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Container agar card berada di tengah */
    .forum-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
    }

    .forum-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;

        width: 680px;     /* FIXED WIDTH BIAR SAMA */
        height: 90px;     /* FIXED HEIGHT BIAR TINGGI SAMA */

        box-shadow: 0 3px 6px rgba(0,0,0,0.08);
        transition: transform .2s ease;
    }

    .forum-card:hover {
        transform: scale(1.02);
    }

    .forum-thumb {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        background-size: cover;
        background-position: center;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .forum-content {
        flex: 1;
        min-width: 0; /* Allow text truncation */
    }

    .forum-content h5 {
        margin: 0;
        font-weight: 600;
        font-size: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; /* biar judul panjang tidak merusak layout */
    }

    .forum-reply {
        color: #777;
        font-size: 13px;
        white-space: nowrap;
        margin-left: 10px;
    }

    @media (max-width: 600px) {
        .forum-card {
            width: 90%;      /* tetap kecil tapi responsif di hp */
            height: 85px;
        }
    }
</style>

<div class="container py-4">
    <h2 class="forum-title">Forum Diskusi</h2>

    <div class="forum-wrapper">
        @foreach ($forums as $forum)
            <a href="{{ route('forum.show', $forum->id) }}" style="text-decoration:none; color:inherit;">
                <div class="forum-card">
                    {{-- Thumbnail --}}
                    <div class="forum-thumb"
                        style="background-image: url('{{ $forum->thumbnail ? asset('storage/'.$forum->thumbnail) : asset('images/coffee.jpg') }}');">
                    </div>

                    {{-- Judul --}}
                    <div class="forum-content">
                        <h5>{{ $forum->judul }}</h5>
                    </div>

                    {{-- Balasan --}}
                    <div class="forum-reply">
                        {{ $forum->comments_count ?? 0 }} Balasan
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</div>
@endsection
