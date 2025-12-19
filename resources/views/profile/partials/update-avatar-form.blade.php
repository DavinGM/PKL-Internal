{{-- resources/views/profile/partials/update-avatar-form.blade.php --}}

<div class="space-y-6">
    <p class="text-sm text-gray-400 leading-relaxed">
        Personalisasi profil Anda. Gunakan foto terbaik Anda dalam format <span class="text-purple-400 font-medium">JPG, PNG, atau WebP</span> (Maks. 2MB).
    </p>

    <form method="post" action="{{ route('profile.avatar.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('put')

        <div class="flex flex-col sm:flex-row items-center gap-8">
            {{-- Avatar Preview with Neon Glow --}}
            <div class="relative group">
                {{-- Glow Effect --}}
                <div class="absolute -inset-1 bg-gradient-to-tr from-purple-600 to-pink-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-500"></div>
                
                <div class="relative">
                    <img
                        id="avatar-preview"
                        class="h-32 w-32 rounded-full object-cover border-2 border-gray-900 ring-4 ring-white/5 shadow-2xl"
                        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}"
                        alt="{{ $user->name }}"
                    >

                    @if($user->avatar)
                        <button
                            type="button"
                            onclick="if(confirm('Hapus foto profil?')) document.getElementById('delete-avatar-form').submit()"
                            class="absolute top-0 right-0 flex h-8 w-8 items-center justify-center rounded-full bg-red-500 text-white shadow-lg hover:bg-red-600 transition-colors border-4 border-gray-900"
                            title="Hapus foto"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    @endif
                </div>
            </div>

            {{-- Upload Input Custom --}}
            <div class="flex-1 w-full space-y-4">
                <div class="relative">
                    <label for="avatar" class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Pilih File Baru</label>
                    <input
                        type="file"
                        name="avatar"
                        id="avatar"
                        accept="image/*"
                        onchange="previewAvatar(event)"
                        class="block w-full text-sm text-gray-400
                        file:mr-4 file:py-2.5 file:px-6
                        file:rounded-xl file:border-0
                        file:text-xs file:font-bold file:uppercase file:tracking-wider
                        file:bg-purple-500/10 file:text-purple-400
                        hover:file:bg-purple-500/20 file:transition-all
                        cursor-pointer
                        @error('avatar') border-red-500 @enderror"
                    >
                </div>

                @error('avatar')
                    <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-sm font-bold rounded-xl hover:from-purple-500 hover:to-pink-500 transition-all duration-300 shadow-lg shadow-purple-900/20 hover:shadow-purple-500/40"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

{{-- Hidden Form Delete Avatar --}}
<form id="delete-avatar-form" action="{{ route('profile.avatar.destroy') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Validasi simpel sebelum preview
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2MB.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = e => {
            const preview = document.getElementById('avatar-preview');
            preview.src = e.target.result;
            // Tambahkan sedikit efek animasi saat foto berubah
            preview.classList.add('animate-pulse');
            setTimeout(() => preview.classList.remove('animate-pulse'), 500);
        };
        reader.readAsDataURL(file);
    }
</script>