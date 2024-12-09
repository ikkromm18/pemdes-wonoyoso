<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataPengajuanController;
use App\Http\Controllers\FieldSuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Mail\PengajuanDiajukanMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::post('/pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan.store');


Route::get('/api/fields/{jenisSuratsId}', [LayananController::class, 'getFieldSurats']);





Route::get('/dashboard', function () {
    return view('backend.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/send-email', function () {
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];

    Mail::to('emailtujuan@gmail.com')->send(new PengajuanDiajukanMail($data));

    dd("Email Berhasil dikirim.");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/field', [FieldSuratController::class, 'index'])->name('field');

    Route::get('/jenissurat', [JenisSuratController::class, 'index'])->name('jenissurat');

    Route::get('/pengajuan', [PengajuanSuratController::class, 'index'])->name('pengajuansurat');
    Route::get('/pengajuan/{id}', [PengajuanSuratController::class, 'show'])->name('pengajuan.show');

    Route::get('/pengajuan/{id}/cetak', [PengajuanSuratController::class, 'cetak'])->name('pengajuan.cetak');

    Route::get('/datapengajuan', [DataPengajuanController::class, 'index'])->name('datapengajuan');
});

require __DIR__ . '/auth.php';
