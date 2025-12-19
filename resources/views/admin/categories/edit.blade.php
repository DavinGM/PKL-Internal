@extends('layouts.admin')

@section('title', 'Edit Kategori: ' . $category->name)
@section('page-title', 'Modify Category')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Breadcrumb Navigation --}}
    <div class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400">
        <a href="{{ route('admin.categories.index') }}" class="hover:text-indigo-500 transition-colors">Categories</a>
        <i class="bi bi-chevron-right text-[10px]"></i>
        <span class="text-slate-600">Edit Mode</span>
        <i class="bi bi-chevron-right text-[10px]"></i>
        <span class="text-indigo-600">ID: #{{ $category->id }}</span>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-8">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 flex items-center gap-2">
                    <i class="bi bi-pencil-square text-indigo-500 text-lg"></i> Perbarui Kategori
                </h3>
                <span class="text-[10px] bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full font-bold uppercase tracking-tighter">
                    Last Update: {{ $category->updated_at->diffForHumans() }}
                </span>
            </div>

            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nama Kategori --}}
                <div class="space-y-1.5">
                    <label for="name" class="text-sm font-semibold text-slate-700 ml-1">Nama Kategori</label>
                    <input type="text" name="name" id="name"
                           class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all
                           @error('name') border-rose-500 bg-rose-50 @enderror"
                           value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <p class="text-rose-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="space-y-1.5">
                    <label for="slug" class="text-sm font-semibold text-slate-700 ml-1">Slug (URL)</label>
                    <input type="text" name="slug" id="slug"
                           class="block w-full px-4 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all
                           @error('slug') border-rose-500 bg-rose-50 @enderror"
                           value="{{ old('slug', $category->slug) }}" required>
                    <p class="text-[10px] text-slate-400 font-medium ml-1 mt-1 italic">*Slug digunakan untuk URL yang ramah SEO.</p>
                    @error('slug')
                        <p class="text-rose-500 text-[10px] font-bold uppercase tracking-wider mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex items-center gap-3">
                    {{-- Update Button --}}
                    <button type="submit" 
                            class="flex-1 group relative overflow-hidden px-8 py-3.5 rounded-xl bg-slate-900 text-white shadow-xl shadow-slate-900/20 transition-all hover:shadow-indigo-500/20 active:scale-95">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center gap-2">
                            <i class="bi bi-arrow-repeat text-lg"></i>
                            <span class="text-sm font-bold uppercase tracking-widest">Update Data</span>
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

    {{-- Info Card (Opsional) --}}
    <div class="mt-6 p-4 bg-amber-50 rounded-2xl border border-amber-100 flex gap-3 items-start">
        <i class="bi bi-exclamation-triangle text-amber-500 mt-0.5"></i>
        <div class="text-xs text-amber-700 leading-relaxed">
            <span class="font-bold uppercase block mb-1">Perhatian:</span>
            Mengubah <strong>Slug</strong> dapat merusak tautan (URL) yang sudah terindeks di mesin pencari atau yang sudah dibagikan sebelumnya.
        </div>
    </div>
</div>
@endsection