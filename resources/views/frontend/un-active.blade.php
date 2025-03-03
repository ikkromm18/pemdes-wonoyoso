@extends('layouts.master')
@section('title', 'User Belum Diaktifkan')
@section('content')



    <section class="bg-white ">
        <div class="flex flex-col items-center justify-center min-h-screen px-4 py-8 mx-auto text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Akun Belum Diaktivasi Oleh Admin</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Jika Akun Belum
                Diaktivasi Dalam Waktu Satu Hari Silahkan Hubungi Admin Melalui Nomor HP/WA. 082134885973</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

                <a href="{{ route('home') }}"
                    class="px-5 py-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:ms-4 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Kembali
                </a>
            </div>
        </div>
    </section>


@endsection
