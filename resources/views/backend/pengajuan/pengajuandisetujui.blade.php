@extends('layouts.dashboard')
@section('title', 'Pengajuan Disetujui')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <x-breadcrumb title="Pengajuan Disetujui / Selesai" dashboard="Dashboard" pagename="Pengajuan" />

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
                        class="border-b   {{ $ps->status == 'selesai' ? 'bg-green-200 text-gray-700 ' : 'bg-white hover:bg-gray-100' }} ">

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
                            {{ \Carbon\Carbon::parse($ps->created_at)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->JenisSurats->nama_jenis }}
                        </td>

                        <td class="px-6 py-4 flex gap-2">

                            <a href="{{ route('pengajuan.detail', $ps->id) }}"
                                class="font-medium text-blue-600  hover:underline"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>

                            <a href="{{ route('print', $ps->id) }}"
                                class="font-medium text-yellow-600  hover:underline"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                </svg>
                            </a>

                            @if ($ps->status == 'diproses')
                                <form action="{{ route('selesai', $ps->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-medium text-green-600  hover:underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('setuju', $ps->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="font-medium text-red-600  hover:underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>

                                    </button>
                                </form>
                            @endif




                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $pengajuansurat->appends(['search' => request('search')])->links() }}
    </div>





@endsection
