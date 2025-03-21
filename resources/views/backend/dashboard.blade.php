@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('admin')



    <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

        <x-breadcrumb title="Dashboard" dashboard="" pagename="" />

        <div class="flex flex-wrap justify-center gap-3 p-4 text-gray-900 md:p-8">

            <div class="flex items-center justify-between w-full p-6 border-2 border-gray-900 rounded-lg max-w-64">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-xl font-bold tracking-tight ">Perlu Diproses</h5>
                    <p class="text-xl font-semibold ">{{ $jumlahperluproses }}</p>
                </div>

            </div>

            <div class="flex items-center justify-between w-full p-6 border-2 border-gray-900 rounded-lg max-w-64">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-xl font-bold tracking-tight ">Pengajuan</h5>
                    <p class="text-xl font-semibold ">{{ $jumlahselesai }}</p>
                </div>

            </div>

            <div class="flex items-center justify-between w-full p-6 border-2 border-gray-900 rounded-lg max-w-64">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-xl font-bold tracking-tight ">Jumlah User</h5>
                    <p class="text-xl font-semibold ">{{ $jumlahuser }}</p>
                </div>
            </div>

            <div class="flex items-center justify-between w-full p-6 border-2 border-gray-900 rounded-lg max-w-64">
                <div class="icons">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="">
                    <h5 class="mb-2 text-xl font-bold tracking-tight ">Jenis Surat</h5>
                    <p class="text-xl font-semibold ">{{ $jumlahjenissurat }}</p>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="w-full mt-8">
            <h2 class="mb-4 text-2xl font-bold">Grafik Pengajuan Per Jenis Surat</h2>

            <!-- Filter -->
            <div class="flex flex-wrap gap-4 mb-6">
                <select id="bulan" class="p-2 border rounded">
                    <option value="">Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>

                <select id="tahun" class="p-2 border rounded">
                    <option value="">Pilih Tahun</option>
                    @for ($i = 2020; $i <= date('Y'); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <button id="filter" class="p-2 text-white bg-blue-500 rounded">Tampilkan</button>
            </div>

            <div class="relative w-full h-96">
                <canvas id="pengajuanChart"></canvas>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pengajuanChart').getContext('2d');
        let chart;

        function fetchData(bulan = '', tahun = '') {
            const url = `/api/statistikpengajuan?bulan=${bulan}&tahun=${tahun}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const labels = data.map(item => item.jenis_surat);
                    const jumlah = data.map(item => item.jumlah_pengajuan);

                    if (chart) {
                        chart.destroy();
                    }

                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Pengajuan',
                                data: jumlah,
                                backgroundColor: '#3f83f8',
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return `${context.dataset.label}: ${context.raw}`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Pengajuan'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Jenis Surat'
                                    }
                                }
                            }
                        },
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById('filter').addEventListener('click', () => {
            const bulan = document.getElementById('bulan').value;
            const tahun = document.getElementById('tahun').value;
            fetchData(bulan, tahun);
        });

        fetchData();
    </script>
@endsection
