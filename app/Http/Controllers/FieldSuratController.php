<?php

namespace App\Http\Controllers;

use App\Models\FieldSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class FieldSuratController extends Controller
{
    public function index()
    {

        $fields = FieldSurat::paginate(7)->withQueryString();

        $data = [
            'field' => $fields
        ];


        return view('backend.field.index', $data);
    }

    public function create()
    {
        $jenisSurats = JenisSurat::all();

        $data = [
            'jenissurat' => $jenisSurats
        ];

        return view('backend.field.addfield', $data);
    }

    public function store(Request $request)
    {


        $request->validate([
            'jenis_surat_id' => 'required',
            'nama_field' => 'required|string|max:255',
            'tipe_field' => 'required|in:text,number,date,time,boolean,email',
            'is_required' => 'required',
        ]);

        $data = $request->all();

        FieldSurat::create($data);

        return redirect()->route('field')->with('success', 'Jenis Surat Berhasil Ditambahkan');
    }

    public function edit($id)
    {

        $fields = FieldSurat::findorFail($id);
        $jenissurat = JenisSurat::all();

        return view('backend.field.editfield', compact(['fields', 'jenissurat']));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'jenis_surat_id' => 'required',
            'nama_field' => 'required|string|max:255',
            'tipe_field' => 'required|in:text,number,date,time,boolean,email',
            'is_required' => 'required',
        ]);

        $fields = FieldSurat::findOrFail($id);
        $data = $request->all();

        $fields->update($data);

        return redirect()->route('field')->with('success', 'Field Berhasil Diperbarui');
    }

    public function destroy($id)
    {

        $fields = FieldSurat::findOrFail($id);

        $fields->delete();

        return redirect()->route('field')->with('success', 'Field Berhasil Dihapus');
    }
}
