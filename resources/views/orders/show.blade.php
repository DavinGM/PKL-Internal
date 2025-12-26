@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-12 lg:py-20">
    <div class="max-w-4xl mx-auto px-6">
        
        {{-- Header & Status --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Detail <span class="text-purple-400">Pesanan</span>
                </h1>
                <p class="text-gray-400 mt-1">ID Transaksi: <span class="font-mono text-purple-300">{{ $order->order_number }}</span></p>
            </div>
            
            {{-- Badge Status dinamis --}}
            @php
                $statusColor = [
                    'pending' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                    'success' => 'bg-green-500/10 text-green-500 border-green-500/20',
                    'failed'  => 'bg-red-500/10 text-red-500 border-red-500/20',
                    'expired' => 'bg-gray-500/10 text-gray-500 border-gray-500/20',
                ][$order->status] ?? 'bg-blue-500/10 text-blue-500 border-blue-500/20';
            @endphp
            
            <span class="px-6 py-2 rounded-full text-sm font-black border {{ $statusColor }} uppercase tracking-widest">
                {{ $order->status }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Kolom Kiri: Detail Produk --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl overflow-hidden">
                    <div class="p-6 border-b border-white/10 bg-white/5">
                        <h3 class="text-white font-bold">Item Pesanan</h3>
                    </div>
                    
                    <div class="p-6 divide-y divide-white/10">
                        @foreach($order->items as $item)
                        <div class="py-4 first:pt-0 last:pb-0 flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-purple-600/20 rounded-xl flex items-center justify-center border border-purple-500/30">
                                    <span class="text-purple-400 font-bold">{{ $item->quantity }}x</span>
                                </div>
                                <div>
                                    <p class="text-white font-semibold">{{ $item->product_name }}</p>
                                    <p class="text-gray-400 text-sm">@Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <p class="text-white font-bold text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                        </div>
                        @endforeach
                    </div>

                    <div class="p-6 bg-purple-600/5 border-t border-white/10">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Biaya Pengiriman</span>
                            <span class="text-white font-medium text-right font-mono">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl text-white font-bold">Total Akhir</span>
                            <span class="text-2xl text-purple-400 font-black font-mono">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Informasi Pengiriman --}}
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6">
                    <h3 class="text-white font-bold mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Alamat Pengiriman
                    </h3>
                    <div class="text-gray-300 space-y-1">
                        <p class="font-bold text-white">{{ $order->shipping_name }}</p>
                        <p class="text-sm">{{ $order->shipping_phone }}</p>
                        <p class="text-sm leading-relaxed">{{ $order->shipping_address }}</p>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Aksi Pembayaran --}}
            <div class="lg:col-span-1">
                <div class="sticky top-8 bg-gradient-to-br from-purple-900/40 to-pink-900/40 border border-white/10 rounded-3xl p-6 backdrop-blur-xl">
                    <h3 class="text-white font-bold mb-4">Pembayaran</h3>
                    
                    @if($order->status == 'pending')
                        <p class="text-gray-400 text-sm mb-6">Silakan selesaikan pembayaran agar pesanan segera diproses.</p>
                        <button id="pay-button" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-black py-4 rounded-2xl shadow-xl shadow-purple-900/20 transform transition hover:scale-[1.03] active:scale-[0.98]">
                            BAYAR SEKARANG
                        </button>
                    @elseif($order->status == 'success')
                        <div class="text-center py-4">
                            <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-500/30">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <p class="text-green-400 font-bold uppercase tracking-wider">Lunas</p>
                            <p class="text-gray-400 text-xs mt-2 font-mono">{{ $order->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    @else
                        <p class="text-gray-400 text-sm text-center py-4 italic text-uppercase">Transaksi {{ $order->status }}</p>
                    @endif

                    <div class="mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('orders.index') }}" class="block text-center text-gray-400 hover:text-white text-sm transition">
                            &larr; Kembali ke Daftar Pesanan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Script Midtrans Snap --}}
@if($order->status == 'pending')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        payButton.onclick = function () {
            window.snap.pay('{{ $order->snap_token }}', {
                onSuccess: function (result) {
                    window.location.reload();
                },
                onPending: function (result) {
                    window.location.reload();
                },
                onError: function (result) {
                    alert("Pembayaran gagal, silakan coba lagi.");
                    console.log(result);
                }
            });
        };
    </script>
@endif

@endsection