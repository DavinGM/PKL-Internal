{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 relative overflow-hidden py-12 lg:py-20">
    {{-- Background Pattern & Glow --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(139,92,246,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(139,92,246,0.02)_1px,transparent_1px)] bg-[size:40px_40px]"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full filter blur-[120px] opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-600/10 rounded-full filter blur-[120px] opacity-50"></div>

    <div class="max-w-4xl mx-auto px-6 relative">
        {{-- Header --}}
        <div class="mb-10 text-center sm:text-left">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                Pengaturan <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Profil</span>
            </h2>
            <div class="h-1 w-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto sm:mx-0"></div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-8 relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl blur opacity-25"></div>
                <div class="relative rounded-xl border border-green-500/30 bg-gray-900/80 backdrop-blur-md px-6 py-4 text-green-400 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-green-500 hover:text-white transition-colors">✕</button>
                </div>
            </div>
        @endif

        <div class="space-y-8">
            {{-- 1. Avatar Information --}}
            <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:border-purple-500/30">
                <div class="bg-white/5 px-6 py-4 border-b border-white/10 flex items-center gap-3">
                    <div class="p-2 bg-purple-500/20 rounded-lg text-purple-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-white tracking-wide">Foto Profil</h3>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-avatar-form')
                </div>
            </div>

            {{-- 2. Profile Information --}}
            <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:border-purple-500/30">
                <div class="bg-white/5 px-6 py-4 border-b border-white/10 flex items-center gap-3">
                    <div class="p-2 bg-indigo-500/20 rounded-lg text-indigo-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-white tracking-wide">Informasi Profil</h3>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- 3. Update Password --}}
            <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:border-purple-500/30">
                <div class="bg-white/5 px-6 py-4 border-b border-white/10 flex items-center gap-3">
                    <div class="p-2 bg-pink-500/20 rounded-lg text-pink-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="font-bold text-white tracking-wide">Update Keamanan</h3>
                </div>
                <div class="p-6 text-gray-300">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- 4. Connected Accounts --}}
            <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden transition-all duration-300 hover:border-purple-500/30">
                <div class="bg-white/5 px-6 py-4 border-b border-white/10 flex items-center gap-3">
                    <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <h3 class="font-bold text-white tracking-wide">Akun Terhubung</h3>
                </div>
                <div class="p-6 text-gray-300">
                    @include('profile.partials.connected-accounts')
                </div>
            </div>

            {{-- 5. Delete Account --}}
            <div class="relative group mt-12">
                <div class="absolute -inset-0.5 bg-red-500/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                <div class="relative rounded-2xl border border-red-500/20 bg-red-950/10 backdrop-blur-xl overflow-hidden">
                    <div class="bg-red-500/10 px-6 py-4 border-b border-red-500/20 flex items-center gap-3 text-red-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        <h3 class="font-bold uppercase tracking-widest text-sm">Zona Bahaya</h3>
                    </div>
                    <div class="p-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Note: Pastikan file partials di bawah ini juga disesuaikan inputnya --}}
<style>
    /* Global style untuk input di halaman profil agar menyatu dengan tema dark */
    input, select, textarea {
        @apply bg-white/5 border-white/10 text-white focus:border-purple-500 focus:ring-purple-500/20 rounded-xl !important;
    }
    label {
        @apply text-gray-400 text-sm font-medium mb-1 block !important;
    }
</style>
@endsection