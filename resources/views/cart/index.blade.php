@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="min-h-screen bg-gray-900 relative overflow-hidden py-12 lg:py-20">
    {{-- Background Decorations --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:40px_40px]"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px] opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[120px] opacity-50"></div>

    <div class="max-w-6xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="mb-10 text-center lg:text-left">
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                Keranjang <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Belanja</span>
            </h1>
            <div class="h-1 w-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto lg:mx-0"></div>
        </div>

        {{-- Flash Messages (Alert untuk stok habis atau error checkout) --}}
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-2xl text-red-400 backdrop-blur-md">
                {{ session('error') }}
            </div>
        @endif

        @if ($cart && $cart->items->count())
            <div class="grid lg:grid-cols-3 gap-8">

                {{-- LIST PRODUK --}}
                <div class="lg:col-span-2 space-y-4">
                    @foreach ($cart->items as $item)
                        <div class="group bg-white/5 backdrop-blur-md border border-white/10 p-4 lg:p-6 rounded-2xl flex flex-col sm:flex-row items-center gap-6 hover:border-purple-500/50 hover:bg-white/10 transition">

                            {{-- Gambar --}}
                            <div class="w-24 h-24 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-white/5">
                                <img src="{{ $item->product->image_url }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition">
                            </div>

                            {{-- Info --}}
                            <div class="flex-1 text-center sm:text-left">
                                <h3 class="text-lg lg:text-xl font-bold text-white">
                                    {{ $item->product->name }}
                                </h3>
                                <p class="text-purple-400 font-bold text-lg mb-4">
                                    {{ $item->product->formatted_price }}
                                </p>

                                {{-- Actions --}}
                                <div class="flex flex-wrap gap-4 justify-center sm:justify-start">

                                    {{-- UPDATE QTY --}}
                                    <form method="POST"
                                          action="{{ route('cart.update', $item->id) }}"
                                          class="flex items-center bg-gray-900/50 rounded-lg border border-white/10 p-1">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number"
                                               name="qty"
                                               min="1"
                                               max="{{ $item->product->stock }}"
                                               value="{{ $item->quantity }}"
                                               class="bg-transparent text-white w-16 text-center font-semibold focus:outline-none">
                                        <button class="bg-purple-600 hover:bg-purple-500 text-white text-xs px-3 py-1.5 rounded-md uppercase font-bold tracking-wider transition">
                                            Update
                                        </button>
                                    </form>

                                    {{-- DELETE --}}
                                    <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-gray-400 hover:text-red-400 text-sm font-medium flex items-center gap-1 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- RINGKASAN --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24 bg-gradient-to-br from-purple-900/40 to-indigo-900/40 backdrop-blur-xl border border-white/20 p-8 rounded-3xl shadow-2xl">
                        <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">
                            Ringkasan Pesanan
                        </h2>

                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-gray-400">
                                <span>Subtotal</span>
                                <span class="text-white">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <div class="flex justify-between text-gray-400">
                                <span>Pengiriman</span>
                                <span class="text-green-400 font-medium text-sm px-2 py-0.5 bg-green-400/10 rounded-full">
                                    GRATIS
                                </span>
                            </div>

                            <div class="h-px bg-white/10 my-4"></div>

                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-white">Total</span>
                                <span class="text-2xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        {{-- LINK KE CHECKOUT (Updated for Day 11) --}}
                        <a href="{{ route('checkout.index') }}" 
                           class="block w-full text-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-bold py-4 rounded-xl transition shadow-lg transform hover:scale-[1.02] active:scale-95">
                            Lanjut ke Pembayaran
                        </a>
                    </div>
                </div>
            </div>

        @else
            {{-- EMPTY STATE --}}
            <div class="bg-white/5 border border-white/10 backdrop-blur-sm rounded-3xl p-16 text-center">
                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Keranjang Kosong</h3>
                <p class="text-gray-400 mb-8">Belum ada produk di keranjang Anda.</p>
                <a href="{{ route('catalog.index') }}"
                   class="inline-flex bg-white/10 hover:bg-white/20 text-white font-bold px-8 py-3 rounded-xl border border-white/10 transition">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </div>
</div>
@endsection