<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $companies = $user->companies()->with('galleries', 'user.socialMedia', 'workTimes')->get();

        return view('company.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'instagram' => 'nullable|url',
            'github' => 'nullable|url',
            'youtube' => 'nullable|url',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        // Simpan atau update media sosial
        $socialMedia = $user->socialMedia()->firstOrNew(); // Jika sudah ada, update, jika tidak buat baru
        $socialMedia->fill($validated);
        $socialMedia->save();

        return redirect()->route('company.index'); // Redirect ke halaman perusahaan atau halaman yang sesuai
    }
}
