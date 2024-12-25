<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanDiajukanMail;
use App\Models\DataPengajuan;
use App\Models\PengajuanSurat;
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

        $pengajuansurats = PengajuanSurat::orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6)->withQueryString();

        $data = [
            'pengajuansurat' => $pengajuansurats,

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

        if (empty($user->nik) || empty($user->alamat)) {
            return redirect()->route('profile.edit')->with('error', 'Silakan lengkapi data profil Anda terlebih dahulu sebelum membuat pengajuan.');
        }

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
        $pengajuan = PengajuanSurat::where('id', $id)->first();

        if (!$pengajuan) {
            return redirect()->route('pengajuansurat')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $pengajuan->status = 'approved';
        $pengajuan->save();

        return redirect()->route('pengajuansurat')->with('success' . 'Pengajuan Berhasil Disetujui');
    }

    public function rejected($id)
    {
        $pengajuan = PengajuanSurat::where('id', $id)->first();

        if (!$pengajuan) {
            return redirect()->route('pengajuansurat')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $pengajuan->status = 'rejected';
        $pengajuan->save();

        return redirect()->route('pengajuansurat')->with('success' . 'Pengajuan Berhasil Ditolak');
    }


    public function unduh($id)
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


        // dd($data);

        if ($pengajuan->jenis_surat_id == 1) {
            return view('pdf.suratkematian', $data);
        }

        if ($pengajuan->jenis_surat_id == 2) {
            return view('pdf.pengantarumum', $data);
        }

        if ($pengajuan->jenis_surat_id == 3) {
            return view('pdf.sktm', $data);
        }

        if ($pengajuan->jenis_surat_id == 4) {
            return view('pdf.suratkelahiran', $data);
        }

        if ($pengajuan->jenis_surat_id == 5) {
            return view('pdf.suketusaha', $data);
        }


        return "Halaman Cetak Belum Dibuat";
    }

    public function history()
    {

        $user = auth()->user();
        $nik = $user->nik;


        $riwayat = PengajuanSurat::where('nik', $nik)->paginate(10);

        $data = [
            'riwayat' => $riwayat
        ];

        return view('profile.riwayat', $data);
    }
}
