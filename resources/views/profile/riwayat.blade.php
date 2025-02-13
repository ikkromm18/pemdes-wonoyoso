<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-center gap-6 p-2">
                <div class="flex flex-row gap-2">
                    <div class="w-5 rounded-full bg-gray-900"></div>
                    <div class="text-gray-900 text-sm">Diajukan = Permohonan Sukses Diajukan</div>
                </div>

                <div class="flex flex-row gap-2">
                    <div class="w-5 rounded-full bg-green-500"></div>
                    <div class="text-green-500 text-sm">Diproses/Selesai = Surat sedang di proses / telah selesai</div>
                </div>


                <div class="flex flex-row gap-2">
                    <div class="w-5 rounded-full bg-red-500"></div>
                    <div class="text-red-500 text-sm">Ditolak = Permohonan Ditolak</div>
                </div>
            </div>
            <div class="min-w-full overflow-x-auto">


                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Pengajuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Pengajuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Keterangan
                            </th>


                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    <tbody>
                        @foreach ($riwayat as $r)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ ($riwayat->currentPage() - 1) * $riwayat->perPage() + $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $r->JenisSurats->nama_jenis }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $r->created_at }}
                                </td>

                                <td
                                    class="px-6 py-4 
                            {{ $r->status == 'diproses' || $r->status == 'selesai' ? 'text-green-500' : ($r->status == 'diajukan' ? 'text-gray-700' : 'text-red-500') }}">
                                    {{ $r->status }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $r->keterangan ?? '-' }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
            {{ $riwayat->links() }}
        </div>
    </div>
</x-app-layout>
