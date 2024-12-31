<div class="flex flex-col mx-auto justify-center pb-8 gap-4 bg-[#ffdcd2]">

    <div class="text-center font-bold text-4xl mb-4">Daftar Layanan Pembuatan Surat</div>
    <div class="flex text-center  flex-wrap justify-center gap-4 px-4">

        @foreach ($jenissurats as $js)
            <div class="px-6 py-2 rounded-full w-full md:w-auto font-semibold shadow-md">{{ $js->nama_jenis }}</div>
        @endforeach
    </div>
</div>
