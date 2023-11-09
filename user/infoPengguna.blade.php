<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Info Pengguna') }}
      </h2>
  </x-slot>

<!-- RAFA SURYAPUTRA - 6706223162 -->

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ url('userUpdate') }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    @csrf
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
        
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" autocomplete="off" value="{{ $user->username }}" readonly/>
        
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
        
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" autocomplete="off" value="{{ $user->email }}" readonly/>
        
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />
        
                        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" autocomplete="off" value="{{ $user->birthdate }}" readonly/>
        
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="fullname" :value="__('Nama Lengkap')" />
        
                        <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}" autocomplete="off"/>
        
                        <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password Baru')" />
        
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="off"/>
        
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="address" :value="__('Alamat')" />
        
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ old('address', $user->address) }}" autocomplete="off"/>
        
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="phoneNumber" :value="__('No Telepon')" />
        
                        <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" value="{{ old('phoneNumber', $user->phoneNumber) }}" autocomplete="off"/>
        
                        <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
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
