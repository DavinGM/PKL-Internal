@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-8rem)] flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Header --}}
        <div class="text-center mb-8">
       
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
            <p class="text-gray-600">Daftar sekarang untuk menikmati semua layanan kami</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name Field --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            class="block w-full pl-10 pr-3 py-3 border @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-300 focus:border-blue-500 focus:ring-blue-500 @enderror rounded-lg focus:ring-2 focus:ring-opacity-50 transition duration-200"
                            placeholder="Nama Anda"
                            required 
                            autocomplete="name" 
                            autofocus
                        >
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="block w-full pl-10 pr-3 py-3 border @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-300 focus:border-blue-500 focus:ring-blue-500 @enderror rounded-lg focus:ring-2 focus:ring-opacity-50 transition duration-200"
                            placeholder="nama@email.com"
                            required 
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            name="password"
                            class="block w-full pl-10 pr-3 py-3 border @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-300 focus:border-blue-500 focus:ring-blue-500 @enderror rounded-lg focus:ring-2 focus:ring-opacity-50 transition duration-200"
                            placeholder="••••••••"
                            required 
                            autocomplete="new-password"
                        >
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password Confirm Field --}}
                <div>
                    <label for="password-confirm" class="block text-sm font-semibold text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <input 
                            id="password-confirm" 
                            type="password" 
                            name="password_confirmation"
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg focus:ring-2 focus:ring-opacity-50 transition duration-200"
                            placeholder="••••••••"
                            required 
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 mt-4"
                >
                    Daftar Sekarang
                </button>

                {{-- Login Link --}}
                <p class="text-center text-gray-600 pt-6 border-t border-gray-100">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-700 hover:underline transition-colors">
                        Masuk di sini
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection