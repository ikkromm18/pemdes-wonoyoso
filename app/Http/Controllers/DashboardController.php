<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PengajuanSurat;
use App\Models\User;
use App\Models\JenisSurat;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahpengajuan = PengajuanSurat::count();

        $jumlahuser = User::where('role', 'User')->count();

        $jumlahjenissurat = JenisSurat::count();

        $data = [
            'jumlahpengajuan' => $jumlahpengajuan,
            'jumlahuser' => $jumlahuser,
            'jumlahjenissurat' => $jumlahjenissurat
        ];

        return view('backend.dashboard', $data);
    }

    public function jumlahPengajuanPerJenis(Request $request)
    {
        $bulan = $request->query('bulan'); // Format: 01, 02, ..., 12
        $tahun = $request->query('tahun'); // Format: 2024, 2025, dll.

        $data = JenisSurat::withCount(['pengajuanSurats as jumlah_pengajuan' => function ($query) use ($bulan, $tahun) {
            if ($bulan && $tahun) {
                $query->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan);
            } elseif ($tahun) {
                $query->whereYear('created_at', $tahun);
            }
        }])
            ->get()
            ->map(function ($jenisSurat) {
                return [
                    'jenis_surat' => $jenisSurat->nama_jenis,
                    'jumlah_pengajuan' => $jenisSurat->jumlah_pengajuan ?? 0,
                ];
            });

        return response()->json($data);
    }
}
