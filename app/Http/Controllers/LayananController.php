<?php

namespace App\Http\Controllers;

use App\Models\FieldSurat;
use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {

        $user = $request->user();

        if (!$user->is_active) {

            $NomorAdmin = User::where('role', 'Admin')->first();

            $data = [
                'nomor_admin' => $NomorAdmin
            ];

            return view('frontend.un-active', $data);
        }


        $jenisSurats = JenisSurat::all();

        $user = $request->user();



        $data = [
            'jenissurats' => $jenisSurats,
            'user' => $user
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
