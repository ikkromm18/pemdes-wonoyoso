<?php

namespace App\Http\Controllers;

use App\Models\FieldSurat;
use Illuminate\Http\Request;

class FieldSuratController extends Controller
{
    public function index()
    {

        $fields = FieldSurat::all();

        $data = [
            'field' => $fields
        ];

        // dd($data);

        return view('backend.field.index', $data);
    }
}
