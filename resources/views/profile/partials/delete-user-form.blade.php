{{-- resources/views/profile/partials/delete-user-form.blade.php --}}

<div
    x-data="{ open: false }"
    x-init="
        @if($errors->userDeletion->isNotEmpty())
            open = true
        @endif
    "
    class="space-y-6"
>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <p class="text-sm text-gray-400 leading-relaxed max-w-xl">
            Setelah akun dihapus, semua data dan resource akan hilang secara permanen dari server kami. 
            <span class="text-red-400/80 font-medium">Tindakan ini tidak dapat dibatalkan.</span>
        </p>

        {{-- Trigger Button --}}
        <button
            type="button"
            @click="open = true"
            class="flex-shrink-0 px-6 py-3 bg-red-600/10 border border-red-500/50 text-red-500 rounded-xl font-bold text-sm hover:bg-red-600 hover:text-white transition-all duration-300 shadow-lg shadow-red-900/10"
        >
            Hapus Akun
        </button>
    </div>

    {{-- Modal Overlay --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-gray-950/80 backdrop-blur-sm"
        style="display: none;"
    >
        {{-- Modal Content --}}
        <div
            @click.away="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            class="relative w-full max-w-md bg-gray-900 border border-white/10 rounded-3xl p-8 shadow-2xl overflow-hidden"
        >
            {{-- Decorative Red Glow --}}
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-red-600/10 rounded-full blur-[60px]"></div>

            <div class="relative">
                {{-- Icon Warning --}}
                <div class="w-16 h-16 bg-red-500/20 text-red-500 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>

                <h2 class="text-xl font-bold text-white text-center mb-3">
                    Konfirmasi Penghapusan
                </h2>

                <p class="text-gray-400 text-sm text-center mb-8 leading-relaxed">
                    Tindakan ini akan menghapus seluruh data Anda secara permanen. Silakan masukkan password Anda untuk melanjutkan.
                </p>

                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                    @csrf
                    @method('delete')

                    <div>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan Password Anda"
                            class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all
                            @error('password', 'userDeletion') border-red-500/50 @enderror"
                        >
                        @error('password', 'userDeletion')
                            <p class="mt-2 text-xs text-red-400 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 mt-8">
                        <button
                            type="submit"
                            class="w-full py-3 bg-red-600 hover:bg-red-500 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-red-600/20"
                        >
                            Ya, Hapus Akun Saya
                        </button>

                        <button
                            type="button"
                            @click="open = false"
                            class="w-full py-3 bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white font-semibold rounded-xl transition-all duration-300"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>