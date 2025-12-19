@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="min-h-screen bg-gray-900 relative overflow-hidden">
    {{-- Background Glow --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.02)_1px,transparent_1px)] bg-[size:40px_40px]"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/10 rounded-full filter blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 py-12 relative">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <nav class="flex text-sm text-gray-500 mb-4 uppercase tracking-widest font-semibold">
                    <a href="/" class="hover:text-purple-400">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-purple-400">Katalog</span>
                </nav>
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white">
                    Koleksi <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Produk</span>
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full mt-4"></div>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-gray-400 text-sm italic">Menampilkan {{ $products->count() }} produk</span>
                <select class="bg-white/5 border border-white/10 text-white text-sm rounded-xl px-4 py-2 focus:border-purple-500 focus:outline-none backdrop-blur-md">
                    <option class="bg-gray-900">Urutkan: Terbaru</option>
                    <option class="bg-gray-900">Harga: Rendah ke Tinggi</option>
                    <option class="bg-gray-900">Harga: Tinggi ke Rendah</option>
                </select>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Sidebar Filter (Hidden on Mobile, Optional) --}}
            <aside class="w-full lg:w-64 space-y-8 flex-shrink-0">
                <div class="bg-white/5 border border-white/10 p-6 rounded-2xl backdrop-blur-sm">
                    <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        Filter Kategori
                    </h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        {{-- Contoh kategori statis atau looping dari variabel categories --}}
                        <li class="flex items-center justify-between hover:text-white cursor-pointer transition-colors">
                            <span>Semua Produk</span>
                            <span class="bg-white/10 px-2 py-0.5 rounded text-[10px]">120</span>
                        </li>
                        <li class="flex items-center justify-between text-purple-400 cursor-pointer transition-colors">
                            <span>Electronics</span>
                            <span class="bg-purple-500/20 px-2 py-0.5 rounded text-[10px]">45</span>
                        </li>
                    </ul>
                </div>
            </aside>

            {{-- GRID PRODUK --}}
            <div class="flex-1">
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @forelse ($products as $product)
                        <div class="group relative bg-white/5 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/10 hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2">
                            
                            {{-- Image Container --}}
                            <div class="relative aspect-[4/5] overflow-hidden bg-white/5">
                                <img
                                    src="{{ $product->primaryImage?->url ?? 'https://via.placeholder.com/400x500' }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                
                                {{-- Quick Info Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>

                            {{-- Product Details --}}
                            <div class="p-5">
                                <h5 class="font-bold text-white text-lg mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
                                    {{ $product->name }}
                                </h5>

                                <div class="flex items-center justify-between mb-5">
                                    <p class="text-xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                        {{ $product->formatted_price }}
                                    </p>
                                </div>

                                <a href="{{ route('catalog.show', $product->slug) }}"
                                   class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-gradient-to-r hover:from-purple-600 hover:to-pink-600 text-white font-bold py-3 rounded-xl transition-all duration-300 border border-white/10 hover:border-transparent group-hover:shadow-[0_0_20px_rgba(168,85,247,0.4)]">
                                    <span>Detail Produk</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>

                            {{-- Shine Effect --}}
                            <div class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent skew-x-12 pointer-events-none"></div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center bg-white/5 border border-dashed border-white/20 rounded-3xl">
                            <p class="text-gray-500 italic">Produk tidak ditemukan.</p>
                        </div>
                    @endforelse
                </div>

                {{-- PAGINATION --}}
                <div class="mt-16 border-t border-white/5 pt-8">
                    <div class="custom-pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling khusus untuk Laravel Pagination agar matching */
    .custom-pagination nav svg { @apply w-5 h-5; }
    .custom-pagination nav span, .custom-pagination nav a { 
        @apply bg-white/5 border-white/10 text-white rounded-lg px-4 py-2 hover:bg-purple-600 transition-all;
    }
    .custom-pagination nav .relative.z-0 { @apply flex gap-2; }
</style>
@endsection