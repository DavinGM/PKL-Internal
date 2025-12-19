<div class="group relative bg-gray-900/40 backdrop-blur-md border border-white/10 rounded-3xl overflow-hidden flex flex-col h-full transition-all duration-500 hover:border-purple-500/50 hover:shadow-[0_0_30px_rgba(168,85,247,0.15)]">
    
    {{-- Product Image Container --}}
    <div class="relative overflow-hidden aspect-square">
        <a href="{{ route('catalog.show', $product->slug) }}" class="block w-full h-full">
            <img src="{{ $product->image_url }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        </a>

        {{-- Gradient Overlay (Sudut bawah gambar agar teks lebih terbaca) --}}
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>

        {{-- Badge Diskon (Glassmorphism Style) --}}
        @if($product->has_discount)
            <div class="absolute top-4 left-4 backdrop-blur-md bg-red-500/80 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg tracking-wider uppercase shadow-lg border border-red-400/30">
                SAVE {{ $product->discount_percentage }}%
            </div>
        @endif

        {{-- Wishlist Button (Floating) --}}
        @auth
            <button type="button"
                    onclick="toggleWishlist({{ $product->id }})"
                    class="absolute top-4 right-4 z-10 p-2.5 rounded-2xl bg-gray-950/50 backdrop-blur-xl border border-white/10 text-white hover:text-red-500 hover:scale-110 transition-all duration-300 wishlist-btn-{{ $product->id }}">
                <i class="bi {{ auth()->user()->hasInWishlist($product) ? 'bi-heart-fill text-red-500' : 'bi-heart' }}"></i>
            </button>
        @endauth
    </div>

    {{-- Card Body --}}
    <div class="flex-1 flex flex-col p-5">
        {{-- Category --}}
        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-purple-400 mb-2">
            {{ $product->category->name }}
        </span>

        {{-- Product Name --}}
        <h3 class="text-white font-semibold mb-3 leading-tight min-h-[3rem]">
            <a href="{{ route('catalog.show', $product->slug) }}" class="hover:text-purple-400 transition-colors line-clamp-2">
                {{ $product->name }}
            </a>
        </h3>

        {{-- Price & Stock Section --}}
        <div class="mt-auto space-y-3">
            <div class="flex flex-col">
                @if($product->has_discount)
                    <span class="text-xs text-gray-500 line-through decoration-red-500/50">
                        {{ $product->formatted_original_price }}
                    </span>
                @endif
                <span class="text-xl font-black text-white tracking-tight">
                    {{ $product->formatted_price }}
                </span>
            </div>

            {{-- Stock Info Indicator --}}
            @if($product->stock <= 5 && $product->stock > 0)
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-yellow-500/10 border border-yellow-500/20 w-fit">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                    </span>
                    <span class="text-[10px] font-bold text-yellow-500 uppercase">Limit: {{ $product->stock }} Left</span>
                </div>
            @elseif($product->stock == 0)
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 w-fit">
                    <span class="h-2 w-2 rounded-full bg-red-500"></span>
                    <span class="text-[10px] font-bold text-red-500 uppercase">Sold Out</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Card Footer / Action --}}
    <div class="p-5 pt-0">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            
            <button type="submit"
                    class="group/btn relative w-full overflow-hidden rounded-xl bg-white p-[1px] transition-all duration-300 hover:shadow-[0_0_20px_rgba(168,85,247,0.4)] disabled:opacity-50 disabled:cursor-not-allowed"
                    @if($product->stock == 0) disabled @endif>
                
                {{-- Border Glow Effect --}}
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 opacity-100 group-hover/btn:animate-pulse"></div>
                
                <div class="relative flex items-center justify-center gap-2 bg-gray-950 px-4 py-3 rounded-[11px] transition-all group-hover/btn:bg-transparent">
                    <i class="bi bi-bag-plus text-lg {{ $product->stock == 0 ? 'text-gray-500' : 'text-white' }}"></i>
                    <span class="text-xs font-bold uppercase tracking-widest text-white">
                        {{ $product->stock == 0 ? 'Out of Stock' : 'Add to Cart' }}
                    </span>
                </div>
            </button>
        </form>
    </div>
</div>