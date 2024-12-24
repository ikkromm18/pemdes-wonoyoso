<?php

namespace App\Http\Controllers;

use App\Models\DataPengajuan;
use Illuminate\Http\Request;

class DataPengajuanController extends Controller
{
    public function index()
    {
        $datapengajuan = DataPengajuan::paginate(8)->withQueryString();

        $data = [
            'datapengajuan' => $datapengajuan
        ];

        // dd($data);

        return view('backend.datapengajuan.index', $data);
    }
}
