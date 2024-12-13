<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanDiajukanMail;
use App\Models\DataPengajuan;
use App\Models\PengajuanSurat;
use App\Models\FieldSurat;
use App\Models\User;
use App\Notifications\NewPengajuan;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengajuanSuratController extends Controller
{

    public $nik = '';
    public $nama = '';
    public $email = '';


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

        $user = User::where('nik', $pengajuan->nik)->first();

        return response()->json([
            'id' => $pengajuan->id,
            'nik' => $pengajuan->nik,
            'nama' => $pengajuan->nama,
            'email' => $pengajuan->email,
            'alamat' => $pengajuan->alamat,
            'foto_ktp' => $user->foto_ktp,
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
            'jenis_surat_id' => 'required',
            'fields' => 'required|array'
        ]);

        $user = auth()->user();


        $pengajuan = PengajuanSurat::create([
            'nik' => $user->nik,
            'nama' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat,
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


        // Mail::to($pengajuan->email)->send(new PengajuanDiajukanMail($pengajuan));

        return redirect()->route('layanan')->with('success', 'Pengajuan berhasil diajukan!');
    }


    public function approve($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);


        $pengajuan->status = 'approved';
        $pengajuan->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan berhasil disetujui.',
        ]);


        return response()->json([
            'success' => false,
            'message' => 'Pengajuan tidak dapat disetujui.',
        ]);
    }

    public function rejected($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);


        $pengajuan->status = 'rejected';
        $pengajuan->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan ditolak.',
        ]);


        return response()->json([
            'success' => false,
            'message' => 'Gagal.',
        ]);
    }


    public function cetak($id)
    {
        $pengajuan = PengajuanSurat::with('JenisSurats', 'DataPengajuans.FieldSurats')
            ->findOrFail($id);

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


        $pdf = Pdf::loadView('pdf.pengajuan', $data);


        return $pdf->download('pengajuan_' . $pengajuan->id . '.pdf');
    }

    public function Print($id)
    {
        $pengajuan = PengajuanSurat::with('JenisSurats', 'DataPengajuans.FieldSurats')
            ->findOrFail($id);

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

        return view('pdf.pengajuan', $data);
    }
}
