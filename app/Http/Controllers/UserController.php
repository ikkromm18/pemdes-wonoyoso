<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $users = User::where('role', 'User')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
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

    public function create() {}

    public function store(Request $request) {}

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
}
