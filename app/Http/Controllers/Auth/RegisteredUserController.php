<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\RegisterUserNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('home', absolute: false));
    // }

    public function daftar(Request $request): RedirectResponse
    {
        // Validasi data input termasuk file upload
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nik' => ['nullable', 'regex:/^\d{16}$/'], // Validasi NIK harus 16 digit angka
            'nomor_hp' => ['nullable'],
            'agama' => ['nullable', 'string', 'max:255'],
            'pekerjaan' => ['nullable', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['nullable', 'date'],
            'alamat_utama' => ['nullable', 'string', 'max:255'],
            'alamat_kedua' => ['nullable', 'string', 'max:255'],
            'foto_ktp' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Max 2MB
            'foto_kk' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],  // Max 2MB
        ]);

        // Persiapkan nama file untuk foto KTP dan KK
        $fotoKTP = null;
        if ($request->hasFile('foto_ktp')) {
            $imageName = uniqid() . '.' . $request->file('foto_ktp')->extension();
            $request->file('foto_ktp')->move(public_path('uploaded/foto_ktp'), $imageName);
            $fotoKTP = url('uploaded/foto_ktp/' . $imageName);
        }

        $fotoKK = null;
        if ($request->hasFile('foto_kk')) {
            $imageName = uniqid() . '.' . $request->file('foto_kk')->extension();
            $request->file('foto_kk')->move(public_path('uploaded/foto_kk'), $imageName);
            $fotoKK = url('uploaded/foto_kk/' . $imageName);
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'nomor_hp' => $request->nomor_hp,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat_utama' => $request->alamat_utama,
            'alamat_kedua' => $request->alamat_kedua,
            'foto_ktp' => $fotoKTP,
            'foto_kk' => $fotoKK,
        ]);

        event(new Registered($user));

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new RegisterUserNotification($user));
        }


        // Redirect ke halaman login
        // return redirect(route('login', absolute: false));
        return redirect()->route('login')->with('success', 'Registrasi Sukses, Silahkan Login');
    }
}
