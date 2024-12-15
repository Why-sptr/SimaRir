<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CorporateField;
use App\Models\Education;
use App\Models\JobRole;
use App\Models\SocialMedia;
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
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        $educations = Education::all();
        $jobRoles = JobRole::all();

        return view('auth.register', [
            'name' => session('name', ''),
            'email' => session('email', ''),
            'phone' => '',
            'location' => '',
            'date_birth' => '',
            'gender' => '',
            'work_experience' => '',
            'description' => '',
            'moto' => '',
            'educations' => $educations,
            'jobRoles' => $jobRoles
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->hasRole('company')) {
                return redirect()->route('company.dashboard');
            }

            return redirect()->route('user.loker');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function register(Request $request)
    {
        Log::info('Proses pendaftaran dimulai.');

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'education' => 'required|exists:educations,id',
                'job_role' => 'required|exists:job_roles,id',
                'google_id' => 'required|string|unique:users,google_id',
            ]);

            Log::info('Validasi berhasil.', $validated);

            $password = Str::random(12);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'moto' => $request->input('moto'),
                'location' => $request->input('location'),
                'date_birth' => $request->input('date_birth'),
                'password' => bcrypt($password),
                'education_id' => $validated['education'],
                'job_role_id' => $validated['job_role'],
                'google_id' => $validated['google_id'],
            ]);

            Log::info('User berhasil dibuat.', ['user_id' => $user->id]);
            $user->assignRole('user');
            auth()->login($user);

            return redirect()->route('user.loker')->with('password', $password);
        } catch (\Exception $e) {
            Log::error('Error pada saat pendaftaran:', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.'])->withInput();
        }
    }

    public function showRegisterFormCompany()
    {
        $corporateFields = CorporateField::all();
        return view('auth.register-company', [
            'name' => session('name', ''),
            'email' => session('email', ''),
            'phone' => '',
            'name' => '',
            'location' => '',
            'description' => '',
            'google_id' => session('google_id', ''),
            'corporateFields' => $corporateFields,
        ]);
    }

    public function registerCompany(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|string|max:15',
                'location' => 'required|string|max:255',
                'google_id' => 'required|string|unique:users,google_id',
                'corporate_field_id' => 'required|exists:corporate_fields,id',
                'employee' => 'required|integer|min:1',
            ]);

            $password = Str::random(12);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'location' => $validated['location'],
                'password' => bcrypt($password),
                'google_id' => $validated['google_id'],
            ]);

            $user->assignRole('company');
            $user->role = 'company';
            $user->save();

            Company::create([
                'user_id' => $user->id,
                'corporate_field_id' => $validated['corporate_field_id'],
                'employee' => $validated['employee'],
                'verification_file' => null,
                'status_verification' => false,
            ]);

            auth()->login($user);

            return redirect()->route('company.dashboard')->with('password', $password);
        } catch (\Exception $e) {
            // Log error
            Log::error('Error during Company Registration:', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.'])->withInput();
        }
    }


    public function redirectToGoogle(Request $request)
    {
        $role = $request->query('role', 'user');
        Log::info('Redirecting to Google dengan role:', ['role' => $role]);

        session(['role' => $role]);

        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback(Request $request)
    {
        try {
            $role = $request->query('role', session('role', 'user'));
            Log::info('Role yang diterima setelah login:', ['role' => $role]);

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                if ($role === 'company') {
                    return redirect()->route('register.company')->with([
                        'google_id' => $googleUser->getId(),
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);
                }

                return redirect()->route('register')->with([
                    'google_id' => $googleUser->getId(),
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            }

            Auth::login($user);

            if (!$user->role) {
                if ($role === 'company') {
                    return redirect()->route('register.company');
                }
                return redirect()->route('register');
            }

            if ($user->hasRole('company')) {
                return redirect()->route('company.dashboard');
            }

            return redirect()->route('user.loker');
        } catch (\Exception $e) {
            Log::error('Error during Google Login: ' . $e->getMessage());
            return redirect('/login')->withErrors(['msg' => 'Terjadi masalah saat login']);
        }
    }
}
