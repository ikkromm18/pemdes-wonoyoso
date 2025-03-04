@extends('layouts.dashboard')
@section('title', 'Tambah Field')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


        <x-bread-crumb2 title="Edit Field" dashboard="Dashboard" pagename="Field" subpagename="Edit Field" />



        <form class="p-4 md:p-5" action="{{ route('field.update', $fields->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="nama_field" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Surat</label>
                    <select id="jenis_surat_id" name="jenis_surat_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Pilih Field</option>
                        @foreach ($jenissurat as $js)
                            <option value="{{ $js->id }}" {{ $js->id == $fields->jenis_surat_id ? 'selected' : '' }}
                                {{ old('jenis_surat_id' == $js->id ? 'selected' : '') }}>
                                {{ $js->nama_jenis }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="nama_field" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Field</label>
                    <input id="nama_field" rows="4" type="text"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Masukkan Nema Field" name="nama_field" value="{{ $fields->nama_field }}">
                </div>
            </div>

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="tipe_field" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tipe Field</label>
                    <select id="tipe_field" name="tipe_field"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Pilih Field</option>
                        <option value="text"{{ $fields->tipe_field == 'text' ? 'selected' : '' }}
                            {{ old('tipe_field' == 'text' ? 'selected' : '') }}>Text</option>
                        <option value="number" {{ $fields->tipe_field == 'number' ? 'selected' : '' }}
                            {{ old('tipe_field' == 'number' ? 'selected' : '') }}>Number</option>
                        <option value="date"
                            {{ $fields->tipe_field == 'date' ? 'selected' : '' }}{{ old('tipe_field' == 'date' ? 'selected' : '') }}>
                            Date</option>
                        <option value="time"
                            {{ $fields->tipe_field == 'time' ? 'selected' : '' }}{{ old('tipe_field' == 'time' ? 'selected' : '') }}>
                            Time</option>
                        <option value="boolean" {{ $fields->tipe_field == 'boolean' ? 'selected' : '' }}
                            {{ old('tipe_field' == 'boolean' ? 'selected' : '') }}>Boolean</option>
                        <option value="email" {{ $fields->tipe_field == 'email' ? 'selected' : '' }}
                            {{ old('tipe_field' == 'email' ? 'selected' : '') }}>Email</option>

                    </select>
                </div>
            </div>

            <div class="grid gap-4 mb-4 md:grid-cols-4 grid-cols-1">
                <div class="col-span-2">
                    <label for="is_required" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Wajib Diisi</label>
                    <select id="is_required" name="is_required"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Pilih Field</option>
                        <option value=1 {{ $fields->is_required == 1 ? 'selected' : '' }}
                            {{ old('is_required' == true ? 'selected' : '') }}>Ya</option>
                        <option value=0 {{ $fields->is_required == 0 ? 'selected' : '' }}
                            {{ old('is_required' == false ? 'selected' : '') }}>Tidak</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-start mt-6 gap-2">


                <x-primary-button href="" class="bg-primary">
                    Update
                </x-primary-button>


                <a href="{{ route('field') }}"
                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>

            </div>

        </form>

    </div>


@endsection
