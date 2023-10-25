@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informasi Koleksi</h1>
    <p><strong>Nama Koleksi:</strong> {{ $collection->namaKoleksi }}</p>
    <p><strong>Jenis Koleksi:</strong>
        @if ($collection->jenisKoleksi === 1)
            Buku
        @elseif ($collection->jenisKoleksi === 2)
            Majalah
        @elseif ($collection->jenisKoleksi === 3)
            Cakram Digital
        @else
            Unknown
        @endif
    </p>
    <p><strong>Jumlah Koleksi:</strong> {{ $collection->jumlahKoleksi }}</p>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/koleksi') }}">
                {{ __('Dashboard') }}
            </a>
        </div>
</div>
@endsection

<!-- RAFA SURYAPUTRA - 6706223162 -->
