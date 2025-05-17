<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with(['user', 'corporateField'])->get();

        return view('admin.company.index', [
            'title' => 'Perusahaan',
            'companies' => $companies
        ]);
    }

    public function show($id)
    {
        $company = Company::with([
            'user',
            'corporateField',
            'galleries',
            'jobWorks',
            'workTimes'
        ])->findOrFail($id);

        return view('admin.company.show', [
            'title' => 'Detail Perusahaan',
            'company' => $company
        ]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect()->route('admin.company.index')
            ->with('success', 'Perusahaan berhasil dihapus');
    }

    public function verify(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        
        $company->status_verification = $request->status;
        $company->save();

        $statusText = $request->status == 'approved' ? 'disetujui' : 'ditolak';
        
        return redirect()->route('company.show', $company->id)
            ->with('success', "Perusahaan berhasil $statusText");
    }
}