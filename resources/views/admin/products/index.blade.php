@extends('layouts.admin')
@section('title', 'Produk')
@section('page-title', 'Daftar Produk')
@section('content')

{{-- Header & Tombol Tambah --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">Katalog Produk</h3>
        <p class="text-sm text-slate-500 font-medium">Kelola stok, harga, dan informasi produk toko Anda.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transition-all active:scale-95">
        <i class="bi bi-plus-circle text-lg"></i>
        <span>Tambah Produk</span>
    </a>
</div>

{{-- Flash Messages --}}
<div class="mb-6">
    @include('partials.flash-messages')
</div>

{{-- Table Card --}}
<div class="bg-white shadow-sm border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama Produk</th>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kategori</th>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">Harga</th>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">Stok</th>
                    <th class="px-6 py-4 text-right text-[10px] font-bold text-slate-400 uppercase tracking-widest">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @foreach($products as $product)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    {{-- Nama Produk --}}
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">
                            {{ $product->name }}
                        </div>
                        <div class="text-[10px] text-slate-400 font-medium mt-0.5 tracking-wide">ID: #{{ $product->id }}</div>
                    </td>
                    
                    {{-- Kategori --}}
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-600 text-[11px] font-bold">
                            {{ $product->category->name ?? '-' }}
                        </span>
                    </td>
                    
                    {{-- Harga --}}
                    <td class="px-6 py-4 font-bold text-slate-700">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </td>
                    
                    {{-- Stok --}}
                    <td class="px-6 py-4">
                        @if($product->stock <= 5)
                            <span class="text-rose-600 font-bold flex items-center gap-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                                {{ $product->stock }}
                            </span>
                        @else
                            <span class="text-slate-600 font-semibold">{{ $product->stock }}</span>
                        @endif
                    </td>
                    
                    {{-- Aksi --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 font-bold text-sm flex items-center gap-1 transition-colors">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-700 font-bold text-sm flex items-center gap-1 transition-colors">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($products->hasPages())
    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
        {{ $products->links() }}
    </div>
    @endif
</div>

@endsection