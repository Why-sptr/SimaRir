<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin-user.index', [
            'title' => 'List Admin',
            'admins' => $admins
        ]);
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin-user.edit', [
            'title' => 'Edit Profile Admin',
            'admin' => $admin
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($admin->avatar) {
                Storage::disk('public')->delete('admin-avatars/' . $admin->avatar);
            }

            $avatar = $request->file('avatar');
            $avatarFileName = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('admin-avatars', $avatarFileName, 'public');
            $validated['avatar'] = basename($avatarPath);
        }

        // Only update password if provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        return redirect()->route('admin.edit', $admin->id)
            ->with('success', 'Profile admin berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Delete avatar if exists
        if ($admin->avatar) {
            Storage::disk('public')->delete('avatars/' . $admin->avatar);
        }

        $admin->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Admin berhasil dihapus');
    }
}
