<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Notifications\UserStatusNotification;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $users = User::where('role', 'User')
            ->where('is_active', true) // Menambahkan kondisi is_active = true
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(7)
            ->withQueryString();

        // $users = User::where('role', 'User')->paginate(7);

        $data = [
            'users' => $users
        ];


        return view('backend.user.index-user', $data);
    }

    public function unactive(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('role', 'User')
            ->where('is_active', false) // Menambahkan kondisi is_active = true
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(7)
            ->withQueryString();

        // $users = User::where('role', 'User')->paginate(7);

        $data = [
            'users' => $users
        ];


        return view('backend.user.index-user', $data);
    }

    public function indexAdmin(Request $request)
    {

        $search = $request->input('search');


        // $users = User::where('role', 'Admin')->paginate(7);

        $users = User::where('role', 'Admin')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(7)
            ->withQueryString();

        $data = [
            'users' => $users
        ];

        return view('backend.user.index-admin', $data);
    }

    public function create()
    {
        return view('backend.user.add-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomor_hp' => ['nullable'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'nomor_hp' => $request->nomor_hp,
            'role' => 'Admin'
        ]);

        event(new Registered($user));


        return redirect()->route('user.admin')->with('success', 'Berhasil Menambahkan Admin');

        return "Berhasil Menambahkan";
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit-admin', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();

        $user->update($data);

        return redirect()->route('user.admin')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasi dihapus');
    }

    public function editPassword($id)
    {

        $user = User::findOrFail($id);
        return view('backend.user.edit-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'konfirmpassword' => 'required|same:newpassword',
        ], [
            'oldpassword.required' => 'Password lama wajib diisi.',
            'newpassword.required' => 'Password baru wajib diisi.',
            'newpassword.min' => 'Password baru minimal 8 karakter.',
            'konfirmpassword.required' => 'Konfirmasi password wajib diisi.',
            'konfirmpassword.same' => 'Konfirmasi password harus sama dengan password baru.',
        ]);

        $user = User::findOrFail($id);


        if (!Hash::check($request->oldpassword, $user->password)) {
            return back()->withErrors(['oldpassword' => 'Password lama tidak sesuai.']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->route('user.admin')->with('success', 'Password berhasil diperbarui.');
    }

    public function verifikasi(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $data = [
            'is_active' => true
        ];

        $user->update($data);

        $user->notify(new UserStatusNotification($user, $request->is_active));

        return redirect()->route('user.index')->with('success', 'User Berhasil Diverifikasi');
    }
}
