@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="min-h-screen bg-gray-900 relative overflow-hidden py-12 lg:py-20">
    {{-- Background Decorations --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:40px_40px]"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full filter blur-[120px] opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-600/10 rounded-full filter blur-[120px] opacity-50"></div>

    <div class="max-w-6xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="mb-10 text-center lg:text-left">
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                Keranjang <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Belanja</span>
            </h1>
            <div class="h-1 w-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto lg:mx-0"></div>
        </div>

        @if (count($cart))
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- List Produk (Kiri) --}}
                <div class="lg:col-span-2 space-y-4">
                    @foreach ($cart as $item)
                        <div class="group relative bg-white/5 backdrop-blur-md border border-white/10 p-4 lg:p-6 rounded-2xl flex flex-col sm:flex-row items-center gap-6 transition-all duration-300 hover:border-purple-500/50 hover:bg-white/10">
                            
                            {{-- Gambar Produk --}}
                            <div class="relative w-24 h-24 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-white/5 flex-shrink-0">
                                <img src="{{ $item['product']->image_url }}" 
                                     alt="{{ $item['product']->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            {{-- Informasi Produk --}}
                            <div class="flex-1 text-center sm:text-left">
                                <h3 class="text-lg lg:text-xl font-bold text-white group-hover:text-purple-300 transition-colors">
                                    {{ $item['product']->name }}
                                </h3>
                                <p class="text-purple-400 font-bold text-lg mb-4">
                                    {{ $item['product']->formatted_price }}
                                </p>

                                {{-- Aksi & Input --}}
                                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4">
                                    <form method="POST" action="{{ route('cart.update', $item['product']->id) }}" class="flex items-center bg-gray-900/50 rounded-lg border border-white/10 p-1">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" min="1" max="{{ $item['product']->stock }}" 
                                               value="{{ $item['qty'] }}" 
                                               class="bg-transparent text-white w-16 text-center focus:outline-none px-2 font-semibold">
                                        <button class="bg-purple-600 hover:bg-purple-500 text-white text-xs px-3 py-1.5 rounded-md transition-colors uppercase font-bold tracking-wider">
                                            Update
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.remove', $item['product']->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-gray-400 hover:text-red-400 transition-colors flex items-center gap-1 text-sm font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Ringkasan Belanja (Kanan) --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24 bg-gradient-to-br from-purple-900/40 to-indigo-900/40 backdrop-blur-xl border border-white/20 p-8 rounded-3xl shadow-2xl">
                        <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Ringkasan Pesanan</h2>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-gray-400">
                                <span>Subtotal</span>
                                <span class="text-white">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400">
                                <span>Biaya Pengiriman</span>
                                <span class="text-green-400 font-medium text-sm px-2 py-0.5 bg-green-400/10 rounded-full tracking-wide">GRATIS</span>
                            </div>
                            <div class="h-px bg-white/10 my-4"></div>
                            <div class="flex justify-between items-center">
                                <span class="text-lg text-white font-bold">Total</span>
                                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <a href="#" class="block w-full text-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-bold py-4 rounded-xl transition-all duration-300 shadow-lg shadow-purple-500/25 hover:shadow-purple-500/40 transform hover:-translate-y-1">
                            Lanjut ke Pembayaran
                        </a>

                        <p class="text-center text-xs text-gray-500 mt-4 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                            Pembayaran Terenkripsi & Aman
                        </p>
                    </div>
                </div>
            </div>
        @else
            {{-- State Keranjang Kosong --}}
            <div class="bg-white/5 border border-white/10 backdrop-blur-sm rounded-3xl p-16 text-center">
                <div class="w-20 h-20 bg-purple-500/20 text-purple-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Keranjang Anda Masih Kosong</h3>
                <p class="text-gray-400 mb-8 max-w-sm mx-auto">Sepertinya Anda belum menambahkan produk apapun ke dalam keranjang belanja.</p>
                <a href="{{ route('catalog.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold px-8 py-3 rounded-xl border border-white/10 transition-all">
                    Mulai Belanja Sekarang
                </a>
            </div>
        @endif
    </div>
</div>
@endsection