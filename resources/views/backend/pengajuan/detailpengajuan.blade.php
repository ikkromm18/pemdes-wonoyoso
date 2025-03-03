@extends('layouts.dashboard')
@section('title', 'Detail Pengajuan')
@section('admin')

    <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

        <x-breadcrumb title="Detail Data Pengajuan" dashboard="Dashboard" pagename="Pengajuan" />

        <div class="flex items-center justify-between p-3 mb-5">
            <!-- Tombol Kembali (Start) -->
            <div>
                <a href="{{ route('pengajuan.diproses') }}" class="text-white btn bg-slate-700">
                    Kembali
                </a>
            </div>

            <!-- Container untuk Tombol Setuju dan Ditolak (End) -->
            <div class="flex space-x-3">

                <button data-modal-target="popup-modal-setuju" data-modal-toggle="popup-modal-setuju"
                    class="text-white bg-blue-700 btn" type="button">
                    Setuju
                </button>

                <button data-modal-target="popup-modal-menolak" data-modal-toggle="popup-modal-menolak"
                    class="text-white bg-red-700 btn" type="button">
                    Tolak
                </button>



            </div>
        </div>


        {{-- Modal Setuju --}}


        <div id="popup-modal-setuju" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="popup-modal-setuju">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">

                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Keterangan Tambahan</h3>

                        <form action="{{ route('setuju', $pengajuan->id) }}" method="post">
                            @csrf
                            @method('put')

                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="keterangan" placeholder="Pesan (Opsional)"></textarea>

                            <div class="mt-4">

                                <button type="submit" class="text-white bg-blue-700 btn" dusk="setuju-button">
                                    Setuju
                                </button>

                                <button data-modal-hide="popup-modal-setuju" type="button" dusk="tolak-button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-20 focus:ring-4 focus:ring-gray-100 ">
                                    Kembali</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        {{-- Akhir Modal Setuju --}}

        {{-- Modal Tolak --}}

        <div id="popup-modal-menolak" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="popup-modal-menolak">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">

                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Alasan Ditolak</h3>

                        <form action="{{ route('menolak', $pengajuan->id) }}" method="post">
                            @csrf
                            @method('put')

                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="keterangan" placeholder="Pesan (Opsional)"></textarea>

                            <div class="mt-4">

                                <button type="submit" class="text-white bg-red-700 btn">
                                    Tolak
                                </button>

                                <button data-modal-hide="popup-modal-menolak" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-20 focus:ring-4 focus:ring-gray-100 ">
                                    Kembali</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        {{-- Akhir Modal Tolak --}}

        <!-- Grid Container -->
        <div class="grid grid-cols-1 gap-4 p-3 md:grid-cols-2">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Surat</label>
                    <input value="{{ $pengajuan->jenisSurats->nama_jenis }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input value="{{ $user->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input value="{{ $user->nik }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input value="{{ $user->alamat_utama }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input value="{{ $user->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <input value="{{ $pengajuan->status }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <input value="{{ $pengajuan->keterangan }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
                @foreach ($detail as $d)
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ $d->fieldSurats->nama_field }}
                        </label>

                        @if (filter_var($d->nilai, FILTER_VALIDATE_URL) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $d->nilai))
                            <!-- Jika nilai adalah URL dan format file gambar -->
                            <img src="{{ $d->nilai }}" alt="Foto Pengajuan" class="w-64 border rounded-lg">
                        @else
                            <!-- Jika nilai bukan file gambar, tampilkan dalam input -->
                            <input value="{{ $d->nilai }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                disabled />
                        @endif
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Grid untuk Foto -->
        <div class="grid grid-cols-1 gap-4 p-3 md:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto KTP</label>
                <div class="w-full">
                    <img src="{{ $user->foto_ktp }}" alt="Foto KTP" class="rounded-lg shadow-md">
                </div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto KK</label>
                <div class="w-full">
                    <img src="{{ $user->foto_kk }}" alt="Foto KK" class="rounded-lg shadow-md">
                </div>
            </div>
        </div>

    </div>



@endsection
