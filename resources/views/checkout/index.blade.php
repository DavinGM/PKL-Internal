@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-12 lg:py-20 relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px]"></div>

    <div class="max-w-6xl mx-auto px-6 relative">
        <h1 class="text-3xl font-bold text-white mb-10">Proses <span class="text-purple-400">Checkout</span></h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="grid lg:grid-cols-3 gap-8">
            @csrf
            {{-- Form Alamat --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-3xl">
                    <h2 class="text-xl font-semibold text-white mb-6">Informasi Pengiriman</h2>
                    
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-gray-400 mb-2">Nama Penerima</label>
                            <input type="text" name="shipping_name" value="{{ auth()->user()->name }}" required
                                class="w-full bg-gray-900/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Nomor Telepon</label>
                            <input type="text" name="shipping_phone" placeholder="Contoh: 08123456789" required
                                class="w-full bg-gray-900/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Alamat Lengkap</label>
                            <textarea name="shipping_address" rows="3" placeholder="Masukkan alamat lengkap pengiriman" required
                                class="w-full bg-gray-900/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-purple-500 outline-none"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ringkasan --}}
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-purple-900/40 to-indigo-900/40 backdrop-blur-xl border border-white/20 p-8 rounded-3xl sticky top-24">
                    <h2 class="text-xl font-bold text-white mb-6">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2">
                        @php $grandTotal = 0; @endphp
                        @foreach(auth()->user()->cart->items as $item)
                            @php 
                                // Ambil harga dari display_price (harga diskon jika ada, jika tidak harga normal)
                                $itemPrice = $item->product->display_price;
                                $subtotal = $itemPrice * $item->quantity;
                                $grandTotal += $subtotal;
                            @endphp
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex-1">
                                    <p class="text-gray-200 text-sm font-medium line-clamp-2">{{ $item->product->name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $item->quantity }} x {{ number_format($itemPrice, 0, ',', '.') }}</p>
                                </div>
                                <span class="text-white text-sm font-semibold whitespace-nowrap">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-white/10 pt-4 space-y-4">
                        <div class="flex justify-between items-center text-lg font-bold">
                            <span class="text-white">Total</span>
                            <span class="text-purple-400 text-2xl">
                                Rp {{ number_format($grandTotal, 0, ',', '.') }}
                            </span>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-bold py-4 rounded-xl transition shadow-lg transform hover:scale-[1.02] active:scale-95">
                            Buat Pesanan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection