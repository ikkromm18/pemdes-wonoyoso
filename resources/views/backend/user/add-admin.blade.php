@extends('layouts.dashboard')
@section('title', 'Tambah Admin')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-bread-crumb2 title="Tambah Data Admin" dashboard="Dashboard" pagename="User" subpagename="tambah Admin User" />

        <form class="p-4 md:p-5" action="{{ route('user.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Admin</label>
                    <input id="name" rows="4" type="text"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Nema Admin ...." name="name">

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email</label>
                    <input id="email" rows="4" type="email"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Email..." name="email">

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nomor HP/WA</label>
                    <input id="nomor_hp" rows="4" type="tel"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Nomor WA..." name="nomor_hp">

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password</label>
                    <input id="password" rows="4" type="password"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Password..." name="password">

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password</label>
                    <input id="password" rows="4" type="password"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Konfirmasi Password" name="password_confirmation" autocomplete="new-password">

                </div>
            </div>




            <div class="flex justify-start gap-2 mt-6">


                <x-primary-button class="bg-primary">
                    Simpan
                </x-primary-button>


                <a href="{{ route('user.admin') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>

            </div>

        </form>

    </div>


@endsection
