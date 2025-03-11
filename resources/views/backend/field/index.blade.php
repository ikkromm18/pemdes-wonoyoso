@extends('layouts.dashboard')
@section('title', 'Admin')
@section('admin')



    <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

        <x-breadcrumb title="Data Field Surat" dashboard="Dashboard" pagename="Field" />

        @include('components.alert')

        <a href="{{ route('field.create') }}" class="mb-5 text-white btn bg-slate-700">+ Tambah Field</a>

        <x-search route="{{ route('field') }}" name='search' placeholder="Cari Data Berdasarkan Nama Field" />

        <table class="w-full mt-4 mb-2 text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Jenis Surat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Field
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipe Field
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Wajib Diisi
                    </th>


                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($field as $f)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $f->JenisSurats->nama_jenis }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $f->nama_field }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $f->tipe_field }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $f->is_required == 1 ? 'Ya' : 'Tidak' }}
                        </td>

                        <td class="flex gap-4 px-6 py-4 md:gap-8">
                            <a href="{{ route('field.edit', $f->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('field.delete', $f->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $field->appends(['search' => request('search')])->links() }}
    </div>


@endsection
