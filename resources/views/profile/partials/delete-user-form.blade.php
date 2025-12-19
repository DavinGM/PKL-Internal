{{-- resources/views/profile/partials/delete-user-form.blade.php --}}

<div
    x-data="{ open: false }"
    x-init="
        @if($errors->userDeletion->isNotEmpty())
            open = true
        @endif
    "
>
    <p class="mb-4 text-sm text-gray-500">
        Setelah akun dihapus, semua data dan resource akan hilang permanen.
        Silakan unduh data penting sebelum menghapus akun.
    </p>

    {{-- Trigger Button --}}
    <button
        type="button"
        @click="open = true"
        class="rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white
               hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
    >
        Hapus Akun
    </button>

    {{-- Modal --}}
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    >
        <div
            @click.away="open = false"
            class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg"
        >
            <h2 class="mb-2 text-lg font-semibold text-gray-900">
                Apakah kamu yakin ingin menghapus akun ini?
            </h2>

            <p class="mb-4 text-sm text-gray-500">
                Setelah akun dihapus, semua data akan hilang permanen.
                Masukkan password untuk konfirmasi.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        placeholder="Masukkan password kamu"
                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm
                               focus:border-red-500 focus:ring-red-500
                               @error('password', 'userDeletion') border-red-500 @enderror"
                    >
                    @error('password', 'userDeletion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <button
                        type="button"
                        @click="open = false"
                        class="rounded-md border border-gray-300 px-4 py-2 text-sm
                               hover:bg-gray-50"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white
                               hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
