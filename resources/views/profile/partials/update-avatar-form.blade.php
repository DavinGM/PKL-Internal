{{-- resources/views/profile/partials/update-avatar-form.blade.php --}}

<p class="mb-4 text-sm text-gray-500">
    Upload foto profil kamu. Format yang didukung: JPG, PNG, WebP. Maksimal 2MB.
</p>

<form method="post"
    action="{{ route('profile.avatar.update') }}"
    enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="flex items-center gap-6">
        {{-- Avatar Preview --}}
        <div class="relative">
            <img
                id="avatar-preview"
                class="h-24 w-24 rounded-full object-cover border border-gray-300"
                src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}"
                alt="{{ $user->name }}"
            >

            @if($user->avatar)
                <button
                    type="button"
                    onclick="if(confirm('Hapus foto profil?')) document.getElementById('delete-avatar-form').submit()"
                    class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white hover:bg-red-600"
                    title="Hapus foto"
                >
                    ✕
                </button>
            @endif
        </div>

        {{-- Upload Input --}}
        <div class="flex-1">
            <input
                type="file"
                name="avatar"
                id="avatar"
                accept="image/*"
                onchange="previewAvatar(event)"
                class="block w-full rounded-md border border-gray-300 text-sm text-gray-700 file:mr-4 file:rounded-md file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:text-sm file:font-medium hover:file:bg-gray-200
                @error('avatar') border-red-500 @enderror"
            >

            @error('avatar')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <button
            type="submit"
            class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            Simpan Foto
        </button>
    </div>
</form>

{{-- Hidden Form Delete Avatar --}}
<form id="delete-avatar-form" action="{{ route('profile.avatar.destroy') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('avatar-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
