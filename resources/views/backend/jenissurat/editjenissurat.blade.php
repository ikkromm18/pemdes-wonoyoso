@extends('layouts.dashboard')
@section('title', 'Edit Jenis Surat')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <x-bread-crumb2 title="Edit Jenis Surat" dashboard="Dashboard" pagename="Jenis Surat"
            subpagename="Edit Data Jenis Surat" />

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
