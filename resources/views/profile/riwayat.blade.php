<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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
                                {{ $no++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $r->JenisSurats->nama_jenis }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $r->created_at }}
                            </td>

                            <td
                                class="px-6 py-4 {{ $r->status == 'approved' ? 'text-green-500' : ($r->status == 'pending' ? 'text-gray-700' : 'text-red-500') }}
">
                                {{-- {{ $f->is_required == 1 ? 'Ya' : 'Tidak' }} --}}
                                {{ $r->status }}
                            </td>


                        </tr>
                    @endforeach

                </tbody>

            </table>
            {{ $riwayat->links() }}
        </div>
    </div>
</x-app-layout>
