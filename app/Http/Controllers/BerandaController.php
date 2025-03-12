<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class BerandaController extends Controller
{
    public function index()
    {
        $jenisurats = JenisSurat::all();
        $data = [

            'jenissurats' => $jenisurats
        ];
        return view('frontend.beranda', $data);
    }

    public function pemberitahuan()
    {

        return view('frontend.notifikasi');
    }
}
