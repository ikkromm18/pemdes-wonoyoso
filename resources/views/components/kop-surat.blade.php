<div class="w-full flex flex-row text-center justify-center items-center gap-8 mb-4">
    <div class="w-20">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logokop.png'))) }}"
            alt="logo">
    </div>
    <div class="leading-tight">
        <h1 class="font-bold text-xl">PEMERINTAH KABUPATEN PEKALONGAN</h1>
        <h1 class="font-bold text-xl">KECAMATAN BUARAN</h1>
        <h1 class="font-bold text-2xl">DESA WONOYOSO</h1>
        {{-- <p class="">Alamat : Wonoyoso Gg. 5 RT 04 / RW 002 Buaran Pekalongan</p> --}}
        <p class="">{{ $alamat }}</p>
        <p>{{ $kodepos }}</p>
    </div>
</div>
<hr class="border-t-4 border-black mb-0.5">
<hr class="border-t-2 border-black mb-4">
