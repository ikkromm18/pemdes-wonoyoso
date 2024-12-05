<?php

namespace App\Http\Controllers;

use App\Models\FieldSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $fieldSurats = FieldSurat::all();
        $jenisSurats = JenisSurat::all();

        $data = [
            'jenissurats' => $jenisSurats
        ];

        // dd($data);

        return view('frontend.layanan', $data);
    }

    public function create() {}

    public function getFieldSurats($jenisSuratId)
    {
        $fields = FieldSurat::where('jenis_surat_id', $jenisSuratId)->get();


        return response()->json($fields);
    }
}
