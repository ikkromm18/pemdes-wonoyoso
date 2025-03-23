@extends('layouts.master')
@section('title', 'Layanan')
@section('content')

    <div class="max-w-screen-lg min-h-screen mx-auto">
        @include('components.alert')
        <div class="flex">
            <div class="w-full p-8 mt-4 bg-white rounded-sm shadow-lg">
                <h1 class="mb-8 text-2xl font-semibold text-center">Form Pengajuan Surat</h1>

                <form class="max-w-3xl mx-auto" action="{{ route('pengajuan.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="p-4 mb-5 border rounded-lg bg-gray-50">
                        <h2 class="mb-2 text-lg font-semibold">Data Pengguna</h2>
                        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Alamat Utama:</strong> {{ auth()->user()->alamat_utama }}</p>
                        <p><strong>Nomor HP:</strong> {{ auth()->user()->nomor_hp }}</p>
                        <p><strong>Agama:</strong> {{ auth()->user()->agama }}</p>
                        <p><strong>Pekerjaan:</strong> {{ auth()->user()->pekerjaan }}</p>
                        <p><strong>Tempat / Tanggal Lahir:</strong>
                            {{ auth()->user()->tempat_lahir . ', ' . \Carbon\Carbon::parse(auth()->user()->tgl_lahir)->translatedFormat('d F Y') }}
                        </p>

                        <p class="mt-4 text-xs font-bold">Note: data yang akan dicantumkan di surat adalah data
                            anda
                            diatas,
                            pastikan
                            data pribadi sudah
                            benar</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="relative z-0 w-full mb-5 group">
                            <label for="jenis_surat_id" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Surat</label>
                            <select id="jenis_surat_id" name="jenis_surat_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Pilih Jenis Surat</option>
                                @foreach ($jenissurats as $js)
                                    <option value="{{ $js->id }}">{{ $js->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="input_dinamis" class="grid grid-cols-1 gap-4 md:grid-cols-2"></div>

                    <button data-modal-target="popup-modal-layanan" data-modal-toggle="popup-modal-layanan"
                        dusk="submit-pengajuan"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        type="button">
                        Submit
                    </button>

                    <div id="popup-modal-layanan" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <div class="relative bg-white rounded-lg shadow-sm">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto"
                                    data-modal-hide="popup-modal-layanan">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 text-center md:p-5">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Data Yang Anda Isi Sudah
                                        Benar?</h3>
                                    <button type="submit" dusk="submit-btn"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        Submit
                                    </button>
                                    <button data-modal-hide="popup-modal-layanan" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('jenis_surat_id').addEventListener('change', function() {
            const jenisSuratId = this.value;
            const inputDinamis = document.getElementById('input_dinamis');
            inputDinamis.innerHTML = '';

            if (jenisSuratId) {
                fetch(`/api/fields/${jenisSuratId}`)
                    .then(response => response.json())
                    .then(fields => {
                        fields.forEach(field => {
                            const formGroup = document.createElement('div');
                            formGroup.classList.add('relative', 'z-0', 'w-full', 'mb-5', 'group');

                            const inputLabel = document.createElement('label');
                            inputLabel.textContent = field.nama_field;
                            inputLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium',
                                'text-gray-900');

                            let inputElement;

                            if (field.tipe_field === 'boolean') {
                                inputElement = document.createElement('select');
                                inputElement.classList.add('bg-gray-50', 'border', 'text-gray-900',
                                    'text-sm', 'rounded-lg', 'block', 'w-full', 'p-2.5');
                                inputElement.name = `fields[${field.id}]`;
                                inputElement.innerHTML =
                                    '<option value="1">Ya</option><option value="0">Tidak</option>';
                            } else {
                                inputElement = document.createElement('input');
                                inputElement.type = field.tipe_field;
                                inputElement.classList.add('bg-gray-50', 'border', 'text-gray-900',
                                    'text-sm', 'rounded-lg', 'block', 'w-full', 'p-2.5');
                                inputElement.name = `fields[${field.id}]`;
                            }

                            inputElement.required = field.is_required;
                            formGroup.appendChild(inputLabel);
                            formGroup.appendChild(inputElement);
                            inputDinamis.appendChild(formGroup);
                        });
                    });
            }
        });
    </script>

@endsection
