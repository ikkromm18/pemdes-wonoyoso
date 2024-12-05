<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {

        $jenisSurats = JenisSurat::all();

        $data = [
            'jenisSurats' => $jenisSurats
        ];

        // dd($data);

        return view('backend.jenissurat.index', $data);
    }
}
