{{-- ================================================
     FILE: resources/views/layouts/admin.blade.php
     FUNGSI: Master layout untuk semua halaman admin
     ================================================ --}}
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Admin Panel</title>

    {{-- Font: Plus Jakarta Sans (Modern & Clean) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS & Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-gradient {
            background: linear-gradient(180deg, #0F172A 0%, #1E293B 100%);
        }
    </style>

    @stack('styles')
</head>
<body class="h-full flex bg-slate-50 text-slate-900">

    {{-- ===============================================
         Sidebar
         =============================================== --}}
    <aside class="sidebar-gradient text-slate-300 w-64 min-h-screen flex flex-col shadow-2xl z-50">
        {{-- Brand --}}
        <div class="px-6 py-6 border-b border-slate-700/50">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 font-extrabold text-white text-xl tracking-tight">
                <div class="bg-indigo-500 p-2 rounded-lg shadow-lg shadow-indigo-500/30">
                    <i class="bi bi-cpu-fill text-white"></i>
                </div>
                CORE<span class="text-indigo-400">ADMIN</span>
            </a>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Menu Utama</div>

            @php
                $navs = [
                    ['route' => 'admin.dashboard', 'icon' => 'bi-grid-1x2', 'label' => 'Dashboard', 'pattern' => 'admin.dashboard'],
                    ['route' => 'admin.products.index', 'icon' => 'bi-box-seam', 'label' => 'Produk', 'pattern' => 'admin.products.*'],
                    ['route' => 'admin.categories.index', 'icon' => 'bi-folder2-open', 'label' => 'Kategori', 'pattern' => 'admin.categories.*'],
                    ['route' => 'admin.orders.index', 'icon' => 'bi-receipt', 'label' => 'Pesanan', 'pattern' => 'admin.orders.*'],
                ];
            @endphp

            @foreach($navs as $nav)
            <a href="{{ route($nav['route']) }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
               {{ request()->routeIs($nav['pattern']) 
                  ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20 font-semibold' 
                  : 'hover:bg-white/5 hover:text-white' }}">
                <i class="bi {{ $nav['icon'] }} text-lg {{ request()->routeIs($nav['pattern']) ? 'text-white' : 'text-slate-500 group-hover:text-indigo-400' }}"></i>
                <span class="text-sm">{{ $nav['label'] }}</span>
            </a>
            @endforeach
        </nav>

        {{-- User Info --}}
        <div class="p-4 border-t border-slate-700/50 bg-slate-900/50">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-white/5">
                <img src="{{ auth()->user()->avatar_url }}" class="w-10 h-10 rounded-lg object-cover ring-2 ring-slate-700">
                <div class="flex-1 min-w-0">
                    <div class="font-bold text-white text-sm truncate">{{ auth()->user()->name }}</div>
                    <div class="text-[10px] text-indigo-400 font-bold uppercase tracking-tighter">System Root</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- ===============================================
         Main Content
         =============================================== --}}
    <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
        {{-- Top Bar --}}
        <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 py-4 sticky top-0 z-40 flex justify-between items-center">
            <div>
                <h4 class="font-extrabold text-slate-800 text-lg tracking-tight">@yield('page-title', 'Dashboard Overview')</h4>
                <p class="text-xs text-slate-400 font-medium">Selamat datang kembali di pusat kendali sistem.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" 
                   class="hidden md:flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 hover:bg-slate-100 rounded-xl transition-all border border-transparent hover:border-slate-200">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Toko
                </a>
                
                <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-xl transition-all">
                        <i class="bi bi-power"></i> Keluar
                    </button>
                </form>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        <footer class="px-8 py-6 text-center">
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.3em]">
                &copy; {{ date('Y') }} Admin Console — Built with Precision.
            </p>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>