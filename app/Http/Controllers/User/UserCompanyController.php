<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobWork;
use Illuminate\Http\Request;

class UserCompanyController extends Controller
{
    public function index(){

        $companies = Company::all();
        return view('user.company.index', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::find($id);
        $jobWorks = JobWork::where('company_id', $id)->paginate(2);
        return view('user.company.show', compact('company','jobWorks'));
    }
}
