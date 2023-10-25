@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Informasi Pengguna</h1>
    <p><strong>Name:</strong> {{ $user->fullname }}</p>
    <p><strong>User Name:</strong> {{ $user->username }}</p>
    <p><strong>Gender:</strong>
        @if ($user->gender === 0)
            Male
        @elseif ($user->gender === 1)
            Female
        @else
            Unknown
        @endif
    </p>
    <p><strong>Birth Date:</strong> {{ $user->birthdate }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Address:</strong> {{ $user->address }}</p>
    <p><strong>Created At:</strong> {{ $user->created_at }}</p>
    <p><strong>Phone Number:</strong> {{ $user->phoneNumber }}</p>
    <p><strong>Religion:</strong> {{ $user->religion }}</p>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/koleksi') }}">
                {{ __('Dashboard') }}
            </a>
    </div>
</div>
@endsection

<!-- RAFA SURYAPUTRA - 6706223162 -->
