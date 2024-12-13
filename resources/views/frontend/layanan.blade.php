@extends('layouts.master')
@section('title', 'Layanan')
@section('content')

    <div class="max-w-screen-xl mx-auto min-h-screen">
        @include('components.alert')
        <div class="flex">
            <div class="bg-white shadow-lg w-full mt-16 rounded-sm p-8">
                <h1 class="text-center font-semibold text-2xl mb-8">Form Pengajuan Surat</h1>


                <form class="max-w-xl mx-auto" action="{{ route('pengajuan.store') }}" method="POST">
                    @csrf

                    <div class="relative z-0 w-full mb-5 group">

                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Surat</label>
                        <select id="jenis_surat_id" name="jenis_surat_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Jenis Surat</option>
                            @foreach ($jenissurats as $js)
                                <option value="{{ $js->id }}">{{ $js->nama_jenis }}</option>
                            @endforeach

                        </select>
                    </div>



                    <div id="input_dinamis">

                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
                            inputLabel.classList.add('peer-focus:font-medium', 'absolute', 'text-sm',
                                'text-gray-500', 'duration-300', 'transform', '-translate-y-6',
                                'scale-75', 'top-3', '-z-10', 'origin-[0]',
                                'peer-focus:text-blue-600', 'peer-placeholder-shown:scale-100',
                                'peer-placeholder-shown:translate-y-0', 'peer-focus:scale-75',
                                'peer-focus:-translate-y-6');
                            inputLabel.textContent = field.nama_field;

                            let inputElement;

                            if (field.tipe_field === 'boolean') {
                                // Dropdown untuk tipe boolean
                                inputElement = document.createElement('select');
                                inputElement.classList.add('block', 'w-full', 'py-2.5', 'px-0',
                                    'text-sm', 'text-gray-900', 'bg-transparent', 'border-0',
                                    'border-b-2', 'border-gray-300', 'appearance-none',
                                    'focus:outline-none', 'focus:ring-0', 'focus:border-blue-600',
                                    'peer');
                                inputElement.name = `fields[${field.id}]`;
                                inputElement.innerHTML = `
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            `;
                            } else {
                                // Input teks untuk tipe lain
                                inputElement = document.createElement('input');
                                inputElement.type = field.tipe_field;
                                inputElement.classList.add('block', 'py-2.5', 'px-0', 'w-full',
                                    'text-sm', 'text-gray-900', 'bg-transparent', 'border-0',
                                    'border-b-2', 'border-gray-300', 'appearance-none',
                                    'focus:outline-none', 'focus:ring-0', 'focus:border-blue-600',
                                    'peer');
                                inputElement.name = `fields[${field.id}]`;
                            }

                            inputElement.required = field.is_required;


                            // Tambahkan elemen ke dalam grup
                            formGroup.appendChild(inputElement);
                            formGroup.appendChild(inputLabel);


                            // Tambahkan grup ke dalam container input dinamis
                            inputDinamis.appendChild(formGroup);
                        });
                    });
            }
        })
    </script>


@endsection
