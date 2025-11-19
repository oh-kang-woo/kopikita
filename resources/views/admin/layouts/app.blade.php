<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --color-primary: #6d4b2e;
            --color-accent: #b08d6d;
            --color-cream-bg: #fcfaf7;
            --color-tan-dark: #4a3b2c;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cream-bg': 'var(--color-cream-bg)',
                        'tan-dark': 'var(--color-tan-dark)',
                        'coffee-dark': 'var(--color-primary)',
                        'mocha-light': 'var(--color-accent)',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-cream-bg">

    {{-- 🔥 NAVBAR ADMIN DIPANGGIL DI SINI --}}
    @include('admin.layouts.navbar')

    {{-- 🔥 CONTENT --}}
    <main class="p-8">
        @yield('content')
    </main>

</body>
</html>
