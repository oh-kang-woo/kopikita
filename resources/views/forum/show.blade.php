@extends('layouts.app')

@section('content')
<style>
    /* Container utama */
    .forum-container {
        max-width: 820px;
        margin: auto;
        padding: 10px;
    }

    /* Judul forum */
    .forum-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .forum-content {
        background: #fff;
        padding: 18px 22px;
        border-radius: 14px;
        box-shadow: 0 3px 7px rgba(0,0,0,0.1);
        margin-bottom: 25px;
        line-height: 1.6;
    }

    /* LIST KOMENTAR */
    .comment-wrapper {
        margin-bottom: 15px;
        display: flex;
        gap: 12px;
    }

    /* Avatar */
    .comment-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #c6a98f;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 17px;
        flex-shrink: 0;
    }

    /* Bubble Chat */
    .comment-bubble {
        background: #ffffff;
        padding: 12px 16px;
        border-radius: 14px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        position: relative;
        width: 100%;
    }

    /* Jika komentar milik user sendiri */
    .comment-own {
        background: #d7f3ff;
        border-left: 4px solid #3ea8ff;
    }

    .comment-name {
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 5px;
    }

    .comment-text {
        font-size: 14px;
        color: #333;
        margin-bottom: 0;
    }

    /* Form komentar */
    .comment-form {
        margin-top: 25px;
        background: #fff;
        padding: 15px 20px;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .comment-form textarea {
        border-radius: 10px;
        resize: none;
    }

    .btn-send {
        background: #613a23;
        border: none;
        padding: 8px 20px;
        color: #fff;
        border-radius: 8px;
        transition: 0.2s;
    }

    .btn-send:hover {
        background: #8b5a3c;
    }
</style>

<div class="forum-container">

    <!-- Judul Forum -->
    <h1 class="forum-title">{{ $forum->judul }}</h1>

    <!-- Isi Forum -->
    <div class="forum-content">
        {!! nl2br(e($forum->konten)) !!}
    </div>

    <h3 class="mt-4 mb-3">Komentar</h3>

    <!-- List Komentar -->
    @foreach ($forum->comments as $comment)
        @php
            $isOwn = auth()->check() && $comment->user_id == auth()->id();
        @endphp

        <div class="comment-wrapper">

            <!-- Avatar -->
            <div class="comment-avatar">
                {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
            </div>

            <!-- Bubble Chat -->
            <div class="comment-bubble {{ $isOwn ? 'comment-own' : '' }}">
                <div class="comment-name">
                    {{ $comment->user->name ?? 'User' }}
                </div>
                <p class="comment-text">
                    {{ $comment->isi }}
                </p>
            </div>

        </div>
    @endforeach

    <!-- Form Tambah Komentar -->
    @auth
    <form action="{{ route('comment.store', $forum->id) }}" method="POST" class="comment-form">
        @csrf

        <label class="fw-bold mb-2">Tulis Komentar Anda:</label>
        <textarea name="isi" class="form-control" rows="3" required></textarea>

        <button type="submit" class="btn-send mt-3">Kirim</button>
    </form>
    @else
        <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk menulis komentar.</p>
    @endauth

</div>
@endsection
    