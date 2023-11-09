<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrasi Pengguna') }}
        </h2>
    </x-slot>

<!-- RAFA SURYAPUTRA - 6706223162 -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('userStore') }}">
                    @csrf

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />

                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="off"/>

                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    
                    <!-- Nama Lengkap -->
                    <div>
                        <x-input-label for="fullname" :value="__('Nama Lengkap')" />

                        <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="off"/>

                        <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="off" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Re-Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Re-Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Alamat -->
                    <div>
                        <x-input-label for="address" :value="__('Alamat')" />

                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="off"/>

                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <x-input-label for="birthDate" :value="__('Tanggal Lahir')" />

                        <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required autofocus autocomplete="off"/>

                        <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
                    </div>

                    <!-- No Telephone -->
                    <div>
                        <x-input-label for="phoneNumber" :value="__('No Telephone')" />

                        <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" required autofocus autocomplete="off"/>

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


