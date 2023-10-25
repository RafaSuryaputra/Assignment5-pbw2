@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('koleksi.update', $collection) }}">
                        @csrf
                       
                        
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $collection->id }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="namaKoleksi" class="col-md-4 col-form-label text-md-end">{{ __('namaKoleksi') }}</label>
                            <div class="col-md-6">
                                <input id="namaKoleksi" class="form-control" name="namaKoleksi" value="{{ $collection->namaKoleksi }}" readonly>
                                
                            </div>
                        </div>

        <!-- Jenis Koleksi -->
        <div class="row mb-3">
                            <label for="jenisKoleksi" class="col-md-4 col-form-label text-md-end">{{ __('jenisKoleksi') }}</label>

                            <div class="col-md-6">
                            <select id="jenisKoleksi" type="integer" name="jenisKoleksi" :value="old('jenisKoleksi')" required autofocus autocomplete="jenisKoleksi" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option disabled selected>Pilih Jenis Koleksi</option>
                                <option value="1" {{ old('jenisKoleksi', $collection->jenisKoleksi) == '1' ? 'selected' : '' }}>Buku</option>
                                <option value="2" {{ old('jenisKoleksi', $collection->jenisKoleksi) == '2' ? 'selected' : '' }}>Majalah</option>
                                <option value="3" {{ old('jenisKoleksi', $collection->jenisKoleksi) == '3' ? 'selected' : '' }}>Cakram Digital</option>
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
                                <input id="jumlahKoleksi" type="text" class="form-control @error('jumlahKoleksi') is-invalid @enderror" name="jumlahKoleksi" value="{{ old('namaKoleksi',$collection->jumlahKoleksi) }}" readonly>

                                @error('jumlahKoleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Jumlah Koleksi Sisa-->
                        <div class="row mb-3">
                            <label for="jumlahSisa" class="col-md-4 col-form-label text-md-end">{{ __('jumlah Sisa') }}</label>

                            <div class="col-md-6">
                                <input id="jumlahSisa" type="text" class="form-control @error('jumlahSisa') is-invalid @enderror" name="jumlahSisa" value="{{ old('namaKoleksi',$collection->jumlahSisa) }}" required autocomplete="jumlahSisa" autofocus>

                                @error('jumlahSisa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Jumlah Keluar-->
                        <div class="row mb-3">
                            <label for="jumlahKeluar" class="col-md-4 col-form-label text-md-end">{{ __('jumlah Keluar') }}</label>

                            <div class="col-md-6">
                                <input id="jumlahKeluar" type="text" class="form-control @error('jumlahKeluar') is-invalid @enderror" name="jumlahKeluar" value="{{ old('namaKoleksi',$collection->jumlahKeluar) }}" required autocomplete="jumlahKeluar" autofocus>

                                @error('jumlahKeluar')
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


<!-- RAFA SURYAPUTRA - 6706223162 -->