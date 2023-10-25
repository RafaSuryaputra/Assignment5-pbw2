@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('koleksi.daftarKoleksi') }}">
                        @csrf

                        
                        <div class="row mb-3">
                            <label for="namaKoleksi" class="col-md-4 col-form-label text-md-end">{{ __('namaKoleksi') }}</label>

                            <div class="col-md-6">
                                <input id="namaKoleksi" type="text" class="form-control @error('namaKoleksi') is-invalid @enderror" name="namaKoleksi" value="{{ old('namaKoleksi') }}" required autocomplete="namaKoleksi" autofocus>

                                @error('namaKoleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <!-- Jenis Koleksi -->
        <div class="row mb-3">
                            <label for="jenisKoleksi" class="col-md-4 col-form-label text-md-end">{{ __('jenisKoleksi') }}</label>

                            <div class="col-md-6">
                            <select id="jenisKoleksi" type="integer" name="jenisKoleksi" :value="old('jenisKoleksi')" required autofocus autocomplete="jenisKoleksi" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option disabled selected>Pilih Jenis Koleksi</option>
                                <option value="1" {{ old('jenisKoleksi') == '1' ? 'selected' : '' }}>Buku</option>
                                <option value="2" {{ old('jenisKoleksi') == '2' ? 'selected' : '' }}>Majalah</option>
                                <option value="3" {{ old('jenisKoleksi') == '3' ? 'selected' : '' }}>Cakram Digital</option>
                            </select>
                                @error('jenisKoleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <!-- Jumlah Koleksi -->
        <div class="row mb-3">
                            <label for="jumlahKoleksi" class="col-md-4 col-form-label text-md-end">{{ __('jumlahKoleksi') }}</label>

                            <div class="col-md-6">
                                <input id="jumlahKoleksi" type="text" class="form-control @error('jumlahKoleksi') is-invalid @enderror" name="jumlahKoleksi" value="{{ old('jumlahKoleksi') }}" required autocomplete="jumlahKoleksi" autofocus>

                                @error('jumlahKoleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/koleksi') }}">
                {{ __('Dashboard Collection') }}
            </a>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

<!-- RAFA SURYAPUTRA - 6706223162 -->
