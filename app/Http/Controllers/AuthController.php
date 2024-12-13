<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan form pendaftaran
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        // Cek apakah admin, company, atau user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Jika user adalah admin, langsung redirect ke dashboard admin
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            // Jika user adalah company, langsung redirect ke dashboard company
            if ($user->hasRole('company')) {
                return redirect()->route('company.dashboard');
            }

            // Jika user adalah customer, redirect ke dashboard user
            return redirect()->route('user.loker');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Proses registrasi user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Assign role user secara otomatis
        $user->assignRole('user');

        Auth::login($user);

        return redirect()->route('user.loker');
    }

    // Proses login dengan Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        // Cek apakah user sudah ada
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            // Buat user baru jika belum terdaftar
            $user = new User();
            $user->id = Str::uuid(); // Generate UUID untuk kolom 'id'
            $user->google_id = $googleUser->getId();
            $user->name = $googleUser->getName();
            $user->email = $googleUser->getEmail();
            $user->avatar = $googleUser->getAvatar();
            $user->password = bcrypt(Str::random(24)); // Password acak
            $user->save();

            // Assign role default
            $user->assignRole('user');
        }

        Auth::login($user);

        return redirect()->route('user.loker');
    } catch (\Exception $e) {
        \Log::error('Error during Google Login: ' . $e->getMessage());
        return redirect('/login')->withErrors(['msg' => 'Terjadi masalah saat login']);
    }
}
}
