{{-- resources/views/profile/partials/update-profile-information-form.blade.php --}}

<div class="space-y-6">
    <p class="text-sm text-gray-400 leading-relaxed">
        Pastikan informasi kontak Anda tetap akurat untuk mempermudah proses pengiriman dan komunikasi layanan.
    </p>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama --}}
            <div class="space-y-2">
                <label for="name" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all
                    @error('name') border-red-500/50 @enderror"
                >
                @error('name')
                    <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="space-y-2">
                <label for="email" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Alamat Email
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    autocomplete="username"
                    class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all
                    @error('email') border-red-500/50 @enderror"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Phone --}}
        <div class="space-y-2">
            <label for="phone" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                Nomor Telepon
            </label>
            <input
                type="tel"
                name="phone"
                id="phone"
                value="{{ old('phone', $user->phone) }}"
                placeholder="Contoh: 08123456789"
                class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-all
                @error('phone') border-red-500/50 @enderror"
            >
            <p class="mt-1 text-[10px] text-gray-500 uppercase tracking-tighter italic">Format: 08xxxxxxxxxx atau +628xxxxxxxxxx</p>
            @error('phone')
                <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        {{-- Address --}}
        <div class="space-y-2">
            <label for="address" class="text-xs font-bold uppercase tracking-widest text-gray-500 flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Alamat Lengkap Pengiriman
            </label>
            <textarea
                name="address"
                id="address"
                rows="3"
                placeholder="Sebutkan nama jalan, nomor rumah, dan kota..."
                class="block w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all resize-none
                @error('address') border-red-500/50 @enderror"
            >{{ old('address', $user->address) }}</textarea>
            @error('address')
                <p class="mt-1 text-xs text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button
                type="submit"
                class="group relative flex items-center justify-center gap-2 px-8 py-3 bg-white/10 text-white font-bold rounded-xl overflow-hidden transition-all duration-300 hover:bg-white/20"
            >
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <span class="relative z-10">Simpan Perubahan</span>
                <svg class="relative z-10 w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </button>
        </div>
    </form>
</div>