<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Koleksi') }}
      </h2>
  </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="/koleksiStore">
                    @csrf
        
                    <!-- Judul -->
                    <div>
                        <x-input-label for="nama" :value="__('Judul')" />
        
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
        
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Jenis -->
                    <div>
                        <x-input-label for="jenis" :value="__('Jenis')" />
        
                        <select id="jenis" name="jenis" class="form-select" required>
                              <option>Pilih salah satu</option>
                              <option value="1">Buku</option>
                              <option value="2">Majalah</option>
                              <option value="3">Cakram Digital</option>
                          </select>
        
                        <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                    </div>

                    <!-- Jumlah -->
                    <div>
                        <x-input-label for="jumlahAwal" :value="__('Jumlah')" />
        
                        <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="number" name="jumlahAwal" :value="old('jumlahAwal')" min="1" required />
        
                        <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button type="reset" class="ml-4">
                            {{ __('Reset') }}
                        </x-primary-button>

                        <x-primary-button class="ml-4">
                            {{ __('Tambah Koleksi') }}
                        </x-primary-button>
                    </div>
                </form>
        
              </div>
          </div>
        </div>
  </div>
</x-app-layout>


<!-- RAFA SURYAPUTRA - 6706223162 -->