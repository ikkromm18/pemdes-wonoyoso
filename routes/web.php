<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataPengajuanController;
use App\Http\Controllers\FieldSuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Mail\PengajuanDiajukanMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/test', function () {
    return view('pdf.pengajuan');
});



Route::get('/api/fields/{jenisSuratsId}', [LayananController::class, 'getFieldSurats']);

Route::get('/send-email', function () {
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];

    Mail::to('hadayaa749@gmail.com')->send(new PengajuanDiajukanMail($data));
    dd("Email Berhasil dikirim.");
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware(['auth'])->group(function () {
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');

    Route::get('/riwayat', [PengajuanSuratController::class, 'history'])->name('riwayat');


    // Route::get('/riwayat', function () {
    //     return view('profile.riwayat');
    // })->middleware(['auth', 'verified'])->name('riwayat');
});

Route::middleware(['role:Admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/field', [FieldSuratController::class, 'index'])->name('field');
    Route::get('/field/create', [FieldSuratController::class, 'create'])->name('field.create');
    Route::post('/field/store', [FieldSuratController::class, 'store'])->name('field.store');
    Route::get('/field/edit/{id?}', [FieldSuratController::class, 'edit'])->name('field.edit');
    Route::put('/field/update/{id?}', [FieldSuratController::class, 'update'])->name('field.update');
    Route::delete('/field/delete/{id?}', [FieldSuratController::class, 'destroy'])->name('field.delete');


    Route::get('/jenissurat', [JenisSuratController::class, 'index'])->name('jenissurat');
    Route::get('/jenissurat/create', [JenisSuratController::class, 'create'])->name('jenissurat.create');
    Route::post('/jenissurat/store', [JenisSuratController::class, 'store'])->name('jenissurat.store');
    Route::get('/jenissurat/edit/{id?}', [JenisSuratController::class, 'edit'])->name('jenissurat.edit');
    Route::put('/jenissurat/update/{id?}', [JenisSuratController::class, 'update'])->name('jenissurat.update');
    Route::delete('/jenissurat/delete/{id?}', [JenisSuratController::class, 'destroy'])->name('jenissurat.delete');


    Route::get('/pengajuan', [PengajuanSuratController::class, 'index'])->name('pengajuansurat');
    Route::get('/pengajuan/{id}', [PengajuanSuratController::class, 'show'])->name('pengajuan.show');



    Route::get('/pengajuan/print/{id}', [PengajuanSuratController::class, 'Print'])->name('print');
    Route::get('/pengajuan/{id}/unduh', [PengajuanSuratController::class, 'unduh'])->name('pengajuan.unduh');
    Route::put('/pengajuan/updatestatus/{id?}', [PengajuanSuratController::class, 'approve'])->name('setuju');
    Route::put('/pengajuan/tolak/{id?}', [PengajuanSuratController::class, 'rejected'])->name('menolak');

    Route::patch('/pengajuan/{id}/approve', [PengajuanSuratController::class, 'approve'])->name('pengajuan.approve');
    Route::patch('/pengajuan/{id}/rejected', [PengajuanSuratController::class, 'rejected'])->name('pengajuan.rejected');

    Route::get('/datapengajuan', [DataPengajuanController::class, 'index'])->name('datapengajuan');

    Route::resource('user', UserController::class);
    Route::get('/useradmin', [UserController::class, 'indexAdmin'])->name('user.admin');
    Route::get('/editpassword/{id}', [UserController::class, 'editPassword'])->name('user.editpassword');
    Route::post('/updatepassword/{id}', [UserController::class, 'updatePassword'])->name('user.updatepassword');
});

require __DIR__ . '/auth.php';
