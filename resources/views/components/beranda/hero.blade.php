<style>
    #my-background {
        position: relative;
        /* Untuk memastikan anak-anak elemen tidak melanggar struktur */
        z-index: 0;
        /* Background harus di bawah elemen lain */
    }

    .hero-content {
        position: relative;
        /* Agar tetap di atas */
        z-index: 1;
        /* Konten berada di atas background */
    }
</style>

<div id="my-background" class="flex justify-center pt-16 pb-8">
    <div class="hero-content bg-opacity-90  text-center flex flex-col">
        <div class="max-w-md">
            <h1 class="mb-2 text-5xl font-bold">Urus Administrasi <span class="text-[#E16741]"> Jadi Lebih Mudah!</span>
            </h1>
            <p class="mb-5">
                Hanya dengan beberapa klik, selesaikan pengajuan dokumen Anda tanpa harus datang ke Balai Desa. Layanan
                kami siap membantu Anda.
            </p>
            {{-- <a href="#" class="bg-red-600 py-3 px-4 rounded-md hover:bg-red-700 font-semibold">Ajukan Sekarang</a> --}}

            <x-my-button href="{{ route('layanan') }}" class="bg-black text-white">
                Ajukan Sekarang
            </x-my-button>

        </div>

        <div class="mt-8">
            <div class="flex flex-wrap justify-center gap-4 md:gap-4 md:justify-between">

                <div
                    class="max-w-sm bg-white shadow-lg rounded-lg flex flex-col justify-center items-center p-2 hover:shadow-xl">

                    <div class="mx-auto mt-3">
                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/flash-on.png"
                            alt="flash-on" />
                    </div>

                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-00 dark:text-white">Pelayanan
                            Cepat dan
                            Mudah</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sistem kami dirancang untuk
                            mempermudah
                            proses pengajuan administrasi. Warga dapat mengajukan permohonan surat keterangan secara
                            online
                            kapan saja dan di mana saja tanpa harus datang ke kantor desa.</p>
                    </div>
                </div>

                <div
                    class="max-w-sm bg-white shadow-lg rounded-lg flex flex-col justify-center items-center p-2 hover:shadow-xl">

                    <div class="mx-auto mt-3">
                        <img width="48" height="48" src="https://img.icons8.com/doodle/48/process.png"
                            alt="process" />
                    </div>

                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-00 dark:text-white"> Transparansi
                            dan
                            Akurasi Data</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Setiap langkah dalam proses
                            pelayanan dapat dilacak dengan jelas, mulai dari pengajuan hingga selesai. Data yang
                            dikelola terjamin keakuratannya, sehingga mengurangi risiko kesalahan administrasi.</p>
                    </div>
                </div>

                <div
                    class="max-w-sm bg-white shadow-lg rounded-lg flex flex-col justify-center items-center p-2 hover:shadow-xl">

                    <div class="mx-auto mt-3">
                        <img width="48" height="48" src="https://img.icons8.com/color/48/web.png"
                            alt="web" />
                    </div>

                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-00 dark:text-white">Dukungan
                            Layanan
                            Digital Terintegrasi</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dengan integrasi berbasis
                            Progressive Web
                            Application (PWA), layanan kami mendukung akses lintas perangkat dan pengelolaan dokumen
                            secara
                            digital, sehingga lebih efisien dan ramah lingkungan.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>

<script>
    VANTA.WAVES({
        el: "#my-background",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0xffd2d2,
        shininess: 40.00,
        waveHeight: 17.00,
        zoom: 1.11
    })
</script>
