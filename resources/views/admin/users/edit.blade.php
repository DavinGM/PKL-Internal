@extends('layouts.admin')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-4xl">

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @method('PUT')
        @include('admin.users._form', ['user' => $user])
    </form>

</div>
@endsection
