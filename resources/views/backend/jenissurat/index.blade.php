@extends('layouts.dashboard')
@section('title', 'Admin')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <x-breadcrumb title="Jenis Surat" dashboard="Dashboard" pagename="Jenis Surat" />

        @include('components.alert')

        <div class="p-4 bg-white dark:bg-gray-900">

            <a href="{{ route('jenissurat.create') }}" class="btn bg-slate-700 text-white mb-5">+ Tambah Jenis Surat</a>

            <x-search route="{{ route('jenissurat') }}" name='search' placeholder="Cari Data Jenis Surat" />

        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>


                    <th scope="col" class="px-6 py-3 ">
                        No
                    </th>

                    <th scope="col" class="px-6 py-3 ">
                        Jenis Surat
                    </th>

                    <th scope="col" class="px-6 py-3 ">
                        Action
                    </th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>

                @foreach ($jenisSurats as $js)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ($jenisSurats->currentPage() - 1) * $jenisSurats->perPage() + $loop->iteration }}
                        </th>

                        <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $js->nama_jenis }}
                        </th>
                        {{-- <td class="px-6 py-4">
                            {{ $js->id }}
                        </td> --}}

                        <td class="px-6 py-4 flex gap-4 md:gap-8">
                            <a href="{{ route('jenissurat.edit', $js->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('jenissurat.delete', $js->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Hapus
                                </button>
                            </form>
                            {{-- <a href="{{ route('jenissurat.delete', $js->id) }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">hapus</a> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $jenisSurats->appends(['search' => request('search')])->links() }}
    </div>


@endsection
