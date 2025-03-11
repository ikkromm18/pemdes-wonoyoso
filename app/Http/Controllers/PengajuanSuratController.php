<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanDiajukanMail;
use App\Models\DataPengajuan;
use App\Models\PengajuanSurat;
use App\Models\User;
use App\Models\FieldSurat;

use App\Notifications\NewPengajuan;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class PengajuanSuratController extends Controller
{

    public $nik = '';
    public $nama = '';
    public $email = '';


    public function index(Request $request)
    {
        $search = $request->input('search');

        // $pengajuansurats = PengajuanSurat::orderBy('updated_at', 'desc')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(6)->withQueryString();

        $pengajuansurats = PengajuanSurat::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('jenis_surat', 'like', "%{$search}%");
        })
            ->orderBy('updated_at', 'desc')
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
            'foto_kk' => $user->foto_kk,
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

    public function detail($id)
    {

        $pengajuan = PengajuanSurat::with('JenisSurats', 'DataPengajuans.FieldSurats')
            ->findOrFail($id);

        $user = User::where('nik', $pengajuan->nik)->first();

        $details = DataPengajuan::where('pengajuan_id', $pengajuan->id)->get();
        // dd($pengajuan);

        $data = [
            'pengajuan' => $pengajuan,
            'user' => $user,
            'detail' => $details
        ];



        return view('backend.pengajuan.detailpengajuan', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat_id' => 'required',
            'fields' => 'required|array',
        ]);

        $user = $request->user();

        if (empty($user->nik) || empty($user->alamat_utama)) {
            return redirect()->route('profile.edit')->with('error', 'Silakan lengkapi data profil Anda terlebih dahulu sebelum membuat pengajuan.');
        }

        $pengajuan = PengajuanSurat::create([
            'nik' => $user->nik,
            'nama' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat_utama,
            'jenis_surat_id' => $request->jenis_surat_id,
            'status' => 'diajukan',
        ]);

        foreach ($request->fields as $fieldId => $value) {
            $field = FieldSurat::find($fieldId);

            if ($field && $field->tipe_field === 'file' && $request->hasFile("fields.$fieldId")) {
                $file = $request->file("fields.$fieldId");

                // Hapus file lama jika ada
                $existingData = DataPengajuan::where('pengajuan_id', $pengajuan->id)
                    ->where('field_id', $fieldId)
                    ->first();

                if ($existingData && !empty($existingData->nilai)) {
                    $oldFilePath = public_path(str_replace(url('/'), '', $existingData->nilai));
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Simpan file baru
                $fileName = uniqid() . '.' . $file->extension();
                $filePath = 'uploaded/foto_pengajuan/' . $fileName;
                $file->move(public_path('uploaded/foto_pengajuan'), $fileName);

                // Simpan URL file di database
                $value = url($filePath);
            }

            DataPengajuan::create([
                'pengajuan_id' => $pengajuan->id,
                'field_id' => $fieldId,
                'nilai' => $value,
            ]);
        }

        return redirect()->route('layanan')->with('success', 'Pengajuan berhasil diajukan!');
    }


    public function approve(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'nullable|string|max:255',
        ]);


        $pengajuan = PengajuanSurat::where('id', $id)->first();

        if (!$pengajuan) {
            return redirect()->route('pengajuan.diproses')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $data = [
            'status' => 'diproses',
            'keterangan' => $request->keterangan,
        ];


        $pengajuan->update($data);


        return redirect()->route('pengajuan.disetujui')->with('success' . 'Pengajuan Berhasil Disetujui');
    }

    public function rejected(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'nullable|string|max:255',
        ]);

        $pengajuan = PengajuanSurat::where('id', $id)->first();

        if (!$pengajuan) {
            return redirect()->route('pengajuan.diproses')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $data = [
            'status' => 'ditolak',
            'keterangan' => $request->keterangan,
        ];

        $pengajuan->update($data);

        return redirect()->route('pengajuan.ditolak')->with('success' . 'Pengajuan Berhasil Ditolak');
    }

    public function selesai($id)
    {
        $pengajuan = PengajuanSurat::where('id', $id)->first();

        if (!$pengajuan) {
            return redirect()->route('pengajuan.diproses')->with('error', 'Pengajuan tidak ditemukan.');
        }

        $data = [
            'status' => 'selesai',
        ];


        $pengajuan->update($data);

        return redirect()->route('pengajuan.disetujui')->with('success' . 'Pengajuan Selesai');
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

        if ($pengajuan->jenis_surat_id == 6) {
            return view('pdf.suketdomisili', $data);
        }

        if ($pengajuan->jenis_surat_id == 7) {
            return view('pdf.suketahliwaris', $data);
        }


        if ($pengajuan->jenis_surat_id == 8) {
            return view('pdf.pengantarizinkeramaian', $data);
        }


        if ($pengajuan->jenis_surat_id == 9) {
            return view('pdf.suketpindahpenduduk', $data);
        }

        if ($pengajuan->jenis_surat_id == 10) {
            return view('pdf.suketkehilangan', $data);
        }

        if ($pengajuan->jenis_surat_id == 11) {
            return view('pdf.suketdomisiliusaha', $data);
        }

        if ($pengajuan->jenis_surat_id == 12) {
            return view('pdf.pengantarimb', $data);
        }
        if ($pengajuan->jenis_surat_id == 13) {
            return view('pdf.pengantarskck', $data);
        }


        return view('pdf.template', $data);
    }

    public function history(Request $request)
    {

        $user = $request->user();

        $nik = $user->nik;


        $riwayat = PengajuanSurat::where('nik', $nik)->paginate(10);

        $data = [
            'riwayat' => $riwayat
        ];

        return view('profile.riwayat', $data);
    }

    public function diproses(Request $request)
    {
        $search = $request->input('search');

        $pengajuansurats = PengajuanSurat::where('status', 'diajukan')->when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('jenis_surat', 'like', "%{$search}%");
        })
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6)->withQueryString();

        $data = [
            'pengajuansurat' => $pengajuansurats,

        ];

        return view('backend.pengajuan.pengajuandiproses', $data);
    }

    public function disetujui(Request $request)
    {
        $search = $request->input('search');

        $pengajuansurats = PengajuanSurat::where(function ($query) {
            $query->where('status', 'diproses')
                ->orWhere('status', 'selesai');
        })
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('jenis_surat', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6)->withQueryString();

        $data = [
            'pengajuansurat' => $pengajuansurats,
        ];

        return view('backend.pengajuan.pengajuandisetujui', $data);
    }
    public function ditolak(Request $request)
    {
        $search = $request->input('search');

        // Ambil data dengan status "ditolak"
        $pengajuansurats = PengajuanSurat::where('status', 'ditolak')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('jenis_surat', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6)->withQueryString();

        $data = [
            'pengajuansurat' => $pengajuansurats,
        ];

        return view('backend.pengajuan.pengajuanditolak', $data);
    }
}
