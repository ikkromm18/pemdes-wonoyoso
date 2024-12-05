<?php

namespace App\Http\Controllers;

use App\Models\DataPengajuan;
use Illuminate\Http\Request;

class DataPengajuanController extends Controller
{
    public function index()
    {
        $datapengajuan = DataPengajuan::all();

        $data = [
            'datapengajuan' => $datapengajuan
        ];

        // dd($data);

        return view('backend.datapengajuan.index', $data);
    }
}
