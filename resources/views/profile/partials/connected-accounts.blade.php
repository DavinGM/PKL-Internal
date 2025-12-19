{{-- resources/views/profile/partials/connected-accounts.blade.php --}}

<div class="space-y-6">
    <p class="text-sm text-gray-400 leading-relaxed">
        Kelola integrasi akun eksternal Anda untuk mempermudah akses masuk dan sinkronisasi data.
    </p>

    <div class="space-y-3">
        {{-- Google Account Card --}}
        <div class="relative group">
            {{-- Glow effect on hover --}}
            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
            
            <div class="relative flex flex-col sm:flex-row items-center justify-between gap-4 p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm transition-all duration-300 group-hover:bg-white/10">
                
                {{-- Left Section: Icon & Info --}}
                <div class="flex items-center gap-5">
                    {{-- Google Icon Container --}}
                    <div class="relative p-3 bg-white/5 rounded-xl border border-white/10 shadow-inner">
                        <svg class="h-8 w-8" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="text-white font-bold tracking-wide">Google Account</h4>
                        @if ($user->google_id)
                            <div class="flex items-center gap-2 mt-1">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                <span class="text-xs font-medium text-green-400 uppercase tracking-wider">Terhubung</span>
                            </div>
                        @else
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider block mt-1">Belum Terhubung</span>
                        @endif
                    </div>
                </div>

                {{-- Right Section: Action Button --}}
                <div class="w-full sm:w-auto">
                    @if ($user->google_id)
                        <form method="POST" action="{{ route('profile.google.unlink') }}" onsubmit="return confirm('Putuskan koneksi dengan Google?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl border border-red-500/30 bg-red-500/10 text-red-400 text-sm font-bold hover:bg-red-500 hover:text-white transition-all duration-300 focus:ring-2 focus:ring-red-500/50 outline-none">
                                Putuskan Akses
                            </button>
                        </form>
                    @else
                        <a href="{{ route('auth.google') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold hover:from-blue-500 hover:to-indigo-500 transition-all duration-300 shadow-lg shadow-blue-900/20 hover:shadow-blue-500/40">
                            Hubungkan Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Anda bisa menambah list akun lain (seperti GitHub/Facebook) dengan struktur yang sama di sini --}}
    </div>
</div>