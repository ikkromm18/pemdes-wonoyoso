<?php

namespace App\Http\Controllers;

use App\Models\DataPengajuan;
use App\Models\PengajuanSurat;
use App\Models\FieldSurat;

use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required',
            'fields' => 'required|array'
        ]);

        return 0;
    }
}
