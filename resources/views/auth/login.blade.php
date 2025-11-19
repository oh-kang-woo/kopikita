@extends('layouts.app')

@section('content')

<!-- Tailwind CDN khusus halaman login -->
<script src="https://cdn.tailwindcss.com"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'cream-bg': '#fcfaf7',
                    'mocha-light': '#fff8f0',
                    'tan-dark': '#4a3b2c',
                    'coffee': '#6d4b2e'
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    }
</script>

<style>
    :root {
        --color-primary: #6d4b2e;
        --color-accent: #b08d6d;
    }

    .form-input:focus {
        box-shadow: 0 0 0 3px rgba(176, 141, 109, 0.4);
    }
</style>

<div class="bg-gradient-to-br from-cream-bg to-mocha-light min-h-[85vh] flex items-center justify-center p-4">

    <div class="w-full max-w-sm">

        <div class="bg-white/90 backdrop-blur-sm shadow-2xl rounded-3xl p-8 sm:p-10 border border-tan-dark/10 transition-all duration-500 hover:shadow-3xl hover:border-tan-dark/20">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-tan-dark tracking-wide mb-1">
                    Login Barista
                </h2>
                <p class="text-sm text-gray-500">Silakan masuk untuk melanjutkan.</p>
            </div>

            {{-- Error Message from Session --}}
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-tan-dark mb-2">Email</label>
                    <input type="email" name="email"
                           class="form-input w-full px-4 py-3 bg-white border-2 border-tan-dark/20 rounded-xl text-tan-dark placeholder-gray-400 focus:border-coffee focus:ring-coffee"
                           placeholder="Masukkan email..."
                           required>
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-tan-dark mb-2">Password</label>
                    <input type="password" name="password"
                           class="form-input w-full px-4 py-3 bg-white border-2 border-tan-dark/20 rounded-xl text-tan-dark placeholder-gray-400 focus:border-coffee focus:ring-coffee"
                           placeholder="Masukkan password..."
                           required>
                </div>

                {{-- Button --}}
                <button type="submit"
                        class="w-full py-3 font-bold text-lg text-white rounded-xl shadow-lg transition-all duration-300 ease-in-out bg-coffee hover:bg-amber-900 transform hover:-translate-y-0.5 active:translate-y-0 active:shadow-none">
                    Masuk
                </button>
            </form>

            <p class="text-center text-xs text-gray-500 mt-6">
                Lupa password? <a href="#" class="text-coffee hover:underline font-medium">Reset di sini</a>.
            </p>
        </div>
    </div>

</div>

@endsection
