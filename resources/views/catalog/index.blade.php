{{-- ================================================
     FILE: resources/views/catalog/index.blade.php
     FUNGSI: Halaman katalog/daftar produk
================================================ --}}

@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="container mx-auto py-6 px-4">
    <div class="flex flex-col lg:flex-row gap-6">

        {{-- SIDEBAR FILTER --}}
        <aside class="w-full lg:w-1/4">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-4 border-b">
                    <h5 class="font-semibold flex items-center gap-2">
                        <i class="bi bi-funnel"></i> Filter
                    </h5>
                </div>
                <div class="p-4">
                    <form action="{{ route('catalog.index') }}" method="GET" id="filter-form">

                        {{-- Pertahankan search query --}}
                        @if(request('q'))
                            <input type="hidden" name="q" value="{{ request('q') }}">
                        @endif

                        {{-- Filter Kategori --}}
                        <div class="mb-6">
                            <h6 class="font-semibold mb-3">Kategori</h6>
                            @foreach($categories as $category)
                                <label class="flex justify-between items-center mb-2 cursor-pointer">
                                    <span>{{ $category->name }}</span>
                                    <span class="text-sm bg-gray-200 px-2 py-0.5 rounded">{{ $category->products_count }}</span>
                                    <input type="radio"
                                           name="category"
                                           value="{{ $category->slug }}"
                                           {{ request('category') == $category->slug ? 'checked' : '' }}
                                           class="ml-2"
                                           onchange="this.form.submit()">
                                </label>
                            @endforeach
                        </div>

                        {{-- Filter Harga --}}
                        <div class="mb-6">
                            <h6 class="font-semibold mb-3">Rentang Harga</h6>
                            <div class="flex gap-2">
                                <input type="number" name="min_price" placeholder="Min"
                                       value="{{ request('min_price') }}"
                                       class="w-1/2 border rounded px-2 py-1 text-sm">
                                <input type="number" name="max_price" placeholder="Max"
                                       value="{{ request('max_price') }}"
                                       class="w-1/2 border rounded px-2 py-1 text-sm">
                            </div>
                            <button type="submit" class="mt-2 w-full bg-blue-600 text-white py-1.5 rounded text-sm hover:bg-blue-700 transition">
                                Terapkan
                            </button>
                        </div>

                        {{-- Filter Diskon --}}
                        <div class="mb-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="on_sale" value="1"
                                       {{ request('on_sale') ? 'checked' : '' }}
                                       onchange="this.form.submit()"
                                       class="form-checkbox h-4 w-4 text-red-600">
                                <span class="text-sm"><i class="bi bi-tag text-red-500"></i> Sedang Diskon</span>
                            </label>
                        </div>

                        {{-- Reset Filter --}}
                        @if(request()->hasAny(['category', 'min_price', 'max_price', 'on_sale']))
                            <a href="{{ route('catalog.index') }}"
                               class="block w-full text-center border border-gray-300 rounded py-1.5 text-sm hover:bg-gray-100 transition">
                                <i class="bi bi-x-circle me-1"></i> Reset Filter
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="w-full lg:w-3/4">
            {{-- Header & Sorting --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-3">
                <div>
                    <h4 class="font-semibold">
                        @if(request('q'))
                            Hasil pencarian: "{{ request('q') }}"
                        @elseif(request('category'))
                            {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Produk' }}
                        @else
                            Semua Produk
                        @endif
                    </h4>
                    <small class="text-gray-500">{{ $products->total() }} produk ditemukan</small>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm whitespace-nowrap">Urutkan:</label>
                    <select class="border rounded px-2 py-1 text-sm"
                            onchange="window.location.href = this.value">
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                                {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"
                                {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"
                                {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}"
                                {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama: A-Z</option>
                    </select>
                </div>
            </div>

            {{-- Product Grid --}}
            @if($products->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-6 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="bi bi-search text-gray-300 text-6xl"></i>
                    <h5 class="mt-4 font-semibold">Produk tidak ditemukan</h5>
                    <p class="text-gray-500">Coba ubah filter atau kata kunci pencarian</p>
                    <a href="{{ route('catalog.index') }}"
                       class="inline-block mt-3 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Lihat Semua Produk
                    </a>
                </div>
            @endif
        </main>
    </div>
</div>
@endsection
