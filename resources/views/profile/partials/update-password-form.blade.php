{{-- resources/views/profile/partials/update-password-form.blade.php --}}

<div class="space-y-6">
    <p class="text-sm text-gray-400 leading-relaxed">
        Amankan akses akun Anda. Gunakan kombinasi karakter yang kuat dan simpan di tempat yang aman.
    </p>

    <form method="post" action="{{ route('profile.password.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Current Password --}}
        <div class="space-y-2">
            <label for="current_password" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                Password Saat Ini
            </label>
            <input
                type="password"
                name="current_password"
                id="current_password"
                autocomplete="current-password"
                placeholder="••••••••"
                class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all
                @error('current_password', 'updatePassword') border-red-500/50 @enderror"
            >
            @error('current_password', 'updatePassword')
                <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- New Password --}}
        <div class="space-y-2">
            <label for="password" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Password Baru
            </label>
            <input
                type="password"
                name="password"
                id="password"
                autocomplete="new-password"
                placeholder="Minimal 8 karakter"
                class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-all
                @error('password', 'updatePassword') border-red-500/50 @enderror"
            >
            @error('password', 'updatePassword')
                <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="space-y-2">
            <label for="password_confirmation" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                Konfirmasi Password Baru
            </label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                autocomplete="new-password"
                placeholder="Ulangi password baru"
                class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all
                @error('password_confirmation', 'updatePassword') border-red-500/50 @enderror"
            >
            @error('password_confirmation', 'updatePassword')
                <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button
                type="submit"
                class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-sm font-bold rounded-xl hover:from-purple-500 hover:to-indigo-500 transition-all duration-300 shadow-lg shadow-purple-900/20 hover:shadow-purple-500/40"
            >
                Simpan Password Baru
            </button>

            @if (session('status') === 'password-updated')
                <div 
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="flex items-center gap-2 text-green-400 font-medium text-sm"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Terupdate!</span>
                </div>
            @endif
        </div>
    </form>
</div>