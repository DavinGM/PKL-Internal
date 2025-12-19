<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Daftar produk (Admin)
     */
    public function index()
{
    $products = Product::with(['category', 'primaryImage'])
        ->latest()
        ->paginate(10);

    return view('admin.products.index', compact('products'));
}


    /**
     * Form tambah produk
     */
    public function create()
    {
        $categories = Category::active()->orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0|lt:price',
            'stock'           => 'required|integer|min:0',
            'weight'          => 'nullable|numeric|min:0',
            'is_active'       => 'boolean',
            'is_featured'     => 'boolean',
        ]);

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Detail produk
     */
    public function show(Product $product)
    {
        $product->load(['category', 'images']);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Form edit produk
     */
    public function edit(Product $product)
    {
        $categories = Category::active()->orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update produk
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0|lt:price',
            'stock'           => 'required|integer|min:0',
            'weight'          => 'nullable|numeric|min:0',
            'is_active'       => 'boolean',
            'is_featured'     => 'boolean',
        ]);

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->images()->delete();
            $product->delete();
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
