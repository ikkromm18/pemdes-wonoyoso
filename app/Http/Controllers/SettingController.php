<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $layout = Setting::first();

        $data = [
            'layout' => $layout
        ];
        return view('backend.setting.index-setting', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kepala_desa' => 'required|string|max:255'
        ]);

        $layout = Setting::findOrFail($id);

        $layout->update($request->all());

        return redirect()->route('setting')->with('success', 'Layout Berhasil di Update');
    }
}
