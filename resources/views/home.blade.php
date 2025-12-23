{{-- ================================================
     FILE: resources/views/home.blade.php
     FUNGSI: Halaman utama website (Tailwind CSS)
     ================================================ --}}
@extends('layouts.app')
@section('title', 'Beranda')
@section('content')



{{-- ==================== HERO SECTION ==================== --}}
<section class="relative bg-gradient-to-br from-gray-900 via-purple-900 to-black text-white py-20 lg:py-28 overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-700 rounded-full filter blur-3xl"></div>
    </div>

    {{-- Grid Pattern Overlay --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Content --}}
            <div class="space-y-6 lg:space-y-8">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-purple-500/20 backdrop-blur-sm border border-purple-500/30 rounded-full px-4 py-2 text-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                    </span>
                    <span class="text-purple-200">Promo Spesial Hari Ini</span>
                </div>

                {{-- Heading --}}
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                    Belanja Online
                    <span class="block bg-gradient-to-r from-purple-400 via-pink-400 to-purple-600 bg-clip-text text-transparent">
                        Mudah & Terpercaya
                    </span>
                </h1>

                {{-- Description --}}
                <p class="text-lg lg:text-xl text-gray-300 leading-relaxed max-w-xl">
                    Temukan berbagai produk berkualitas dengan harga terbaik. 
                    <span class="text-purple-400 font-semibold">Gratis ongkir</span> untuk pembelian pertama!
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#" class="group relative inline-flex items-center justify-center gap-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span>Mulai Belanja</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    <a href="#" class="inline-flex items-center justify-center gap-3 bg-white/5 backdrop-blur-sm hover:bg-white/10 border border-white/10 hover:border-purple-500/50 font-semibold px-8 py-4 rounded-xl transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Lihat Demo</span>
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex flex-wrap gap-8 pt-8 border-t border-white/10">
                    <div>
                        <div class="text-3xl font-bold text-purple-400">50K+</div>
                        <div class="text-sm text-gray-400">Produk Tersedia</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-purple-400">100K+</div>
                        <div class="text-sm text-gray-400">Pelanggan Puas</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-purple-400">4.9/5</div>
                        <div class="text-sm text-gray-400">Rating Toko</div>
                    </div>
                </div>
            </div>

            {{-- Image/Visual --}}
            <div class="hidden lg:block relative">
                {{-- Decorative Elements --}}
                <div class="absolute -top-10 -right-10 w-72 h-72 bg-purple-600/20 rounded-full filter blur-3xl animate-pulse"></div>
                
                {{-- Main Image Container --}}
                <div class="relative">
                    {{-- Card Style Image --}}
                    <div class="relative bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-sm border border-purple-500/20 rounded-3xl p-8 shadow-2xl">
                        <img src="https://via.placeholder.com/500x500/8B5CF6/FFFFFF?text=Shopping" 
                             alt="Shopping" 
                             class="w-full h-auto rounded-2xl shadow-lg">
                        
                        {{-- Floating Card 1 --}}
                        <div class="absolute -top-6 -left-6 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl p-4 shadow-xl border border-purple-500/50 backdrop-blur-sm">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 rounded-full p-3">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-purple-200">Transaksi</div>
                                    <div class="font-bold">100% Aman</div>
                                </div>
                            </div>
                        </div>

                        {{-- Floating Card 2 --}}
                        <div class="absolute -bottom-6 -right-6 bg-gradient-to-br from-pink-600 to-purple-700 rounded-2xl p-4 shadow-xl border border-pink-500/50 backdrop-blur-sm">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 rounded-full p-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-purple-200">Pengiriman</div>
                                    <div class="font-bold">24 Jam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- ==================== KATEGORI ==================== --}}
<section class="py-20 bg-gradient-to-b from-gray-900 via-purple-900/50 to-gray-900 relative overflow-hidden">   
    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div>
    
    {{-- Background Decoration - Lebih Subtle --}}
    <div class="absolute top-20 left-20 w-72 h-72 bg-purple-500/10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-72 h-72 bg-purple-600/10 rounded-full filter blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-purple-500/20 backdrop-blur-sm border border-purple-500/30 text-purple-300 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                Jelajahi Kategori
            </div>
            
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-3">
                Kategori <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-purple-600 bg-clip-text text-transparent">Populer</span>
            </h2>
            
            <p class="text-gray-300 max-w-2xl mx-auto">
                Temukan produk favorit Anda dari berbagai kategori pilihan terbaik
            </p>
        </div>

        {{-- Categories Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
                   class="group relative h-full">

                    <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-6 text-center h-full flex flex-col justify-between
                                hover:bg-white/15 hover:border-purple-400/50 hover:-translate-y-2 hover:shadow-xl hover:shadow-purple-500/20 
                                transition-all duration-300">

                        {{-- Content --}}
                        <div class="relative z-10 flex flex-col items-center">
                            {{-- Image Container with Ring --}}
                            <div class="relative inline-block mb-4">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full opacity-0 group-hover:opacity-20 blur-lg transition-opacity duration-300"></div>
                                
                                <div class="relative w-20 h-20 rounded-full overflow-hidden ring-4 ring-white/20 group-hover:ring-purple-400/60 transition-all duration-300">
                                    <img src="{{ $category->image }}"
                                         alt="{{ $category->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>

                                {{-- Floating Badge --}}
                                <div class="absolute -top-1 -right-1 bg-gradient-to-br from-purple-500 to-purple-700 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center shadow-lg shadow-purple-500/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>

                            {{-- Category Name --}}
                            <h6 class="font-bold text-white mb-2 group-hover:text-purple-300 transition-colors line-clamp-2 min-h-[3.5rem] flex items-center">
                                {{ $category->name }}
                            </h6>

                            {{-- Product Count --}}
                            <p class="text-sm text-gray-300 flex items-center justify-center gap-1 group-hover:text-purple-200 transition-colors">
                                <svg class="w-3.5 h-3.5 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"></path>
                                </svg>
                                <span class="font-medium">{{ $category->active_products_count }}</span>
                                <span>produk</span>
                            </p>
                        </div>

                        {{-- Shine Effect --}}
                        <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none overflow-hidden">
                            <div class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12"></div>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-12">
            <a href="{{ route('catalog.index') }}" 
               class="group inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-105 transition-all duration-300">
                <span>Lihat Semua Kategori</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>





{{-- ==================== PRODUK UNGGULAN ==================== --}}
@foreach ($categories as $category)
<section class="py-20 bg-gradient-to-b from-gray-900 via-purple-950/30 to-gray-900 relative overflow-hidden border-t border-white/5">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div>
    
    {{-- Background Decoration --}}
    <div class="absolute top-10 right-10 w-64 h-64 bg-purple-500/10 rounded-full filter blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                    {{ $category->name }}
                </h2>
                <div class="h-1 w-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
            </div>
            
            <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
               class="group inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/15 border border-white/20 hover:border-purple-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105">
                <span>Lihat Semua</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach ($category->activeProducts as $product)
            <div class="group relative bg-white/10 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/20 hover:border-purple-400/50 hover:bg-white/15 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-purple-500/20">
                
                {{-- Image Container --}}
                <div class="relative overflow-hidden aspect-square bg-white/5">
                    <img
                        src="{{ $product->primaryImage?->url ?? 'https://via.placeholder.com/300' }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    {{-- Overlay Gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    {{-- Quick View Badge --}}
                    <div class="absolute top-3 right-3 bg-purple-600/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span>Quick View</span>
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="p-4">
                    {{-- Product Name --}}
                    <h5 class="font-bold text-white mb-2 line-clamp-2 min-h-[3rem] group-hover:text-purple-300 transition-colors">
                        {{ $product->name }}
                    </h5>

                    {{-- Price --}}
                    <div class="flex items-center gap-2 mb-4">
                        <p class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                            {{ $product->formatted_price }}
                        </p>
                    </div>

                    {{-- Button --}}
                    <a href="{{ route('catalog.show', $product->slug) }}"
                       class="block text-center bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 text-white font-semibold py-2.5 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/50 group-hover:scale-[1.02]">
                        Lihat Detail
                    </a>
                </div>

                {{-- Shine Effect --}}
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none overflow-hidden">
                    <div class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach





{{-- ==================== PROMO BANNER ==================== --}}
<section class="py-20 bg-gradient-to-b from-gray-900 via-purple-900/30 to-gray-900 relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div>
    
    {{-- Background Decoration --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500/10 rounded-full filter blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid md:grid-cols-2 gap-6">
            
            {{-- Flash Sale Card --}}
            <div class="group relative bg-gradient-to-br from-purple-600 via-purple-700 to-pink-600 rounded-2xl p-8 overflow-hidden border border-purple-400/30 hover:border-purple-300/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-purple-500/30">
                {{-- Animated Background --}}
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-400 rounded-full filter blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-pink-400 rounded-full filter blur-3xl animate-pulse delay-75"></div>
                </div>
                
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(255,255,255,0.1),transparent)]"></div>
                
                {{-- Content --}}
                <div class="relative z-10 flex flex-col justify-center h-full">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 bg-yellow-400 text-gray-900 px-3 py-1.5 rounded-full text-xs font-bold w-fit mb-4 animate-bounce">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span>HOT DEAL</span>
                    </div>
                    
                    <h3 class="text-3xl lg:text-4xl font-bold mb-3 text-white">
                        Flash Sale!
                    </h3>
                    
                    <p class="text-lg text-purple-100 mb-6">
                        Diskon hingga <span class="text-yellow-300 font-bold text-2xl">50%</span> untuk produk pilihan
                    </p>
                    
                    <a href="#"
                       class="group/btn inline-flex items-center gap-2 bg-white text-purple-700 font-bold px-6 py-3 rounded-xl w-fit hover:bg-yellow-400 hover:text-gray-900 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                        <span>Lihat Promo</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
                
                {{-- Decorative Elements --}}
                <div class="absolute top-4 right-4 text-white/10 group-hover:text-white/20 transition-colors">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                    </svg>
                </div>
            </div>

            {{-- Member Baru Card --}}
            <div class="group relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-2xl p-8 overflow-hidden border border-indigo-400/30 hover:border-indigo-300/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-indigo-500/30">
                {{-- Animated Background --}}
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 left-0 w-40 h-40 bg-cyan-400 rounded-full filter blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-pink-400 rounded-full filter blur-3xl animate-pulse delay-75"></div>
                </div>
                
                {{-- Pattern Overlay --}}
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(255,255,255,0.1),transparent)]"></div>
                
                {{-- Content --}}
                <div class="relative z-10 flex flex-col justify-center h-full">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 bg-cyan-400 text-gray-900 px-3 py-1.5 rounded-full text-xs font-bold w-fit mb-4">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        <span>NEW MEMBER</span>
                    </div>
                    
                    <h3 class="text-3xl lg:text-4xl font-bold mb-3 text-white">
                        Member Baru?
                    </h3>
                    
                    <p class="text-lg text-indigo-100 mb-6">
                        Dapatkan voucher <span class="text-cyan-300 font-bold text-2xl">Rp 50.000</span> untuk pembelian pertama
                    </p>
                    
                    <a href="#"
                       class="group/btn inline-flex items-center gap-2 bg-white text-indigo-700 font-bold px-6 py-3 rounded-xl w-fit hover:bg-cyan-400 hover:text-gray-900 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
                
                {{-- Decorative Elements --}}
                <div class="absolute bottom-4 right-4 text-white/10 group-hover:text-white/20 transition-colors">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</section>




{{-- ==================== PRODUK TERBARU (FUTURISTIC STYLE) ==================== --}}
<section class="py-20 bg-gradient-to-b from-gray-900 via-purple-950/30 to-gray-900 relative overflow-hidden border-t border-white/5">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div>
    
    {{-- Background Decoration --}}
    <div class="absolute top-10 left-10 w-64 h-64 bg-indigo-500/10 rounded-full filter blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                    Produk Terbaru
                </h2>
                <div class="h-1 w-20 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
            </div>
            
            <a href="{{ route('catalog.index') }}"
               class="group inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/15 border border-white/20 hover:border-indigo-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 hover:scale-105">
                <span>Lihat Semua Produk</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        @if ($latestProducts->count())
            {{-- Products Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach ($latestProducts as $product)
                <div class="group relative bg-white/10 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/20 hover:border-indigo-400/50 hover:bg-white/15 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-indigo-500/20">
                    
                    {{-- Image Container --}}
                    <div class="relative overflow-hidden aspect-square bg-white/5">
                        <img
                            src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        {{-- New Badge --}}
                        <div class="absolute top-3 left-3 bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                            Baru
                        </div>
                    </div>

                    {{-- Product Info --}}
                    <div class="p-4">
                        {{-- Product Name --}}
                        <h5 class="font-bold text-white mb-2 line-clamp-2 min-h-[3rem] group-hover:text-indigo-300 transition-colors">
                            {{ $product->name }}
                        </h5>

                        {{-- Price --}}
                        <div class="flex items-center gap-2 mb-4">
                            <p class="text-xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                                {{ $product->formatted_price }}
                            </p>
                        </div>

                        {{-- Button --}}
                        <a href="{{ route('catalog.show', $product->slug) }}"
                           class="block text-center bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 text-white font-semibold py-2.5 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/50 group-hover:scale-[1.02]">
                            Lihat Detail
                        </a>
                    </div>

                    {{-- Shine Effect --}}
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none overflow-hidden">
                        <div class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12"></div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            {{-- Empty state --}}
            <div class="py-20 text-center">
                <p class="text-gray-400 italic">Belum ada produk terbaru saat ini.</p>
            </div>
        @endif
    </div>
</section>


@endsection
