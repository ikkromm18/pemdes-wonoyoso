@extends('layouts.dashboard')
@section('title', 'Edit Jenis Surat')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <div class="md:flex md:justify-between justify-center items-center px-4">
            <h1 class="text-3xl font-semibold text-center mb-5">Edit Jenis Surat</h1>
            <nav class="flex mb-4 md:m-0 justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Jenis
                                Surat</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit Jenis
                                Surat</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <form class="p-4 md:p-5" action="{{ route('jenissurat.update', $jenisSurats->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $jenisSurats->id }}">



            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="nama_jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Jenis Surat</label>
                    <input id="nama_jenis" rows="4" type="text"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Nema Jenis Surat..." name="nama_jenis" value="{{ $jenisSurats->nama_jenis }}">
                </div>
            </div>

            <div class="flex justify-start mt-6 gap-2">
                {{-- <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button> --}}

                <x-primary-button href="" class="bg-primary">
                    Update
                </x-primary-button>


                <a href="{{ route('jenissurat') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>

            </div>

        </form>

    </div>


@endsection
