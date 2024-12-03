<div class="hero min-h-screen"
    style="background-image: url(../images/bg-hero.png);
background-size: cover;
background-repeat: no-repeat;
background-position: center">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Urus Administrasi Jadi Lebih Mudah!</h1>
            <p class="mb-5">
                Hanya dengan beberapa klik, selesaikan pengajuan dokumen Anda tanpa harus datang ke Balai Desa. Layanan
                kami siap membantu Anda.
            </p>
            {{-- <a href="#" class="bg-red-600 py-3 px-4 rounded-md hover:bg-red-700 font-semibold">Ajukan Sekarang</a> --}}

            <x-my-button href="{{ route('layanan') }}">
                Ajukan Sekarang
            </x-my-button>
        </div>
    </div>
</div>
