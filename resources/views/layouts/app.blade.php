{{-- ======================================== 
FILE: resources/views/layouts/app.blade.php 
FUNGSI: Template utama dengan Tailwind CSS
======================================== --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
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
        @include('partials.flash-messages')

        <main class="flex-1 py-6">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
</body></html>