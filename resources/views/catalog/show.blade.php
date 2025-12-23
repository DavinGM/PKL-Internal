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

                    {{-- Glow Effect Background --}}
                    <div class="absolute -z-10 inset-0 bg-gradient-to-tr from-purple-600/10 to-blue-600/10 opacity-50 blur-3xl"></div>
                </div>

                {{-- Thumbnails --}}
                @if($product->images->count() > 1)
                    <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-hide">
                        @foreach($product->images as $image)
                            <button onclick="document.getElementById('main-image').src = this.querySelector('img').src" 
                                    class="relative flex-shrink-0 w-24 h-24 rounded-2xl overflow-hidden border-2 border-white/5 hover:border-purple-500 transition-all focus:outline-none focus:ring-2 focus:ring-purple-500">
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
                        <div class="text-4xl font-black text-white tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400">
                            {{ $product->formatted_price }}
                        </div>
                    </div>
                </div>

                {{-- Stock Status Indicator --}}
                <div class="flex items-center gap-3">
                    @if($product->stock > 10)
                        <div class="h-2 w-2 rounded-full bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.6)]"></div>
                        <span class="text-sm font-bold text-green-500 uppercase tracking-widest">In Stock & Ready to Ship</span>
                    @elseif($product->stock > 0)
                        <div class="h-2 w-2 rounded-full bg-yellow-500 animate-pulse shadow-[0_0_10px_rgba(234,179,8,0.6)]"></div>
                        <span class="text-sm font-bold text-yellow-500 uppercase tracking-widest">Limited Stock ({{ $product->stock }} Left)</span>
                    @else
                        <div class="h-2 w-2 rounded-full bg-red-600 shadow-[0_0_10px_rgba(220,38,38,0.6)]"></div>
                        <span class="text-sm font-bold text-red-600 uppercase tracking-widest">Out of Service</span>
                    @endif
                </div>

                {{-- Action Form --}}
                <form action="{{ route('cart.store') }}" method="POST" class="space-y-6 pt-6 border-t border-white/5">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="flex flex-col sm:flex-row gap-4 items-center">
                        <div class="w-full sm:w-auto">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">Select Quantity</label>
                            <div class="flex items-center bg-gray-900 border border-white/10 rounded-2xl p-1 w-full sm:w-40 justify-between">
                                <button type="button" onclick="decrementQty()" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 transition-colors text-xl font-bold">−</button>
                                <input id="quantity" name="qty" type="number" min="1" max="{{ $product->stock }}" value="1" 
                                       class="bg-transparent border-none text-center w-full focus:ring-0 font-black text-lg">
                                <button type="button" onclick="incrementQty()" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 transition-colors text-xl font-bold">+</button>
                            </div>
                        </div>

                        <div class="w-full pt-6 sm:pt-0">
                            <button type="submit" 
                                    @disabled($product->stock === 0)
                                    class="group relative w-full h-[60px] overflow-hidden rounded-2xl bg-white p-[1px] transition-all duration-300 disabled:opacity-30">
                                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 opacity-100 group-hover:animate-pulse"></div>
                                <div class="relative flex items-center justify-center gap-3 bg-gray-950 h-full w-full rounded-[15px] transition-all group-hover:bg-transparent">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 11-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    <span class="font-black uppercase tracking-[0.2em] text-sm">Keranjang</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Description & Details --}}
                <div class="space-y-4 pt-6">
                    <h3 class="text-xs font-bold uppercase tracking-[0.3em] text-gray-500 border-b border-white/5 pb-2">Deskripsi</h3>
                    <div class="text-gray-400 text-sm leading-relaxed prose prose-invert max-w-none">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                {{-- Specs Grid --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-white/5 border border-white/5 text-center">
                        <div class="text-[10px] uppercase font-bold text-gray-500 tracking-widest mb-1">Ukuran</div>
                        <div class="text-white font-black">{{ $product->weight }} <span class="text-gray-500 text-xs">GR</span></div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/5 border border-white/5 text-center">
                        <div class="text-[10px] uppercase font-bold text-gray-500 tracking-widest mb-1">Serial SKU</div>
                        <div class="text-white font-black">#PROD-{{ $product->id }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function incrementQty() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.max);
    if (parseInt(input.value) < max) {
        input.value++;
    }
}

function decrementQty() {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) > 1) {
        input.value--;
    }
}
</script>
@endpush
@endsection