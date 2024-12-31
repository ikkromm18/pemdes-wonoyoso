@extends('layouts.dashboard')
@section('title', 'Data User')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <div class="flex flex-wrap justify-center gap-6 text-gray-700 p-4 md:p-8">

            <div
                class="max-w-72 p-6 w-full border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between items-center">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight ">Pengajuan Surat</h5>
                    <p class="font-semibold text-xl ">{{ $jumlahpengajuan }}</p>
                </div>

            </div>

            <div
                class="max-w-72 p-6 w-full border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between items-center">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight ">Jumlah User</h5>
                    <p class="font-semibold text-xl ">{{ $jumlahuser }}</p>
                </div>
            </div>

            <div
                class="max-w-72 p-6 w-full border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex justify-between items-center">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight ">Jenis Surat</h5>
                    <p class="font-semibold text-xl ">{{ $jumlahjenissurat }}</p>
                </div>
            </div>


        @endsection
