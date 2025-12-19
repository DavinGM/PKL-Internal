{{-- ================================================
     FILE: resources/views/layouts/admin.blade.php
     FUNGSI: Master layout untuk semua halaman admin
     ================================================ --}}
<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Admin Panel</title>
    {{-- Tailwind CSS & Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="h-full flex">










    {{-- ===============================================
         Sidebar
         =============================================== --}}
    <aside class="bg-gradient-to-b from-blue-900 to-blue-800 text-white w-64 min-h-screen flex flex-col">
        {{-- Brand --}}
        <div class="px-6 py-4 border-b border-blue-700">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-bold text-lg">
                <i class="bi bi-shop fs-4"></i>
                Panel Admin
            </a>
        </div>







        {{-- Navigation --}}
      <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
    {{-- Dashboard --}}
    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-2 px-4 py-2 rounded hover:bg-white/10 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 font-semibold' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    {{-- Produk --}}
    <a href="{{ route('admin.products.index') }}"
       class="flex items-center gap-2 px-4 py-2 rounded hover:bg-white/10 {{ request()->routeIs('admin.products.*') ? 'bg-white/20 font-semibold' : '' }}">
        <i class="bi bi-box-seam"></i> Produk
    </a>

    {{-- Kategori --}}
    <a href="{{ route('admin.categories.index') }}"
       class="flex items-center gap-2 px-4 py-2 rounded hover:bg-white/10 {{ request()->routeIs('admin.categories.*') ? 'bg-white/20 font-semibold' : '' }}">
        <i class="bi bi-folder"></i> Kategori
    </a>

    {{-- Orders --}}
    <a href="{{ route('admin.orders.index') }}"
       class="flex items-center gap-2 px-4 py-2 rounded hover:bg-white/10 {{ request()->routeIs('admin.orders.*') ? 'bg-white/20 font-semibold' : '' }}">
        <i class="bi bi-bag"></i> Pesanan
    </a>
</nav>









        {{-- User Info --}}
        <div class="px-6 py-4 border-t border-blue-700 flex items-center gap-3">
            <img src="{{ auth()->user()->avatar_url }}" class="w-10 h-10 rounded-full object-cover">
            <div class="flex-1">
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-sm text-blue-200">Administrator</div>
            </div>
        </div>
    </aside>










    {{-- ===============================================
         Main Content
         =============================================== --}}
    <div class="flex-1 flex flex-col min-h-screen">
        {{-- Top Bar --}}
        <header class="bg-white shadow-sm px-6 py-3 flex justify-between items-center">
            <h4 class="font-semibold text-lg">@yield('page-title', 'Dashboard')</h4>
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary btn-sm flex items-center gap-1">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Toko
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-red btn-sm flex items-center gap-1">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </header>


        {{-- Page Content --}}
        <main class="flex-1 p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
