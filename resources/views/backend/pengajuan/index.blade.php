@extends('layouts.dashboard')
@section('title', 'Pengajuan')
@section('admin')



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">

        <x-breadcrumb title="Data Pengajuan" dashboard="Dashboard" pagename="Pengajuan" />

        <x-search route="{{ route('pengajuansurat') }}" name='search' placeholder="Cari Data Pengajuan Berdasarkan Nama" />

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
                            {{ $ps->status }}
                        </td>
                        <td class="px-6 py-4">

                            <button data-id="{{ $ps->id }}" data-modal-target="default-modal-{{ $ps->id }}"
                                data-modal-toggle="default-modal-{{ $ps->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-detail"
                                type="button">
                                Lainnya
                            </button>

                            {{-- <a href="{{ route('pengajuan.detail', $ps->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a> --}}



                            <div id="default-modal-{{ $ps->id }}" tabindex="-1" aria-hidden="true"
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
                                                data-modal-hide="default-modal-{{ $ps->id }}">
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
                                            class="flex flex-wrap gap-2 items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                            <form action="{{ route('setuju', $ps->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                                                focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                                                dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju
                                                    (ID: {{ $ps->id }})
                                                </button>
                                            </form>

                                            <form action="{{ route('menolak', $ps->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="  text-white bg-red-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tolak
                                                    (ID: {{ $ps->id }})
                                                </button>
                                            </form>

                                            <a href="{{ route('print', $ps->id) }}"
                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Print
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $pengajuansurat->appends(['search' => request('search')])->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-detail').forEach(button => {
                button.addEventListener('click', function() {
                    const pengajuanId = this.getAttribute('data-id');
                    const modalBody = document.querySelector(
                        `#default-modal-${pengajuanId} #modalbody`);

                    // Bersihkan isi modal sebelum fetch data
                    modalBody.innerHTML = '<p>Loading...</p>';

                    // Fetch data dari server berdasarkan ID
                    fetch(`/pengajuan/${pengajuanId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Cek jika data ada
                            if (!data) {
                                throw new Error('Data not found');
                            }

                            // Bangun konten tabel modal
                            let tableContent = `
                        <table class="w-full text-sm text-left text-gray-500">
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>:</td>
                                <td>${data.id || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>NIK</strong></td>
                                <td>:</td>
                                <td>${data.nik || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td>${data.nama || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>:</td>
                                <td>${data.alamat || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Surat</strong></td>
                                <td>:</td>
                                <td>${data.jenis_surat || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>:</td>
                                <td>${data.status || '-'}</td>
                            </tr>
                            <tr>
                                <td><strong>Foto KTP</strong></td>
                                <td>:</td>
                                <td><img src="${data.foto_ktp || '#'}" class="w-64" alt="Foto KTP"></td>
                            </tr>
                             <tr>
                                <td><strong>Foto KK</strong></td>
                                <td>:</td>
                                <td><img src="${data.foto_kk || '#'}" class="w-64" alt="Foto KK"></td>
                            </tr>
                    `;

                            // Tambahkan data detail jika ada
                            if (data.details && data.details.length > 0) {
                                data.details.forEach(detail => {
                                    tableContent += `
                                <tr>
                                    <td><strong>${detail.nama_field}</strong></td>
                                    <td>:</td>
                                    <td>${detail.nilai || '-'}</td>
                                </tr>
                            `;
                                });
                            } else {
                                tableContent += `
                            <tr>
                                <td colspan="3" class="text-center">Detail tambahan tidak tersedia.</td>
                            </tr>
                        `;
                            }

                            tableContent += `</table>`;

                            // Update modal body
                            modalBody.innerHTML = tableContent;
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            modalBody.innerHTML =
                                `<p class="text-red-600">Error: ${error.message}</p>`;
                        });
                });
            });
        });
    </script>




@endsection
