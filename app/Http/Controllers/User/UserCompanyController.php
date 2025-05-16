<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCompanyController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');

        $companies = Company::whereHas('user', function ($query) use ($search) {
            if (!empty($search)) {
                $query->where('name', 'like', "%{$search}%");
            }
        })->paginate(9)->withQueryString();

        return view('user.company.index', compact('companies','user'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $company = Company::find($id);
        $jobWorks = JobWork::where('company_id', $id)->paginate(2);
        return view('user.company.show', compact('company', 'jobWorks','user'));
    }
}
