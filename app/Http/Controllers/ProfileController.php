<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $user = $request->user();


        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());


        $user = $request->user();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
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

        // update
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->nik = $request['nik'];
        $user->nomor_hp = $request['nomor_hp'];
        $user->agama = $request['agama'];
        $user->pekerjaan = $request['pekerjaan'];
        $user->tempat_lahir = $request['tempat_lahir'];
        $user->tgl_lahir = $request['tgl_lahir'];
        $user->alamat_utama = $request['alamat_utama'];
        $user->alamat_kedua = $request['alamat_kedua'];

        if ($request->hasFile('foto_ktp')) {

            if ($user->foto_ktp) {
                Storage::delete('public/' . $user->foto_ktp);
            }


            $imageName = uniqid() . '.' . $request->file('foto_ktp')->extension();
            $request->file('foto_ktp')->move(public_path('uploaded/foto_ktp'), $imageName);
            $user->foto_ktp = url('uploaded/foto_ktp/' . $imageName);
        }

        if ($request->hasFile('foto_kk')) {

            if ($user->foto_kk) {
                Storage::delete('public/' . $user->foto_kk);
            }

            $imageName = uniqid() . '.' . $request->file('foto_kk')->extension();
            $request->file('foto_kk')->move(public_path('uploaded/foto_kk'), $imageName);
            $user->foto_kk = url('uploaded/foto_kk/' . $imageName);
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
