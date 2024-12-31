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
}
