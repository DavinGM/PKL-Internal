@extends('layouts.admin')
@section('title', 'Kategori')
@section('page-title', 'Kategori')
@section('content')

{{-- Header Section --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">Daftar Kategori</h3>
        <p class="text-sm text-slate-500 font-medium">Atur klasifikasi produk untuk memudahkan pencarian pelanggan.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" 
       class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transition-all active:scale-95">
        <i class="bi bi-plus-circle text-lg"></i>
        <span>Tambah Kategori</span>
    </a>
</div>

{{-- Flash Message --}}
@if(session('success'))
    <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl shadow-sm animate-fade-in">
        <i class="bi bi-check-circle-fill text-lg"></i>
        <p class="text-sm font-bold">{{ session('success') }}</p>
    </div>
@endif

{{-- Table Card --}}
<div class="bg-white shadow-sm border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Nama Kategori</th>
                    <th class="px-6 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Slug / URL</th>
                    <th class="px-6 py-4 text-right text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                @foreach($categories as $category)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        {{-- Nama --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
                                    <i class="bi bi-folder2"></i>
                                </div>
                                <span class="font-bold text-slate-700 group-hover:text-indigo-600 transition-colors">
                                    {{ $category->name }}
                                </span>
                            </div>
                        </td>

                        {{-- Slug --}}
                        <td class="px-6 py-4">
                            <code class="text-[11px] bg-slate-100 text-slate-500 px-2 py-1 rounded font-mono">
                                {{ $category->slug }}
                            </code>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                   class="inline-flex items-center gap-1 text-xs font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Semua produk di dalamnya mungkin terpengaruh.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-rose-500 hover:text-rose-700 transition-colors">
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

    {{-- Empty State (Opsional jika data kosong) --}}
    @if($categories->count() == 0)
        <div class="py-20 text-center">
            <i class="bi bi-folder2-open text-5xl text-slate-200"></i>
            <p class="mt-4 text-slate-400 font-bold uppercase tracking-widest text-xs">Belum ada kategori</p>
        </div>
    @endif
</div>

@endsection