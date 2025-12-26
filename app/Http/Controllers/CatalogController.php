<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use app\Models\Wishlist;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

        public function home()
    {
        // ======================
        // KATEGORI AKTIF + JUMLAH PRODUK
        // ======================
        $categories = Category::query()
            ->active()
            ->whereHas('activeProducts', function ($q) {
                $q->where('is_active', true)
                ->where('stock', '>', 0);
            })
            ->withCount(['activeProducts'])
            ->orderBy('name')
            ->get();

        // ======================
        // PRODUK TERBARU
        // ======================
        $latestProducts = Product::query()
            ->active()
            ->inStock()
            ->with('primaryImage')
            ->latest()
            ->limit(8)
            ->get();

        $wishlistProductIds = [];

        if (Auth::check()) {
            $wishlistProductIds = Auth::user()
                ->wishlists()
                ->pluck('product_id')
                ->toArray();
        }


        return view('home', compact(
        'categories',
        'latestProducts',
        'wishlistProductIds'
    ));

}


    public function index(Request $request)
    {
        // ======================
        // QUERY DASAR
        // ======================
        $query = Product::query()
            ->with(['category', 'primaryImage'])
            ->where('is_active', true)
            ->where('stock', '>', 0);

        // ======================
        // FILTER KATEGORI
        // ======================
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // ======================
        // SORTING
        // ======================
        $sort = $request->get('sort', 'newest');

        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        // ======================
        // DATA PRODUK
        // ======================
        $products = $query->paginate(12)->withQueryString();

        // ======================
        // DATA KATEGORI (SIDEBAR)
        // ======================
        $categories = Category::query()
            ->where('is_active', true)
            ->withCount([
                'products as products_count' => function ($q) {
                    $q->where('is_active', true)
                      ->where('stock', '>', 0);
                }
            ])
            ->orderBy('name')
            ->get();

        $wishlistProductIds = [];

        if (Auth::check()) {
            $wishlistProductIds = Auth::user()
                ->wishlists()
                ->pluck('product_id')
                ->toArray();
        }

        return view('catalog.index', compact(
        'products',
        'categories',
        'sort',
        'wishlistProductIds'   
    ));
    }


        public function show($slug)
    {
        $product = Product::with(['category', 'images'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->firstOrFail();

        $wishlistProductIds = [];

        if (Auth::check()) {
            $wishlistProductIds = Auth::user()
                ->wishlists()
                ->pluck('product_id')
                ->toArray();
        }


            return view('catalog.show', compact(
            'product',
            'wishlistProductIds'
        ));

    }

}
