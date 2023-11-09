<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Info Koleksi') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ url('koleksiUpdate') }}">
                    @csrf
                    <div>
                        <x-input-label for="id" :value="__('ID Koleksi*')" />
        
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" autocomplete="off" value="{{ $collection->id }}" readonly/>
        
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="nama" :value="__('Judul Koleksi*')" />
        
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" autocomplete="off" value="{{ $collection->nama }}" readonly/>
        
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="jenis" :value="__('Jenis*')" />
        
                        <select id="jenis" name="jenis" class="form-select" required>
                              <option value="-1" @if (old('jenis', $collection->jenis) == -1) selected @endif>Pilih satu</option>
                              <option value="1" @if (old('jenis', $collection->jenis) == 1) selected @endif>Buku</option>
                              <option value="2" @if (old('jenis', $collection->jenis) == 2) selected @endif>Majalah</option>
                              <option value="3" @if (old('jenis', $collection->jenis) == 3) selected @endif>Cakram Digital</option>
                          </select>
        
                        <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="jumlahAwal" :value="__('Jumlah Awal*')" />
        
                        <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="number" name="jumlahAwal" value="{{ $collection->jumlahAwal }}" readonly autocomplete="off" min="0"/>
        
                        <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="jumlahSisa" :value="__('Jumlah Sisa*')" />
        
                        <x-text-input id="jumlahSisa" class="block mt-1 w-full" type="number" name="jumlahSisa" value="{{ old('nama', $collection->jumlahSisa) }}" autocomplete="off" min="0"/>
        
                        <x-input-error :messages="$errors->get('jumlahSisa')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="jumlahKeluar" :value="__('Jumlah Keluar*')" />
        
                        <x-text-input id="jumlahKeluar" class="block mt-1 w-full" type="number" name="jumlahKeluar" value="{{ old('nama', $collection->jumlahKeluar) }}" autocomplete="off" min="1"/>
        
                        <x-input-error :messages="$errors->get('jumlahKeluar')" class="mt-2" />
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


<!-- RAFA SURYAPUTRA - 6706223162 -->