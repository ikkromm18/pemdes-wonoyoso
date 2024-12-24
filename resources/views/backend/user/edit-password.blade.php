@extends('layouts.dashboard')
@section('title', 'Edit Admin')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-bread-crumb2 title="Ubah Sandi" dashboard="Dashboard" pagename="User" subpagename="Ubah Sandi" />

        <form class="p-4 md:p-5" action="{{ route('user.updatepassword', $user->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="oldpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masukkan Password Lama
                    </label>
                    <input id="oldpassword" type="password" name="oldpassword"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('oldpassword') border-red-500 @enderror"
                        value="">
                    @error('oldpassword')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="newpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masukkan Password Baru
                    </label>
                    <input id="newpassword" type="password" name="newpassword"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('newpassword') border-red-500 @enderror"
                        value="">
                    @error('newpassword')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="konfirmpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Konfirmasi Password Baru
                    </label>
                    <input id="konfirmpassword" type="password" name="konfirmpassword"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('konfirmpassword') border-red-500 @enderror"
                        value="">
                    @error('konfirmpassword')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-start mt-6 gap-2">
                <button type="submit"
                    class="py-2.5 px-5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                    Simpan
                </button>

                <a href="{{ route('user.admin') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Kembali
                </a>
            </div>
        </form>


    </div>


@endsection
