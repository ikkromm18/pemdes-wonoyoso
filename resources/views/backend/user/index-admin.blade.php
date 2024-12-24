@extends('layouts.dashboard')
@section('title', 'Data User')
@section('admin')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <x-breadcrumb title="Data Admin" dashboard="Dashboard" pagename="User Admin" />

        @include('components.alert')

        <div class="p-4 bg-white dark:bg-gray-900">
            {{-- <a href="{{ route('field.create') }}" class="btn bg-slate-700 text-white mb-5">+ Tambah Field Surat</a> --}}
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4 flex gap-4 md:gap-8">
                            <a href="{{ route('user.edit', $user->id) }}"
                                class="font-medium text-blue-600  hover:underline">Edit</a>

                            <a href="{{ route('user.editpassword', $user->id) }}"
                                class="font-medium text-blue-600  hover:underline">Ubah Password</a>
                            {{-- <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                            </form> --}}

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $users->links() }}
    </div>


@endsection
