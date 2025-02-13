@extends('layouts.dashboard')
@section('title', 'Pengajuan Perlu Diproses')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <x-breadcrumb title="Pengajuan Perlu Diproses" dashboard="Dashboard" pagename="Pengajuan" />

        @include('components.alert')

        <x-search route="{{ route('pengajuan.diproses') }}" name='search'
            placeholder="Cari Data Pengajuan Berdasarkan Nama" />

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-4 mb-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomor Pengajuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengajuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Surat
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengajuansurat as $ps)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            {{ ($pengajuansurat->currentPage() - 1) * $pengajuansurat->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $ps->nik }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $ps->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($ps->created_at)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->JenisSurats->nama_jenis }}
                        </td>

                        <td class="px-6 py-4">

                            {{-- <button data-id="{{ $ps->id }}" data-modal-target="default-modal-{{ $ps->id }}"
                                data-modal-toggle="default-modal-{{ $ps->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-detail"
                                type="button">
                                Lainnya
                            </button> --}}

                            <a href="{{ route('pengajuan.detail', $ps->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>





                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $pengajuansurat->appends(['search' => request('search')])->links() }}
    </div>





@endsection
