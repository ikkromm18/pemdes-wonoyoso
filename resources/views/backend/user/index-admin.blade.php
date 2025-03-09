@extends('layouts.dashboard')
@section('title', 'Data User')
@section('admin')

    <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

        <x-breadcrumb title="Data Admin" dashboard="Dashboard" pagename="User Admin" />

        @include('components.alert')

        <a href="{{ route('user.create') }}" class="mb-5 text-white btn bg-slate-700">+ Tambah Admin</a>

        <x-search route="{{ route('user.admin') }}" name='search' placeholder="Cari Data Admin" />

        <table class="w-full mt-4 mb-2 text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
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

                        <td class="flex gap-4 px-6 py-4 md:gap-8">
                            <a href="{{ route('user.edit', $user->id) }}"
                                class="font-medium text-blue-600 hover:underline">Edit</a>

                            <a href="{{ route('user.editpassword', $user->id) }}"
                                class="font-medium text-blue-600 hover:underline">Ubah Password</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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

        {{ $users->appends(['search' => request('search')])->links() }}
    </div>


@endsection
