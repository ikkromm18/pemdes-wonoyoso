@extends('layouts.dashboard')
@section('title', 'Pengajuan')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
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
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Surat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
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
                            {{ $no++ }}
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
                            {{ $ps->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->jenis_surat_id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ps->status }}
                        </td>
                        <td class="px-6 py-4">

                            <button data-id="{{ $ps->id }}" data-modal-target="default-modal"
                                data-modal-toggle="default-modal"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-detail"
                                type="button">
                                Lainnya
                            </button>



                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Data Pengajuan
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4" id="modalbody">

                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex gap-2 items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                            <a href="#" data-modal-hide="default-modal"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju</a>

                                            <a href="{{ route('pengajuan.cetak', $ps->id) }}"
                                                data-modal-hide="default-modal"
                                                class="text-white bg-yellow-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cetak</a>

                                            <a href="#" data-modal-hide="default-modal"
                                                class="text-white bg-red-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tolak</a>


                                            {{-- <button data-modal-hide="default-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">hapus</a> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-detail').forEach(button => {
                button.addEventListener('click', function() {
                    const pengajuanId = this.getAttribute('data-id');
                    const modalBody = document.querySelector('#modalbody');


                    modalBody.innerHTML = '';

                    fetch(`/pengajuan/${pengajuanId}`)
                        .then(response => response.json())
                        .then(data => {
                            modalBody.innerHTML = `
                                <table>
                                    <tr>
                                        <td><strong>NIK</strong></td>
                                        <td>:</td>
                                        <td>${data.nik}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama</strong></td>
                                        <td>:</td>
                                        <td>${data.nama}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat</strong></td>
                                        <td>:</td>
                                        <td>${data.alamat ?? '-'}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jenis Surat</strong></td>
                                        <td>:</td>
                                        <td>${data.jenis_surat}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>:</td>
                                        <td>${data.status}</td>
                                    </tr>
                                    ${data.details.map(detail => `
                                                                                                                                        <tr>
                                                                                                                                            <td><strong>${detail.nama_field}</strong></td>
                                                                                                                                            <td>:</td>
                                                                                                                                            <td>${detail.nilai}</td>
                                                                                                                                        </tr>
                                                                                                                                    `).join('')}
                                </table>
                            `;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            modalBody.innerHTML = '<p>Error fetching data.</p>';
                        });
                });
            });
        });
    </script>



@endsection
