@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-tan-dark">
    Selamat Datang, {{ Auth::user()->name }}!
</h1>

<div class="mt-6 bg-white p-6 rounded-xl shadow-md border border-tan-dark/10">
    <p class="text-tan-dark/80">
        Ini adalah area konten utama Anda.
    </p>
</div>

@endsection
