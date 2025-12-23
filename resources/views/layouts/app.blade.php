{{-- ======================================== 
FILE: resources/views/layouts/app.blade.php 
FUNGSI: Template utama dengan Tailwind CSS
======================================== --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/svg+xml" href="https://imgs.search.brave.com/2ZRU9F1-vj1btuBjTl8oaG1Jf3ScJMiQntixr3XFoEE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzRmLzY3/L2ViLzRmNjdlYjM2/ZTMyNzM2YjlhZGFm/ZmUxMjdhNTkyZTQy/LmpwZw" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Toko Online') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js untuk interaktivitas -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false, userDropdownOpen: false }">
    <div id="app" class="flex-1 flex flex-col">
        @include('partials.navbar')
       <main class="flex-1">
    @yield('content')
        </main>
    </div>
    @include('partials.footer')
</body></html>