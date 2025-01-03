@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- NIK --}}
            <div class="mt-4">
                <x-input-label for="nik" :value="__('NIK')" />
                <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik" :value="old('nik')"
                    required autocomplete="nik" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                    required autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            {{-- Foto KTP dan KK --}}
            <div class="mt-4">
                <x-input-label for="foto_ktp" :value="__('Foto KTP')" />
                <x-text-input id="foto_ktp" foto_ktp="foto_ktp" type="file" class="mt-1 block w-full" name="foto_ktp" />
                <x-input-error class="mt-2" :messages="$errors->get('foto_ktp')" />

                <!-- Area Default Dropzone -->
                <div id="default-dropzone1" class="mt-2 text-sm text-gray-500">
                    {{ __('Belum ada foto') }}
                </div>

                <!-- Area Preview -->
                <img id="image-preview1" src="#" alt="Preview Foto KTP" class="mt-2 w-32 hidden rounded" />
            </div>

            <div class="mt-4">
                <x-input-label for="foto_kk" :value="__('Foto KK')" />
                <x-text-input id="foto_kk" foto_kk="foto_kk" type="file" class="mt-1 block w-full" name="foto_kk" />
                <x-input-error class="mt-2" :messages="$errors->get('foto_kk')" />

                <!-- Area Default Dropzone -->
                <div id="default-dropzone2" class="mt-2 text-sm text-gray-500">
                    {{ __('Belum ada foto') }}
                </div>

                <!-- Area Preview -->
                <img id="image-preview2" src="#" alt="Preview Foto KK" class="mt-2 w-32 hidden rounded" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

    <script>
        function previewImage(inputId, previewId, dropzoneId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const dropzone = document.getElementById(dropzoneId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        dropzone.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Initialize preview functions for Foto KTP and Foto KK
        previewImage('foto_ktp', 'image-preview1', 'default-dropzone1');
        previewImage('foto_kk', 'image-preview2', 'default-dropzone2');
    </script>

@endsection
