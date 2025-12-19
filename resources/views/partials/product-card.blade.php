<div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col h-full relative">
    {{-- Product Image --}}
    <div class="relative">
        <a href="{{ route('catalog.show', $product->slug) }}">
            <img src="{{ $product->image_url }}"
                 alt="{{ $product->name }}"
                 class="w-full h-48 object-cover">
        </a>

        {{-- Badge Diskon --}}
        @if($product->has_discount)
            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                -{{ $product->discount_percentage }}%
            </span>
        @endif

        {{-- Wishlist Button --}}
        @auth
            <button type="button"
                    onclick="toggleWishlist({{ $product->id }})"
                    class="absolute top-2 right-2 bg-white text-gray-700 hover:text-red-600 p-2 rounded-full shadow-md wishlist-btn-{{ $product->id }}">
                <i class="bi {{ auth()->user()->hasInWishlist($product) ? 'bi-heart-fill text-red-600' : 'bi-heart' }}"></i>
            </button>
        @endauth
    </div>

    {{-- Card Body --}}
    <div class="flex-1 flex flex-col p-4">
        {{-- Category --}}
        <small class="text-gray-500 mb-1">{{ $product->category->name }}</small>

        {{-- Product Name --}}
        <h6 class="text-gray-900 font-semibold mb-2 line-clamp-2">
            <a href="{{ route('catalog.show', $product->slug) }}" class="hover:text-blue-600">
                {{ Str::limit($product->name, 40) }}
            </a>
        </h6>

        {{-- Price --}}
        <div class="mt-auto">
            @if($product->has_discount)
                <small class="text-gray-400 line-through">
                    {{ $product->formatted_original_price }}
                </small>
            @endif
            <div class="font-bold text-blue-600">
                {{ $product->formatted_price }}
            </div>
        </div>

        {{-- Stock Info --}}
        @if($product->stock <= 5 && $product->stock > 0)
            <small class="text-yellow-500 mt-2 flex items-center gap-1">
                <i class="bi bi-exclamation-triangle"></i>
                Stok tinggal {{ $product->stock }}
            </small>
        @elseif($product->stock == 0)
            <small class="text-red-500 mt-2 flex items-center gap-1">
                <i class="bi bi-x-circle"></i> Stok Habis
            </small>
        @endif
    </div>

    {{-- Card Footer --}}
    <div class="p-4 pt-0 mt-2">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                    @if($product->stock == 0) disabled @endif>
                <i class="bi bi-cart-plus"></i>
                @if($product->stock == 0)
                    Stok Habis
                @else
                    Tambah Keranjang
                @endif
            </button>
        </form>
    </div>
</div>
