@extends('layouts.dashboard')
@section('title', 'Detail Data User')
@section('admin')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 bg-white">
        <!-- Breadcrumb -->
        <x-breadcrumb title="Detail Data {{ $user->name }}" dashboard="Dashboard" pagename="User" />

        <div class=" flex justify-center md:justify-normal">
            <a href="{{ route('user.index') }}" class="btn bg-slate-700 text-white mb-5">
                Kembali
            </a>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Data User -->
            <div class="space-y-4">
                <div class="p-4 bg-gray-50 border rounded-lg shadow-sm">
                    <p class="text-sm text-gray-600"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-sm text-gray-600"><strong>Nama:</strong> {{ $user->name }}</p>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-sm text-gray-600"><strong>NIK:</strong> {{ $user->nik }}</p>
                    <p class="text-sm text-gray-600"><strong>Alamat:</strong> {{ $user->alamat }}</p>

                </div>
            </div>

            <!-- Foto User -->
            <div class="space-y-6">
                <div>
                    <p class="text-sm font-semibold text-gray-800 mb-2">Foto KTP:</p>
                    <div class="border rounded-lg p-2 bg-gray-50">
                        @if ($user->foto_ktp)
                            <img src="{{ $user->foto_ktp }}" alt="Foto KTP" class="w-full h-auto rounded-md shadow-md">
                        @else
                            <p class="text-center text-gray-500">Belum ada foto KTP</p>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800 mb-2">Foto KK:</p>
                    <div class="border rounded-lg p-2 bg-gray-50">
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
