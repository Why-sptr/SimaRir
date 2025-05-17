<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:15'],
            'avatar' => ['nullable', 'image', 'max:1024'],
        ]);

        $data = $request->except('avatar', 'password_confirmation');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('admin-avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $admin = Admin::create($data);

        Auth::guard('admin')->login($admin);

        return redirect(route('admin.index'))->with('status', 'Berhasil menambahkan admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile', ['admin' => Auth::guard('admin')->user()]);
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,'.$admin->id],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:15'],
            'avatar' => ['nullable', 'image', 'max:1024'],
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($admin->avatar) {
                Storage::disk('public')->delete($admin->avatar);
            }
            $avatarPath = $request->file('avatar')->store('admin-avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $admin->update($data);

        return back()->with('status', 'Profile updated successfully');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
