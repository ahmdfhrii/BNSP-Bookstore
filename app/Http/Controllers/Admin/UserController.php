<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    // TAMBAHKAN INI
    public function create()
    {
        return view('admin.users.create');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
            'dob'      => 'nullable|date',
            'gender'   => 'nullable|in:Laki-laki,Perempuan',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role'     => 'customer',
            'phone'    => $request->phone,
            'address'  => $request->address,
            'dob'      => $request->dob,
            'gender'   => $request->gender,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
{
    $user = User::findOrFail($id);

    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'phone'    => 'nullable|string|max:20',
        'address'  => 'nullable|string',
        'dob'      => 'nullable|date',
        'gender'   => 'nullable|in:Laki-Laki,Perempuan',
        'role'     => 'required|in:admin,customer',
    ]);

    $user->update([
        'name'     => $request->name,
        'username' => $request->username,
        'email'    => $request->email,
        'role'     => $request->role,
        'phone'    => $request->phone,
        'address'  => $request->address,
        'dob'      => $request->dob,
        'gender'   => $request->gender,
    ]);

    // Update password jika diisi
    if ($request->filled('password')) {
        $user->update([
            'password' => bcrypt($request->password)
        ]);
    }

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Data pengguna berhasil diperbarui.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Pengguna berhasil dihapus.');
}
}
