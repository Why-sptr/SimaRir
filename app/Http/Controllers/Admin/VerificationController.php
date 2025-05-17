<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        // Get companies that have submitted verification files
        $companies = Company::whereNotNull('verification_file')
            ->with(['user', 'corporateField'])
            ->get();

        return view('admin.company.verification', [
            'title' => 'Verifikasi Perusahaan',
            'companies' => $companies
        ]);
    }

    public function verify(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        if ($request->status == 'approved') {
            $company->status_verification = 1;
            $message = 'Perusahaan berhasil diverifikasi';
        } else {
            $company->status_verification = 2;
            $company->verification_file = null;
            $message = 'Verifikasi perusahaan ditolak';
        }

        $company->save();

        return redirect()->route('verification.index')
            ->with('success', $message);
    }
}
