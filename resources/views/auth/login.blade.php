{{-- ======================================== 
FILE: resources/views/auth/login.blade.php 
FUNGSI: Halaman form login dengan Tailwind CSS
======================================== --}}

@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-8rem)] flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Header --}}
        <div class="text-center mb-8">
        
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Pengembara!</h2>
            <p class="text-gray-600">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                            autofocus
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
                            autocomplete="current-password"
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

                {{-- Remember Me & Forgot Password --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember" 
                            name="remember" 
                            type="checkbox"
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer"
                        >
                        <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                            Ingat Saya
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <button 
                    type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300"
                >
                    Login
                </button>

                {{-- Divider --}}
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">Atau lanjutkan dengan</span>
                    </div>
                </div>

                {{-- Social Login --}}
                <a 
                    href="{{ route('auth.google') }}"
                    class="w-full flex items-center justify-center gap-3 py-3 px-4 border-2 border-gray-300 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-all duration-200 group"
                >
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                    <span class="text-gray-700 font-semibold group-hover:text-gray-900">Login dengan Google</span>
                </a>

                {{-- Register Link --}}
                <p class="text-center text-gray-600 pt-4 border-t border-gray-100">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-700 hover:underline transition-colors">
                        Daftar Sekarang
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection