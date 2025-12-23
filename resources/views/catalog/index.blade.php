@extends('layouts.app')
@section('title', 'Katalog Produk')
@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between gap-6 mb-10">
        <h1 class="text-4xl font-bold text-white">
            Katalog <span class="text-purple-400">Produk</span>
        </h1>

        {{-- SORT --}}
        <form method="GET">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <select name="sort"
                onchange="this.form.submit()"
                class="bg-gray-800 text-white rounded-lg px-4 py-2">
                <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>
                    Terbaru
                </option>
                <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>
                    Harga: Rendah → Tinggi
                </option>
                <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>
                    Harga: Tinggi → Rendah
                </option>
            </select>
        </form>
    </div>

    <div class="flex gap-8">

        {{-- SIDEBAR KATEGORI --}}
        <aside class="w-64 hidden lg:block">
            <div class="bg-gray-800 p-5 rounded-xl">
                <h3 class="text-white font-bold mb-4">Kategori</h3>

                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('catalog.index') }}"
                           class="block px-3 py-2 rounded
                           {{ request('category') ? 'text-gray-400' : 'bg-purple-600 text-white' }}">
                            Semua Produk
                        </a>
                    </li>

                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('catalog.index', [
                                    'category' => $category->slug,
                                    'sort' => request('sort')
                                ]) }}"
                               class="flex justify-between px-3 py-2 rounded
                               {{ request('category') === $category->slug
                                   ? 'bg-purple-600 text-white'
                                   : 'text-gray-400 hover:bg-gray-700' }}">
                                <span>{{ $category->name }}</span>
                                <span>{{ $category->products_count }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        {{-- GRID PRODUK --}}
        <div class="flex-1">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="bg-gray-800 rounded-xl overflow-hidden">
                        <img
                            src="{{ $product->primaryImage?->url ?? 'https://via.placeholder.com/400x500' }}"
                            class="h-56 w-full object-cover">

                        <div class="p-4">
                            <h4 class="text-white font-semibold mb-2">
                                {{ $product->name }}
                            </h4>

                            <p class="text-purple-400 font-bold mb-3">
                                {{ $product->formatted_price }}
                            </p>

                            <a href="{{ route('catalog.show', $product->slug) }}"
                               class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg">
                                Detail Produk
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 text-gray-400">
                        Produk tidak ditemukan
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
