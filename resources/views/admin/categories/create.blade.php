@extends('layouts.admin')

@section('title', 'Tambah Kategori')
@section('page-title', 'Create Category')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Breadcrumb Navigation --}}
    <div class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400">
        <a href="{{ route('admin.categories.index') }}" class="hover:text-indigo-500 transition-colors">Categories</a>
        <i class="bi bi-chevron-right text-[10px]"></i>
        <span class="text-indigo-600">New Category</span>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-8">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 mb-8 flex items-center gap-2">
                <i class="bi bi-folder-plus text-indigo-500 text-lg"></i> Detail Kategori Baru
            </h3>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nama Kategori --}}
                <div class="space-y-1.5">
                    <label for="name" class="text-sm font-semibold text-slate-700 ml-1">Nama Kategori</label>
                    <input type="text" name="name" id="name"
                           class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400
                           @error('name') border-rose-500 bg-rose-50 @enderror"
                           value="{{ old('name') }}" 
                           placeholder="Contoh: Elektronik, Pakaian Pria..." required>
                    @error('name')
                        <p class="text-rose-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="space-y-1.5">
                    <label for="slug" class="text-sm font-semibold text-slate-700 ml-1">Slug (URL)</label>
                    <div class="relative">
                        <input type="text" name="slug" id="slug"
                               class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400
                               @error('slug') border-rose-500 bg-rose-50 @enderror"
                               value="{{ old('slug') }}" 
                               placeholder="contoh-kategori-elektronik" required>
                    </div>
                    <p class="text-[10px] text-slate-400 font-medium ml-1 mt-1 italic">*Gunakan huruf kecil, angka, dan tanda hubung saja.</p>
                    @error('slug')
                        <p class="text-rose-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex items-center gap-3">
                    {{-- Simpan Button --}}
                    <button type="submit" 
                            class="flex-1 group relative overflow-hidden px-8 py-3.5 rounded-xl bg-slate-900 text-white shadow-xl shadow-slate-900/20 transition-all hover:shadow-indigo-500/20 active:scale-95">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center gap-2">
                            <i class="bi bi-cloud-check text-lg"></i>
                            <span class="text-sm font-bold uppercase tracking-widest">Simpan Kategori</span>
                        </div>
                    </button>

                    {{-- Batal Button --}}
                    <a href="{{ route('admin.categories.index') }}" 
                       class="px-8 py-3.5 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 transition-all border border-transparent hover:border-slate-200">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection