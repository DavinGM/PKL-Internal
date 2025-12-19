@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')
@section('content')

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @method('PUT')
        @include('admin.products._form')
        <div class="mt-4 flex justify-end gap-2">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>

@endsection
