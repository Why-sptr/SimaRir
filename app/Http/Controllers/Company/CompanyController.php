<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CorporateField;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CompanyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $corporateFields = CorporateField::all();
        $companies = $user->companies()->with('galleries', 'user.socialMedia', 'workTimes')->get();

        return view('company.index', compact('companies', 'corporateFields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'nullable|string|max:255',
            'corporateField' => 'required|exists:corporate_fields,id',
            'employee' => 'nullable|integer',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'moto' => 'nullable|string|max:255',
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png',
            'description' => 'nullable|string|max:500',
        ]);

        $user = auth()->user();

        $company = Company::where('user_id', $user->id)->first();

        if ($company) {

            $user->location = $request->location ?: $user->location;
            $user->moto = $request->moto ?: $user->moto;
            $user->description = $request->description ?: $user->description;
            $company->employee = $request->employee ?: $company->employee;
            $company->corporateField()->associate($request->corporateField);
            $company->save();
        } else {
            return redirect()->back()->with('error', 'Company data not found!');
        }

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $fileName = 'attachment_' . time() . '.' . $attachment->getClientOriginalExtension();
            $filePath = $attachment->storeAs('verification', $fileName, 'public');
            $user->attachment_id = basename($filePath);
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarFileName = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('avatars', $avatarFileName, 'public');
            $user->avatar = basename($avatarPath);
        }

        $user->save();

        return redirect()->route('company.index')->with('success', 'Profile updated successfully!');
    }
}
