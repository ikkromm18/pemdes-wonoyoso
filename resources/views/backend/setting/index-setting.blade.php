@extends('layouts.dashboard')
@section('title', 'Edit Setting')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-bread-crumb2 title="Edit Data Admin" dashboard="Dashboard" pagename="User" subpagename="Edit Admin User" />

        @include('components.alert')


        <form class="p-4 md:p-5" action="{{ route('setting.update', $layout->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">
                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Kepala Desa</label>
                    <input id="name" rows="4" type="text"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Nema Kepala Desa" name="nama_kepala_desa"
                        value="{{ $layout->nama_kepala_desa }}">

                </div>
            </div>

            <div class="flex justify-start gap-2 mt-6">
                {{-- <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button> --}}

                <x-primary-button href="" class="bg-primary">
                    Update
                </x-primary-button>




            </div>

        </form>

    </div>


@endsection
