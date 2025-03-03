@extends('layouts.dashboard')
@section('title', 'Detail Data User')
@section('admin')

    <div class="relative p-6 overflow-x-auto bg-white shadow-md sm:rounded-lg">
        <!-- Breadcrumb -->
        <x-breadcrumb title="Detail Data {{ $user->name }}" dashboard="Dashboard" pagename="User" />


        <div class="flex justify-center w-full md:justify-between">
            <div class="flex justify-center md:justify-normal">
                <a href="{{ route('user.index') }}" class="mb-5 text-white btn bg-slate-700">
                    Kembali
                </a>
            </div>

            <div class="flex justify-center md:justify-normal">
                <form action="{{ route('user.verifikasi', $user->id) }}" method="post">
                    @csrf
                    @method('put')

                    <button type="submit" class="mb-5 text-white bg-green-500 btn">Verifikasi Akun</button>

                </form>

            </div>
        </div>



        <!-- Content -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Data User -->
            <div class="space-y-4">
                <div class="p-4 border rounded-lg shadow-sm bg-gray-50">
                    <p class="text-sm text-gray-600"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-sm text-gray-600"><strong>Nama:</strong> {{ $user->name }}</p>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-sm text-gray-600"><strong>NIK:</strong> {{ $user->nik }}</p>
                    <p class="text-sm text-gray-600"><strong>Nomor HP:</strong> {{ $user->nomor_hp }}</p>
                    <p class="text-sm text-gray-600"><strong>Tempat dan Tanggal Lahir:</strong>
                        {{ $user->tempat_lahir . ', ' . \Carbon\Carbon::parse($user->tgl_lahir)->translatedFormat('d F Y') }}
                    </p>

                    <p class="text-sm text-gray-600"><strong>Alamat Utama:</strong> {{ $user->alamat_utama }}</p>
                    <p class="text-sm text-gray-600"><strong>Alamat Kedua:</strong> {{ $user->alamat_kedua }}</p>
                    <p class="text-sm text-gray-600"><strong>Status Akun:</strong> {{ $user->is_active }}</p>

                </div>
            </div>

            <!-- Foto User -->
            <div class="space-y-6">
                <div>
                    <p class="mb-2 text-sm font-semibold text-gray-800">Foto KTP:</p>
                    <div class="p-2 border rounded-lg bg-gray-50">
                        @if ($user->foto_ktp)
                            <img src="{{ $user->foto_ktp }}" alt="Foto KTP" class="w-full h-auto rounded-md shadow-md">
                        @else
                            <p class="text-center text-gray-500">Belum ada foto KTP</p>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm font-semibold text-gray-800">Foto KK:</p>
                    <div class="p-2 border rounded-lg bg-gray-50">
                        @if ($user->foto_kk)
                            <img src="{{ $user->foto_kk }}" alt="Foto KTP" class="w-full h-auto rounded-md shadow-md">
                        @else
                            <p class="text-center text-gray-500">Belum ada foto KK</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
