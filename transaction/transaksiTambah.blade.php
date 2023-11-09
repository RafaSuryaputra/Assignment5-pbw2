<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>

<!-- RAFA SURYAPUTRA - 6706223162 -->

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-success">
                            <div class="row form-inline" onclick="$(this).parent().remove();">
                                <ul>
                                    @foreach ($errors->all as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <span class="label"><strong>x</strong></span>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('transaksiStore') }}">
                    @csrf

                    <!-- Peminjam -->
                    <div>
                        <x-input-label for="idPeminjam" :value="__('Peminjam')" />
        
                        <select id="idPeminjam" name="idPeminjam" class="form-select" required>
                              <option>--Pilih dahulu--</option>
                              @foreach ($users as $user)
                                @if ($user->id == old('userPeminjam'))
                                    <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>    
                                @else
                                    <option value="{{ $user->id }}">{{ $user->fullname }}</option>      
                                @endif
                              @endforeach
                          </select>
        
                        <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
                    </div>

                    <!-- Koleksi1 -->
                    <div>
                        <x-input-label for="koleksi1" :value="__('Koleksi1')" />
        
                        <select id="koleksi1" name="koleksi1" class="form-select" required>
                              <option value="-1">--Pilih dahulu--</option>
                              @foreach ($collections as $collection)
                                @if ($collection->id == old('koleksi1'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->nama }}</option>    
                                @else
                                    <option value="{{ $collection->id }}">{{ $collection->nama }}</option>      
                                @endif
                              @endforeach
                          </select>
        
                        <x-input-error :messages="$errors->get('koleksi1')" class="mt-2" />
                    </div>

                    <!-- Koleksi2 -->
                    <div>
                        <x-input-label for="koleksi2" :value="__('Koleksi2')" />
        
                        <select id="koleksi2" name="koleksi2" class="form-select" required>
                              <option value="-1">--Pilih dahulu--</option>
                              @foreach ($collections as $collection)
                                @if ($collection->id == old('koleksi2'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->nama }}</option>    
                                @else
                                    <option value="{{ $collection->id }}">{{ $collection->nama }}</option>      
                                @endif
                              @endforeach
                          </select>
        
                        <x-input-error :messages="$errors->get('koleksi2')" class="mt-2" />
                    </div>

                    <!-- Koleksi3 -->
                    <div>
                        <x-input-label for="koleksi3" :value="__('Koleksi3')" />
        
                        <select id="koleksi3" name="koleksi3" class="form-select" required>
                              <option value="-1">--Pilih dahulu--</option>
                              @foreach ($collections as $collection)
                                @if ($collection->id == old('koleksi3'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->nama }}</option>    
                                @else
                                    <option value="{{ $collection->id }}">{{ $collection->nama }}</option>      
                                @endif
                              @endforeach
                          </select>
        
                        <x-input-error :messages="$errors->get('koleksi2')" class="mt-2" />
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button type="reset" class="ml-4">
                            {{ __('Reset') }}
                        </x-primary-button>

                        <x-primary-button class="ml-4">
                            {{ __('Ok') }}
                        </x-primary-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
