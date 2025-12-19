{{-- resources/views/profile/partials/update-profile-information-form.blade.php --}}

<p class="mb-4 text-sm text-gray-500">
    Perbarui informasi profil dan alamat email kamu.
</p>

{{-- Send Email Verification --}}
<!-- <form id="send-verification" method="post" action="
    // @csrf
</form> -->

<form method="post" action="{{ route('profile.update') }}" class="space-y-5">
    @csrf
    @method('put')

    {{-- Nama --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">
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
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500
            @error('name') border-red-500 @enderror"
        >
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">
            Email
        </label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email', $user->email) }}"
            required
            autocomplete="username"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500
            @error('email') border-red-500 @enderror"
        >
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

        {{-- Email Verification Notice --}}
      
    </div>

    {{-- Phone --}}
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">
            Nomor Telepon
        </label>
        <input
            type="tel"
            name="phone"
            id="phone"
            value="{{ old('phone', $user->phone) }}"
            placeholder="08xxxxxxxxxx"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500
            @error('phone') border-red-500 @enderror"
        >
        @error('phone')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
        <p class="mt-1 text-xs text-gray-500">
            Format: 08xxxxxxxxxx atau +628xxxxxxxxxx
        </p>
    </div>

    {{-- Address --}}
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700">
            Alamat Lengkap
        </label>
        <textarea
            name="address"
            id="address"
            rows="3"
            placeholder="Alamat lengkap untuk pengiriman"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500
            @error('address') border-red-500 @enderror"
        >{{ old('address', $user->address) }}</textarea>
        @error('address')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button
            type="submit"
            class="inline-flex items-center rounded-md bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            Simpan Informasi
        </button>
    </div>
</form>
