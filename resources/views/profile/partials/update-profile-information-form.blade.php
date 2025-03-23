<section>
    @include('components.alert')
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Pribadi') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('lengkapi Profil Anda untuk melakukan pengajuan pembuatan administrasi') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Additional --}}
        <div>
            <x-input-label for="nik" :value="__('Nomor NIK')" />
            <x-text-input id="nik" nik="nik" type="number" class="block w-full mt-1" :value="old('nik', $user->nik)"
                required autofocus autocomplete="nik" name="nik" />
            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
        </div>

        <div>
            <x-input-label for="nomor_hp" :value="__('Nomor HP/WA')" />
            <x-text-input id="nomor_hp" nomor_hp="nomor_hp" type="number" class="block w-full mt-1" :value="old('nomor_hp', $user->nomor_hp)"
                required autofocus autocomplete="nomor_hp" name="nomor_hp" />
            <x-input-error class="mt-2" :messages="$errors->get('nomor_hp')" />
        </div>

        <div>
            <x-input-label for="agama" :value="__('Agama')" />
            <x-text-input id="agama" agama="agama" type="text" class="block w-full mt-1" :value="old('agama', $user->agama)"
                required autofocus autocomplete="agama" name="agama" />
            <x-input-error class="mt-2" :messages="$errors->get('agama')" />
        </div>

        <div>
            <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
            <x-text-input id="pekerjaan" pekerjaan="pekerjaan" type="text" class="block w-full mt-1"
                :value="old('pekerjaan', $user->pekerjaan)" required autofocus autocomplete="pekerjaan" name="pekerjaan" />
            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
        </div>

        <div>
            <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
            <x-text-input id="tempat_lahir" tempat_lahir="tempat_lahir" type="text" class="block w-full mt-1"
                :value="old('tempat_lahir', $user->tempat_lahir)" required autofocus autocomplete="tempat_lahir" name="tempat_lahir" />
            <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
        </div>


        <div>
            <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tgl_lahir" tgl_lahir="tgl_lahir" type="date" class="block w-full mt-1"
                :value="old('tgl_lahir', $user->tgl_lahir)" required autofocus autocomplete="tgl_lahir" name="tgl_lahir" />
            <x-input-error class="mt-2" :messages="$errors->get('tgl_lahir')" />
        </div>

        <div>
            <x-input-label for="alamat_utama" :value="__('Alamat Utama')" />
            <x-text-input id="alamat_utama" alamat_utama="alamat_utama" type="text" class="block w-full mt-1"
                :value="old('alamat_utama', $user->alamat_utama)" required autofocus autocomplete="alamat_utama" name="alamat_utama" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat_utama')" />
        </div>

        <div>
            <x-input-label for="alamat_kedua" :value="__('Alamat Kedua')" />
            <x-text-input id="alamat_kedua" alamat_kedua="alamat_kedua" type="text" class="block w-full mt-1"
                :value="old('alamat_kedua', $user->alamat_kedua)" autofocus autocomplete="alamat_kedua" name="alamat_kedua" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat_kedua')" />
        </div>



        <div>
            <x-input-label for="foto_ktp" :value="__('Foto KTP')" />
            <x-text-input id="foto_ktp" foto_ktp="foto_ktp" type="file" class="block w-full mt-1" name="foto_ktp" />
            <x-input-error class="mt-2" :messages="$errors->get('foto_ktp')" />

            <!-- Area Default Dropzone -->
            <div id="default-dropzone1" class="mt-2 text-sm text-gray-500 {{ $user->foto_ktp ? 'hidden' : '' }}">
                {{ __('Upload Foto KTP untuk melihat preview.') }}
            </div>

            <!-- Area Preview -->
            <img id="image-preview1" src="{{ $user->foto_ktp ? asset($user->foto_ktp) : '#' }}"
                alt="Preview Foto KTP" class="mt-2 {{ $user->foto_ktp ? '' : 'hidden' }} w-32 rounded" />
        </div>

        <div>
            <x-input-label for="foto_kk" :value="__('Foto KK')" />
            <x-text-input id="foto_kk" foto_kk="foto_kk" type="file" class="block w-full mt-1"
                name="foto_kk" />
            <x-input-error class="mt-2" :messages="$errors->get('foto_kk')" />

            <!-- Area Default Dropzone -->
            <div id="default-dropzone2" class="mt-2 text-sm text-gray-500 {{ $user->foto_kk ? 'hidden' : '' }}">
                {{ __('Upload Foto KK untuk melihat preview.') }}
            </div>

            <!-- Area Preview -->
            <img id="image-preview2" src="{{ $user->foto_kk ? asset($user->foto_kk) : '#' }}" alt="Preview Foto KK"
                class="mt-2 {{ $user->foto_kk ? '' : 'hidden' }} w-32 rounded" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    function previewImage(inputId, previewId, dropzoneId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const dropzone = document.getElementById(dropzoneId);

        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    dropzone.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Initialize preview functions for Foto KTP and Foto KK
    previewImage('foto_ktp', 'image-preview1', 'default-dropzone1');
    previewImage('foto_kk', 'image-preview2', 'default-dropzone2');
</script>
