<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());
        $user = $request->user();

        $validatedData = $request->validated();

        // update
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->nik = $validatedData['nik'];

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
