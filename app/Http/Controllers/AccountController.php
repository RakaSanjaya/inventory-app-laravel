<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $query = User::query();
        if (auth()->check()) {
            $query->where('id', '!=', auth()->id());
        }
        $users = $query->get();
        return view('accounts.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,admin,super_admin',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update($request->only(['name', 'email', 'role', 'phone', 'address']));

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent users from deleting themselves
        if ($user->id === auth()->id()) {
            return redirect()->route('accounts.index')->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        $user->delete();
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus.');
    }
}
