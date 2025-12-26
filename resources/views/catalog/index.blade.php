@extends('layouts.app')
@section('title', 'Katalog Produk')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 lg:mb-12">
        <div>
            <h1 class="text-3xl lg:text-4xl font-bold text-white tracking-tight">
                Katalog <span class="text-purple-400 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Produk</span>
            </h1>
            <p class="text-gray-400 text-sm mt-2">Temukan produk terbaik untuk kebutuhan Anda</p>
        </div>

        {{-- SORT --}}
        <form method="GET" class="w-full md:w-auto">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <select name="sort"
                onchange="this.form.submit()"
                class="w-full md:w-auto bg-gray-800/80 backdrop-blur-sm border border-gray-700 text-white rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all cursor-pointer hover:bg-gray-800">
                <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>
                    🆕 Terbaru
                </option>
                <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>
                    💰 Harga: Rendah → Tinggi
                </option>
                <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>
                    💎 Harga: Tinggi → Rendah
                </option>
            </select>
        </form>
    </div>

    <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">

        {{-- SIDEBAR KATEGORI --}}
        <aside class="w-full lg:w-72 shrink-0">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700 p-6 rounded-2xl shadow-xl sticky top-6">
                <h3 class="text-white font-bold text-lg mb-5 flex items-center">
                    <span class="w-1 h-6 bg-purple-500 rounded-full mr-3"></span>
                    Kategori
                </h3>

                <ul class="space-y-1.5 text-sm">
                    <li>
                        <a href="{{ route('catalog.index') }}"
                        class="group flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200
                        {{ request('category') ? 'text-gray-300 hover:bg-gray-700/50' : 'bg-gradient-to-r from-purple-600 to-purple-500 text-white shadow-lg shadow-purple-500/30' }}">
                            <span class="font-medium">Semua Produk</span>
                            <i class="bi bi-grid-3x3-gap text-xs opacity-60 group-hover:opacity-100"></i>
                        </a>
                    </li>

                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('catalog.index', [
                                    'category' => $category->slug,
                                    'sort' => request('sort')
                                ]) }}"
                            class="group flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200
                            {{ request('category') === $category->slug
                                ? 'bg-gradient-to-r from-purple-600 to-purple-500 text-white shadow-lg shadow-purple-500/30'
                                : 'text-gray-300 hover:bg-gray-700/50 hover:text-white' }}">
                                <span class="font-medium">{{ $category->name }}</span>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold
                                {{ request('category') === $category->slug
                                    ? 'bg-white/20'
                                    : 'bg-gray-700 group-hover:bg-gray-600' }}">
                                    {{ $category->products_count }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        {{-- GRID PRODUK --}}
        <div class="flex-1 min-w-0">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-6">
                @forelse ($products as $product)
                    <div class="group bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700 hover:border-purple-500/50 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/20 hover:-translate-y-1">
                        <div class="relative overflow-hidden">
                            <img
                                src="{{ $product->primaryImage?->url ?? 'https://via.placeholder.com/400x500' }}"
                                class="h-56 sm:h-64 w-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                alt="{{ $product->name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            @auth
                            <button
                                type="button"
                                onclick="toggleWishlist({{ $product->id }})"
                                class="absolute top-3 right-3 z-10 p-2.5 rounded-full
                                    bg-black/60 backdrop-blur-sm text-white hover:bg-black/80 hover:scale-110
                                    transition-all duration-200 wishlist-btn-{{ $product->id }} shadow-lg">
                                
                                <i class="bi {{ auth()->user()->hasInWishlist($product)
                                    ? 'bi-heart-fill text-red-500'
                                    : 'bi-heart' }} text-lg"></i>
                            </button>
                            @endauth
                        </div>

                        <div class="p-5">
                            <h4 class="text-white font-semibold text-base mb-2 line-clamp-2 group-hover:text-purple-400 transition-colors">
                                {{ $product->name }}
                            </h4>

                            <div class="flex items-baseline gap-2 mb-4">
                                <p class="text-purple-400 font-bold text-xl">
                                    {{ $product->formatted_price }}
                                </p>
                            </div>

                            <a href="{{ route('catalog.show', $product->slug) }}"
                            class="block text-center bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-500 hover:to-purple-400 text-white font-medium py-2.5 px-4 rounded-xl transition-all duration-200 shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-105">
                                <span class="flex items-center justify-center gap-2">
                                    Detail Produk
                                    <i class="bi bi-arrow-right text-sm"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700 rounded-2xl p-12 text-center">
                            <div class="w-20 h-20 bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="bi bi-inbox text-3xl text-gray-500"></i>
                            </div>
                            <h3 class="text-white font-semibold text-lg mb-2">Produk Tidak Ditemukan</h3>
                            <p class="text-gray-400 text-sm">Coba ubah filter atau kategori yang dipilih</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-8 lg:mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection