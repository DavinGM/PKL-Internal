{{-- resources/views/profile/partials/update-password-form.blade.php --}}

<p class="mb-4 text-sm text-gray-500">
    Pastikan akun kamu aman dengan menggunakan password yang panjang dan acak.
</p>

<form method="post" action="{{ route('profile.password.update') }}">
    @csrf
    @method('patch')

    {{-- Current Password --}}
    <div>
        <label for="current_password" class="block text-sm font-medium text-gray-700">
            Password Saat Ini
        </label>
        <input
            type="password"
            name="current_password"
            id="current_password"
            autocomplete="current-password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm
                   focus:border-blue-500 focus:ring-blue-500
                   @error('current_password', 'updatePassword') border-red-500 @enderror"
        >
        @error('current_password', 'updatePassword')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- New Password --}}
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">
            Password Baru
        </label>
        <input
            type="password"
            name="password"
            id="password"
            autocomplete="new-password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm
                   focus:border-blue-500 focus:ring-blue-500
                   @error('password', 'updatePassword') border-red-500 @enderror"
        >
        @error('password', 'updatePassword')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
            Konfirmasi Password Baru
        </label>
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            autocomplete="new-password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm
                   focus:border-blue-500 focus:ring-blue-500
                   @error('password_confirmation', 'updatePassword') border-red-500 @enderror"
        >
        @error('password_confirmation', 'updatePassword')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <button
            type="submit"
            class="rounded-md bg-blue-600 px-5 py-2 text-sm font-semibold text-white
                   hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            Update Password
        </button>

        @if (session('status') === 'password-updated')
            <span
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 2000)"
                x-show="show"
                class="text-sm font-medium text-green-600"
            >
                Saved.
            </span>
        @endif
    </div>
</form>
