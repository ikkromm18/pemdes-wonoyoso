@extends('layouts.master')
@section('title', 'login')
@section('content')
    <div class="flex items-center justify-center pt-8">
        <!-- Session Status -->
        <div class="w-full px-6 py-4 mx-auto mt-6 overflow-hidden bg-white shadow-lg sm:max-w-md sm:rounded-lg">

            @include('components.alert')
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="flex mx-auto mb-4 w-36">
                <img src="./logo.png" alt="Logo Pemdes">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <div class="flex items-center justify-end gap-2 mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __('Sign Up') }}
                    </a>
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>

                </div>
            </form>

        </div>
    </div>
@endsection
