{{-- ======================================== FILE:
resources/views/layouts/app.blade.php FUNGSI: Template utama yang digunakan
semua halaman ======================================== --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  {{-- ↑ str_replace mengganti underscore dengan dash Contoh: en_US menjadi
  en-US --}}

  <head>
    <meta charset="utf-8" />
    {{-- ↑ Encoding karakter UTF-8 untuk mendukung karakter Indonesia --}}

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- ↑ Membuat halaman responsive di semua ukuran layar --}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- ↑ CSRF Token untuk keamanan form Mencegah serangan Cross-Site Request
    Forgery --}}

    <title>{{ config('app.name', 'Toko Online') }}</title>
    {{-- ↑ Mengambil nama aplikasi dari config/app.php Jika tidak ada, gunakan
    default 'Toko Online' --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    {{-- ↑ Load font Nunito dari Bunny Fonts (alternatif Google Fonts) --}}

    @vite('resources/css/app.css')
    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) {{-- ↑ Load file
    CSS dan JS yang sudah di-compile oleh Vite - app.scss berisi Bootstrap dan
    custom styles - app.js berisi Bootstrap JS dan custom scripts --}}
  </head>
  <style>

    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Modern Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.12);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        
        .sidebar-brand {
            padding: 28px 24px;
            font-size: 22px;
            font-weight: 700;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .sidebar-brand i {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 10px;
            margin-right: 12px;
            font-size: 18px;
        }
        
        .sidebar .nav {
            padding: 16px 12px;
        }
        
        .sidebar .nav-item {
            margin-bottom: 4px;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 14px 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar .nav-link i {
            font-size: 18px;
            width: 24px;
            margin-right: 12px;
            transition: transform 0.3s ease;
        }
        
        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(59, 130, 246, 0.12);
            transform: translateX(4px);
        }
        
        .sidebar .nav-link:hover i {
            transform: scale(1.1);
        }
        
        .sidebar .nav-link.active {
            color: white;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.2) 100%);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        }
        
        .sidebar .nav-link.active::before {
            transform: scaleY(1);
        }
        
        .sidebar .nav-link.active i {
            color: #3b82f6;
        }
        
        /* Overlay untuk mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }
        
        .main-content {
            margin-left: 280px;
            padding: 20px;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .navbar {
            margin-left: 280px;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card {
            border-radius: 10px;
            border: none;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .table-actions button {
            padding: 4px 8px;
            font-size: 12px;
        }
        
        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
        }
        
        /* Responsive Mobile */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content, .navbar {
                margin-left: 0;
            }
            
            .navbar .container-fluid {
                padding-left: 8px;
            }
        }
        
        /* Animasi untuk menu toggle */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }
        
        .sidebar.show {
            animation: slideIn 0.3s ease;
        }
    </style>



  <body>
    <div id="app">
      {{-- ================================================ NAVBAR (Menu
      Navigasi Atas) ================================================ --}}
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        {{-- ↑ navbar-expand-md = hamburger menu di layar kecil navbar-light =
        warna teks gelap bg-white = background putih shadow-sm = bayangan halus
        --}}

        <div class="container">
          {{-- Logo dan Nama Toko --}}
          <a class="navbar-brand" href="{{ url('/') }}">
            🛒 {{ config('app.name', 'Toko Online') }}
          </a>

          {{-- Tombol Hamburger (untuk mobile) --}}
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar (Kosong untuk sekarang) -->
            <ul class="navbar-nav me-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
              {{-- ================================================ CEK STATUS
              LOGIN ================================================ @guest =
              user BELUM login @else = user SUDAH login
              ================================================ --}} @guest {{--
              TAMPILAN UNTUK GUEST (Belum Login) --}} @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"> Login </a>
              </li>
              @endif @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                  Register
                </a>
              </li>
              @endif @else {{-- TAMPILAN UNTUK USER YANG SUDAH LOGIN --}}

              <li class="nav-item dropdown">
                <a
                  id="navbarDropdown"
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                >
                  {{ Auth::user()->name }} {{-- ↑ Tampilkan nama user yang login
                  --}}
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                  {{-- Tombol Logout --}}
                  <a
                    class="dropdown-item"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                  >
                    Logout
                  </a>
                  {{-- ↑ onclick: Mencegah link biasa, lalu submit form logout
                  --}} {{-- Form Logout (tersembunyi) --}}
                  <form
                    id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-none"
                  >
                    @csrf {{-- ↑ WAJIB ada @csrf untuk POST request --}}
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>

      {{-- ================================================ MAIN CONTENT
      ================================================ --}}
      <main class="py-4">
        @yield('content') {{-- ↑ Di sinilah konten dari setiap halaman akan
        ditampilkan Setiap halaman menggunakan @section('content') --}}
      </main>
    </div>
  </body>
</html>