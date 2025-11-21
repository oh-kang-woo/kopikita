@extends('layouts.app')

@section('content')
{{-- Import Font Modern --}}
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Global Styles untuk Halaman Ini */
    body {
        background-color: #f8f9fa; /* Background halaman abu lembut */
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #334155;
    }

    .forum-container {
        max-width: 850px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* HEADER FORUM */
    .forum-header {
        margin-bottom: 25px;
    }

    .forum-title {
        font-size: 32px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .forum-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 14px;
        color: #64748b;
    }

    .meta-badge {
        background: #e2e8f0;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
        color: #475569;
    }

    /* KONTEN UTAMA */
    .forum-content-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 40px;
        border: 1px solid #f1f5f9;
    }

    .forum-text {
        font-size: 16px;
        line-height: 1.8;
        color: #334155;
        white-space: pre-line; /* Agar spasi & enter terbaca rapi */
    }

    /* BAGIAN KOMENTAR */
    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title span {
        background: #cbd5e1;
        color: #fff;
        font-size: 12px;
        padding: 2px 8px;
        border-radius: 6px;
    }

    .comment-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ITEM KOMENTAR */
    .comment-item {
        display: flex;
        gap: 15px;
        align-items: flex-start;
        animation: fadeIn 0.5s ease;
    }

    /* Avatar */
    .avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6); /* Gradient Ungu Modern */
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 18px;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3);
    }

    /* Avatar user sendiri (opsional beda warna) */
    .avatar.own-avatar {
        background: linear-gradient(135deg, #f97316, #fb923c); /* Orange Gradient */
        box-shadow: 0 4px 10px rgba(249, 115, 22, 0.3);
    }

    /* Bubble Komentar */
    .comment-box {
        background: #fff;
        padding: 15px 20px;
        border-radius: 0 16px 16px 16px; /* Sudut unik */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #f1f5f9;
        flex-grow: 1;
        position: relative;
        transition: transform 0.2s;
    }

    .comment-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.06);
    }

    /* Style Khusus Komentar Sendiri */
    .comment-item.is-own {
        flex-direction: row-reverse; /* Balik posisi avatar ke kanan */
    }

    .comment-item.is-own .comment-box {
        border-radius: 16px 0 16px 16px;
        background: #fffbf7; /* Sedikit warm */
        border: 1px solid #fed7aa; /* Border orange tipis */
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .comment-author {
        font-weight: 700;
        font-size: 15px;
        color: #0f172a;
    }

    .comment-date {
        font-size: 12px;
        color: #94a3b8;
    }

    .comment-body {
        font-size: 15px;
        color: #475569;
        line-height: 1.5;
    }

    /* FORM INPUT */
    .comment-form-card {
        margin-top: 40px;
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 -4px 20px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
    }

    .form-label {
        font-weight: 600;
        color: #334155;
        margin-bottom: 10px;
        display: block;
    }

    textarea.custom-input {
        width: 100%;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 15px;
        font-family: inherit;
        font-size: 15px;
        transition: all 0.3s;
        outline: none;
        background: #f8fafc;
    }

    textarea.custom-input:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .btn-submit {
        background: #0f172a; /* Dark slate */
        color: #fff;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        margin-top: 15px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-block;
    }

    .btn-submit:hover {
        background: #334155;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.3);
    }

    .login-prompt {
        text-align: center;
        padding: 20px;
        background: #f1f5f9;
        border-radius: 12px;
        color: #64748b;
    }

    .login-prompt a {
        color: #6366f1;
        font-weight: 700;
        text-decoration: none;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="forum-container">

    <div class="forum-header">
        <div class="mb-2">
            <a href="{{ url()->previous() }}" style="text-decoration: none; color: #64748b; font-size: 14px;">
                &larr; Kembali ke Forum
            </a>
        </div>
        <h1 class="forum-title">{{ $forum->judul }}</h1>
        <div class="forum-meta">
            {{-- Asumsi ada relasi user dan created_at di model Forum --}}
            <span class="meta-badge">Diskusi</span>
            <span>Oleh <strong>{{ $forum->user->name ?? 'Anonim' }}</strong></span>
            <span>&bull;</span>
            <span>{{ $forum->created_at->translatedFormat('d M Y') }}</span>
        </div>
    </div>

    <div class="forum-content-card">
        <div class="forum-text">
            {!! nl2br(e($forum->konten)) !!}
        </div>
    </div>

    <div class="comments-section">
        <h3 class="section-title">
            Diskusi <span>{{ $forum->comments->count() }}</span>
        </h3>

        <div class="comment-list">
            @forelse ($forum->comments as $comment)
                @php
                    $isOwn = auth()->check() && $comment->user_id == auth()->id();
                @endphp

                <div class="comment-item {{ $isOwn ? 'is-own' : '' }}">

                    <div class="avatar {{ $isOwn ? 'own-avatar' : '' }}">
                        {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="comment-box">
                        <div class="comment-header">
                            <span class="comment-author">
                                {{ $comment->user->name ?? 'User' }}
                                @if($isOwn) <small style="color: #f97316; margin-left:5px;">(Anda)</small> @endif
                            </span>
                            <span class="comment-date">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="comment-body">
                            {{ $comment->isi }}
                        </div>
                    </div>

                </div>
            @empty
                <div style="text-align: center; padding: 40px; color: #94a3b8;">
                    <p>Belum ada komentar. Jadilah yang pertama menanggapi!</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="comment-form-card">
        @auth
        <form action="{{ route('comment.store', $forum->id) }}" method="POST">
            @csrf
            <label class="form-label">Tanggapan Anda</label>
            <textarea name="isi" class="custom-input" rows="4" placeholder="Tuliskan pendapat Anda dengan sopan..." required></textarea>
            <div style="text-align: right;">
                <button type="submit" class="btn-submit">Kirim Komentar</button>
            </div>
        </form>
        @else
            <div class="login-prompt">
                Ingin bergabung dalam diskusi? <br>
                Silakan <a href="{{ route('login') }}">Masuk</a> atau <a href="{{ route('register') }}">Daftar</a>.
            </div>
        @endauth
    </div>

</div>
@endsection
