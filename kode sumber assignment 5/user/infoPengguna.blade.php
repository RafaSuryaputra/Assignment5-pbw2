@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $user->id }}" readonly>
                            </div>
                        </div>
<!-- RAFA SURYAPUTRA - 6706223162 -->
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullname" class="col-md-4 col-form-label text-md-end">{{ __('fullname') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ $user->fullname }}" required autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="religion" class="col-md-4 col-form-label text-md-end">{{ __('religion') }}</label>

                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ $user->religion }}" required autocomplete="religion" autofocus>

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-end">{{ __('phoneNumber') }}</label>

                            <div class="col-md-6">
                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $user->phoneNumber }}" required autocomplete="phoneNumber" autofocus>

                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $user->birthdate }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('gender') }}</label>

                            <div class="col-md-6">
                            <select id="gender" type="integer" name="gender" :value="old('gender')" required autofocus autocomplete="gender" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="0" {{ old('gender', $user->gender) == '0' ? 'selected' : '' }}>Male</option>
                                <option value="1" {{ old('gender', $user->gender) == '1' ? 'selected' : '' }}>Female</option>
                            </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/user') }}">
                            {{ __('Dashboard Collection') }}
                        </a>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
