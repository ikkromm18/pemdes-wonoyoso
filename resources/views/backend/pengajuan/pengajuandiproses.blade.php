@extends('layouts.dashboard')
@section('title', 'Pengajuan Perlu Diproses')
@section('admin')

    <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

        <x-breadcrumb title="Pengajuan Perlu Diproses" dashboard="Dashboard" pagename="Pengajuan" />

        @include('components.alert')

        <x-search route="{{ route('pengajuan.diproses') }}" name='search'
            placeholder="Cari Data Pengajuan Berdasarkan Nama" />

        <!-- Form untuk update status -->
        <form action="{{ route('pengajuan.updateStatus') }}" method="POST" id="bulkUpdateForm">
            @csrf
            <table class="w-full mt-4 mb-2 text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <input type="checkbox" id="selectAll">
                        </th>
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
                    @foreach ($pengajuansurat as $ps)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <input type="checkbox" name="selected[]" value="{{ $ps->id }}" class="checkbox-item">
                            </td>
                            <td class="px-6 py-4">
                                {{ ($pengajuansurat->currentPage() - 1) * $pengajuansurat->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $ps->id }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                <a href="{{ route('pengajuan.detail', $ps->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tombol untuk update status -->
            <div class="flex mt-2 space-x-2">
                <button type="submit" name="status" value="diproses"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Proses yang Dipilih
                </button>

                <button type="submit" name="status" value="ditolak"
                    class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Tolak yang Dipilih
                </button>
            </div>
        </form>

        {{ $pengajuansurat->appends(['search' => request('search')])->links() }}
    </div>

    <script>
        // Fungsi untuk memilih semua checkbox
        document.getElementById('selectAll').addEventListener('click', function() {
            let checkboxes = document.querySelectorAll('.checkbox-item');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>

@endsection
