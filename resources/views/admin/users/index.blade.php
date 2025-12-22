@extends('layouts.admin')

@section('title', 'Users')
@section('page-title', 'Manajemen User')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold">Daftar User</h2>
        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($users as $user)
                    <tr>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-xs
                                {{ $user->role === 'admin'
                                    ? 'bg-red-100 text-red-700'
                                    : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="text-blue-600 hover:underline">
                                Edit
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.users.destroy', $user) }}"
                                  onsubmit="return confirm('Yakin hapus user?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Belum ada user
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
