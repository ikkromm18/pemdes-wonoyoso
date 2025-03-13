@extends('layouts.dashboard')
@section('title', 'Admin')
@section('admin')


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


        <x-bread-crumb title="Notifikasi" dashboard="Dashboard" pagename="Notifikasi" />



        {{-- Tombol Tandai Semua sebagai Dibaca --}}
        <form action="{{ route('notificationsadmin.markAllRead') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 mb-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Tandai Semua sebagai Dibaca
            </button>
        </form>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="p-3 mb-4 text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- List Notifikasi --}}
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($notifications as $notification)
                <div class="p-4 {{ $notification->read_at ? '' : 'bg-gray-100 dark:bg-gray-700' }}">
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        {{ $notification->data['message'] }}
                    </div>
                    <div class="mt-1 text-xs text-blue-600 dark:text-blue-400">
                        {{ \Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y H:i') }}
                    </div>
                </div>
            @empty
                <p class="py-4 text-center text-gray-500 dark:text-gray-400">Tidak ada notifikasi.</p>
            @endforelse
        </div>

    </div>


    <div class="max-w-3xl p-6 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">

    </div>

@endsection
