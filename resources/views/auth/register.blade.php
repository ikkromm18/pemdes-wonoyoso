@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf

            <div class="grid w-full grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- NIK -->
                <div>
                    <x-input-label for="nik" :value="__('NIK')" />
                    <x-text-input id="nik" class="block w-full mt-1" type="tel" name="nik" :value="old('nik')"
                        required autocomplete="nik" />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                <!-- Nomor HP -->
                <div>
                    <x-input-label for="nomor_hp" :value="__('Nomor WA atau HP')" />
                    <x-text-input id="nomor_hp" class="block w-full mt-1" type="number" name="nomor_hp" :value="old('nomor_hp')"
                        required autocomplete="nomor_hp" />
                    <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                </div>

                <!-- Agama -->
                <div>
                    <x-input-label for="agama" :value="__('Agama')" />
                    <x-text-input id="agama" class="block w-full mt-1" type="text" name="agama" :value="old('agama')"
                        required autocomplete="agama" />
                    <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                </div>

                <!-- Pekerjaan -->
                <div>
                    <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                    <x-text-input id="pekerjaan" class="block w-full mt-1" type="text" name="pekerjaan"
                        :value="old('pekerjaan')" required autocomplete="pekerjaan" />
                    <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
                </div>

                <!-- Tempat Lahir -->
                <div>
                    <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                    <x-text-input id="tempat_lahir" class="block w-full mt-1" type="text" name="tempat_lahir"
                        :value="old('tempat_lahir')" required autocomplete="tempat_lahir" />
                    <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
                    <x-text-input id="tgl_lahir" class="block w-full mt-1" type="date" name="tgl_lahir"
                        :value="old('tgl_lahir')" required autocomplete="tgl_lahir" />
                    <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="alamat_utama" :value="__('Alamat Utama (Sertakan No. Rumah, RT dan RW)')" />
                    <x-text-input id="alamat_utama" class="block w-full mt-1" type="text" name="alamat_utama"
                        :value="old('alamat_utama')" required autocomplete="alamat_utama" />
                    <x-input-error :messages="$errors->get('alamat_utama')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="alamat_kedua" :value="__('Alamat Kedua (Opsional)')" />
                    <x-text-input id="alamat_kedua" class="block w-full mt-1" type="text" name="alamat_kedua"
                        :value="old('alamat_kedua')" autocomplete="alamat_kedua" />
                    <x-input-error :messages="$errors->get('alamat_kedua')" class="mt-2" />
                </div>
            </div>

            <!-- Foto KTP dan KK -->
            <div class="grid grid-cols-1 gap-6 mt-4">
                <div>
                    <x-input-label for="foto_ktp" :value="__('Foto KTP')" />
                    <x-text-input id="foto_ktp" type="file" class="block w-full mt-1" name="foto_ktp" />
                    <x-input-error class="mt-2" :messages="$errors->get('foto_ktp')" />
                    <img id="image-preview1" src="#" alt="Preview Foto KTP" class="hidden w-32 mt-2 rounded" />
                </div>
                <div>
                    <x-input-label for="foto_kk" :value="__('Foto KK')" />
                    <x-text-input id="foto_kk" type="file" class="block w-full mt-1" name="foto_kk" />
                    <x-input-error class="mt-2" :messages="$errors->get('foto_kk')" />
                    <img id="image-preview2" src="#" alt="Preview Foto KK" class="hidden w-32 mt-2 rounded" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

    <script>
        function previewImage(inputId, previewId) {
            document.getElementById(inputId).addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById(previewId);
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        previewImage('foto_ktp', 'image-preview1');
        previewImage('foto_kk', 'image-preview2');
    </script>
@endsection
