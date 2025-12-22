@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Nama --}}
    <div>
        <label class="block text-sm font-medium mb-1">Nama</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name ?? '') }}"
            required
            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
        >
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email ?? '') }}"
            required
            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
        >
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>



    {{-- Role --}}
    <div>
        <label class="block text-sm font-medium mb-1">Role</label>
        <select
            name="role"
            required
            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
        >
            <option value="customer"
                {{ old('role', $user->role ?? '') === 'customer' ? 'selected' : '' }}>
                Customer
            </option>
            <option value="admin"
                {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>
                Admin
            </option>
        </select>
        @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Phone --}}
    <div>
        <label class="block text-sm font-medium mb-1">No. HP</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone', $user->phone ?? '') }}"
            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
        >
    </div>

    {{-- Address --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Alamat</label>
        <textarea
            name="address"
            rows="3"
            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
        >{{ old('address', $user->address ?? '') }}</textarea>
    </div>

</div>

{{-- Action --}}
<div class="flex justify-end gap-2 mt-6">
    <a href="{{ route('admin.users.index') }}"
       class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
        Batal
    </a>
    <button
        type="submit"
        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Simpan
    </button>
</div>
