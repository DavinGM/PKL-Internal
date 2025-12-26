@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="min-h-screen bg-[#050505] text-gray-200 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        {{-- ==================== BREADCRUMB ==================== --}}
        <nav class="mb-8 flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-xs uppercase tracking-[0.2em] text-gray-500 font-bold">
                <li><a href="{{ route('home') }}" class="hover:text-purple-400 transition-colors">Home</a></li>
                <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg></li>
                <li><a href="{{ route('catalog.index') }}" class="hover:text-purple-400 transition-colors">Catalog</a></li>
                <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg></li>
                <li class="text-purple-400 truncate max-w-[150px]">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            {{-- ==================== LEFT: PRODUCT GALLERY ==================== --}}
            <div class="lg:col-span-7 space-y-6">
                <div class="relative group aspect-square rounded-[2rem] overflow-hidden bg-gray-900 border border-white/5 shadow-2xl">
                    <img id="main-image"
                         src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-contain p-8 transition-transform duration-700 group-hover:scale-110">
                    
                    @if($product->has_discount)
                        <div class="absolute top-6 left-6 backdrop-blur-xl bg-red-500/80 text-white font-black px-4 py-2 rounded-2xl shadow-xl border border-red-400/30">
                            -{{ $product->discount_percentage }}% OFF
                        </div>
                    @endif
                </div>

                @if($product->images && $product->images->count() > 1)
                    <div class="flex gap-4 overflow-x-auto pb-2">
                        @foreach($product->images as $image)
                            <button onclick="document.getElementById('main-image').src = '{{ asset('storage/' . $image->image_path) }}'" 
                                    class="relative flex-shrink-0 w-24 h-24 rounded-2xl overflow-hidden border-2 border-white/5 hover:border-purple-500 transition-all">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- ==================== RIGHT: PRODUCT INFO ==================== --}}
            <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-8">
                <div class="space-y-4">
                    <span class="px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-400 text-xs font-bold uppercase tracking-widest">
                        {{ $product->category->name }}
                    </span>
                    <h1 class="text-4xl sm:text-5xl font-black text-white leading-tight">
                        {{ $product->name }}
                    </h1>
                </div>

                <div class="flex items-end gap-4">
                    <div class="space-y-1">
                        @if($product->has_discount)
                            <span class="text-lg text-gray-500 line-through decoration-red-500/50">
                                {{ $product->formatted_original_price }}
                            </span>
                        @endif
                        <div class="text-4xl font-black text-white tracking-tighter">
                            {{ $product->formatted_price }}
                        </div>
                    </div>
                </div>

                {{-- Status Stok --}}
                <div class="flex items-center gap-3">
                    @if($product->stock > 0)
                        <div class="h-2 w-2 rounded-full bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.6)]"></div>
                        <span class="text-sm font-bold text-green-500 uppercase tracking-widest italic">In Stock ({{ $product->stock }})</span>
                    @else
                        <div class="h-2 w-2 rounded-full bg-red-600 shadow-[0_0_10px_rgba(220,38,38,0.6)]"></div>
                        <span class="text-sm font-bold text-red-600 uppercase tracking-widest">Out of Stock</span>
                    @endif
                </div>

                {{-- ==================== FORM ADD TO CART ==================== --}}
                <form action="{{ route('cart.store') }}" method="POST" class="space-y-6 pt-6 border-t border-white/5">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="flex flex-col sm:flex-row gap-4 items-center">
                        <div class="w-full sm:w-auto">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3 text-center sm:text-left">Select Quantity</label>
                            <div class="flex items-center bg-gray-900 border border-white/10 rounded-2xl p-1 w-full sm:w-40 justify-between">
                                <button type="button" onclick="changeQty(-1)" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 transition-colors text-xl font-bold">−</button>
                                
                                <input id="qty_input" name="qty" type="number" min="1" max="{{ $product->stock }}" value="1" 
                                       class="bg-transparent border-none text-center w-full focus:ring-0 font-black text-lg [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                
                                <button type="button" onclick="changeQty(1)" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 transition-colors text-xl font-bold">+</button>
                            </div>
                        </div>

                        <div class="w-full pt-6 sm:pt-0">
                            @auth
                                <button type="submit" 
                                        @disabled($product->stock === 0)
                                        class="group relative w-full h-[60px] overflow-hidden rounded-2xl bg-white p-[1px] transition-all duration-300 disabled:opacity-30">
                                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600"></div>
                                    <div class="relative flex items-center justify-center gap-3 bg-gray-950 h-full w-full rounded-[15px] transition-all group-hover:bg-transparent">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 11-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                        <span class="font-black uppercase tracking-[0.2em] text-sm text-white">Tambahkan</span>
                                    </div>
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center justify-center w-full h-[60px] rounded-2xl bg-white/5 border border-white/10 font-black uppercase tracking-widest text-xs hover:bg-white/10 transition">
                                    Login Untuk Membeli
                                </a>
                            @endauth
                        </div>
                    </div>
                </form>

                @if($errors->any())
                    <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500 text-[10px] font-bold uppercase tracking-widest">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Deskripsi --}}
                <div class="space-y-4 pt-6">
                    <h3 class="text-xs font-bold uppercase tracking-[0.3em] text-gray-500 border-b border-white/5 pb-2">Deskripsi</h3>
                    <div class="text-gray-400 text-sm leading-relaxed">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT LANGSUNG --}}
<script>
    function changeQty(amount) {
        const input = document.getElementById('qty_input');
        let current = parseInt(input.value);
        let next = current + amount;
        let max = parseInt(input.max) || 999;
        
        if (next >= 1 && next <= max) {
            input.value = next;
        }
    }
</script>
@endsection