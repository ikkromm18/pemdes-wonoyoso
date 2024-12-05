<?php

namespace App\Http\Controllers;

use App\Models\DataPengajuan;
use App\Models\PengajuanSurat;
use App\Models\FieldSurat;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{

    public function index()
    {

        $pengajuansurats = PengajuanSurat::all();

        $datapengajuan = DataPengajuan::all();


        $data = [
            'pengajuansurat' => $pengajuansurats,
            'datapengajuan' => $datapengajuan
        ];



        return view('backend.pengajuan.index', $data);
    }

    public function show($id)
    {
        $pengajuan = PengajuanSurat::with('JenisSurats', 'DataPengajuans.FieldSurats')
            ->findOrFail($id);

        return response()->json([
            'id' => $pengajuan->id,
            'nik' => $pengajuan->nik,
            'nama' => $pengajuan->nama,
            'email' => $pengajuan->email,
            'alamat' => $pengajuan->alamat,
            'jenis_surat' => $pengajuan->JenisSurats->nama_jenis,
            'status' => $pengajuan->status,
            'details' => $pengajuan->DataPengajuans->map(function ($detail) {
                return [
                    'nama_field' => $detail->fieldSurats->nama_field,
                    'nilai' => $detail->nilai,
                ];
            }),
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required',
            'jenis_surat_id' => 'required',
            'fields' => 'required|array'
        ]);
        // Simpan data pengajuan

        $pengajuan = PengajuanSurat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_surat_id' => $request->jenis_surat_id,
            'status' => 'pending',
        ]);

        foreach ($request->fields as $fieldId => $value) {
            DataPengajuan::create([
                'pengajuan_id' => $pengajuan->id,
                'field_id' => $fieldId,
                'nilai' => $value,
            ]);
        }
        return redirect()->route('layanan')->with('success', 'Pengajuan berhasil diajukan!');
    }

    public function cetak($id)
    {
        $pengajuan = PengajuanSurat::with('JenisSurats', 'DataPengajuans.FieldSurats')
            ->findOrFail($id);

        // Siapkan data untuk PDF
        $data = [
            'id' => $pengajuan->id,
            'nik' => $pengajuan->nik,
            'nama' => $pengajuan->nama,
            'email' => $pengajuan->email,
            'alamat' => $pengajuan->alamat,
            'jenis_surat' => $pengajuan->JenisSurats->nama_jenis,
            'status' => $pengajuan->status,
            'details' => $pengajuan->DataPengajuans->map(function ($detail) {
                return [
                    'nama_field' => $detail->fieldSurats->nama_field,
                    'nilai' => $detail->nilai,
                ];
            }),
        ];

        // Load view PDF
        $pdf = Pdf::loadView('pdf.pengajuan', $data);

        // Unduh PDF
        return $pdf->download('pengajuan_' . $pengajuan->id . '.pdf');
    }
}
