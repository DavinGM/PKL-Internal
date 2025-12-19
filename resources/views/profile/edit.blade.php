{{-- resources/views/profile/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">
                Profil Saya
            </h2>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-100 px-4 py-3 text-green-800 flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button
                        onclick="this.parentElement.remove()"
                        class="text-green-700 hover:text-green-900 font-bold"
                    >
                        ✕
                    </button>
                </div>
            @endif

            {{-- 1. Avatar Information --}}
            <div class="mb-6 rounded-xl bg-white shadow">
                <div class="border-b px-6 py-4 font-semibold text-gray-700">
                    Foto Profil
                </div>
                <div class="p-6">
                    @include('profile.partials.update-avatar-form')
                </div>
            </div>

            {{-- 2. Profile Information --}}
            <div class="mb-6 rounded-xl bg-white shadow">
                <div class="border-b px-6 py-4 font-semibold text-gray-700">
                    Informasi Profil
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- 3. Update Password --}}
            <div class="mb-6 rounded-xl bg-white shadow">
                <div class="border-b px-6 py-4 font-semibold text-gray-700">
                    Update Password
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- 4. Connected Accounts --}}
            <div class="mb-6 rounded-xl bg-white shadow">
                <div class="border-b px-6 py-4 font-semibold text-gray-700">
                    Akun Terhubung
                </div>
                <div class="p-6">
                    @include('profile.partials.connected-accounts')
                </div>
            </div>

            {{-- 5. Delete Account --}}
            <div class="rounded-xl border border-red-200 bg-white shadow">
                <div class="border-b border-red-200 bg-red-50 px-6 py-4 font-semibold text-red-700">
                    Hapus Akun
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
