<?php

namespace App\Http\Controllers;

use App\Models\FieldSurat;
use Illuminate\Http\Request;

class FieldSuratController extends Controller
{
    public function index()
    {

        $fields = FieldSurat::paginate(9)->withQueryString();

        $data = [
            'field' => $fields
        ];

        // dd($data);

        return view('backend.field.index', $data);
    }
}
