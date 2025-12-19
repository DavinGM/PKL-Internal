@extends('layouts.admin')
@section('title', 'Produk')
@section('page-title', 'Daftar Produk')
@section('content')

<div class="flex justify-between items-center mb-4">
    <h3 class="text-lg font-semibold">Produk</h3>
    <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        <i class="bi bi-plus-circle me-2"></i> Tambah Produk
    </a>
</div>

@include('partials.flash-messages')

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($products as $product)
            <tr>
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                <td class="px-4 py-2">Rp {{ number_format($product->price,0,',','.') }}</td>
                <td class="px-4 py-2">{{ $product->stock }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $products->links() }}
    </div>
</div>

@endsection
