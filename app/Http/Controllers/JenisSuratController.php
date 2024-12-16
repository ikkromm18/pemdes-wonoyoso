<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {

        $jenisSurats = JenisSurat::paginate(7)->withQueryString();

        $data = [
            'jenisSurats' => $jenisSurats
        ];

        // dd($data);

        return view('backend.jenissurat.index', $data);
    }

    public function create()
    {
        return view('backend.jenissurat.addjenissurat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255'
        ]);

        JenisSurat::create($request->all());

        return redirect()->route('jenissurat')->with('success', 'Jenis Surat Berhasil Ditambahkan');
    }

    public function edit($id)
    {

        $jenisSurats = JenisSurat::findOrFail($id);

        return view('backend.jenissurat.editjenissurat', compact('jenisSurats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255'
        ]);

        $jenisSurats = JenisSurat::findOrFail($id);
        $jenisSurats->update($request->all());

        return redirect()->route('jenissurat')->with('success', 'Surat Berhasil di Update');
    }

    public function destroy($id)
    {
        $jenisSurats = JenisSurat::findOrFail($id);

        $jenisSurats->delete();

        return redirect()->route('jenissurat')->with('success', 'Data Jenis Surat Berhasil Dihapus');
    }
}
