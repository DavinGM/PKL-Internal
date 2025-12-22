@extends('layouts.admin')

@section('title', 'Tambah User')
@section('page-title', 'Tambah User')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-4xl">

    <form method="POST" action="{{ route('admin.users.store') }}">
        @include('admin.users._form')
    </form>

</div>
@endsection
