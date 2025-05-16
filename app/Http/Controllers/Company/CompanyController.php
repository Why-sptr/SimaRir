<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CorporateField;
use App\Models\JobRole;
use App\Models\JobWork;
use App\Models\Skill;
use App\Models\SkillJob;
use App\Models\User;
use App\Models\WorkMethod;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CompanyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $corporateFields = CorporateField::all();
        $currentDate = now()->format('Y-m-d');
        $workTypes = WorkType::all();
        $workMethods = WorkMethod::all();
        $jobRoles = JobRole::all();
        $skills = Skill::all();
        $jobWorks = JobWork::whereHas('company', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->with([
                'workType',
                'workMethod',
                'jobRole',
                'qualification.education',
                'skillJobs',
                'company.user',
            ])
            ->orderByRaw("CASE WHEN end_date IS NULL OR end_date >= '$currentDate' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        $companies = Company::where('user_id', $user->id)->with([
            'galleries',
            'user.socialMedia',
            'workTimes',
            'jobWorks.workType',
            'jobWorks.workMethod',
            'jobWorks.jobRole',
            'jobWorks.qualification',
            'jobWorks.candidates',
            'jobWorks.bookmarks',
            'corporateField'
        ])->get();

        return view('company.index', compact('companies', 'corporateFields', 'workTypes', 'workMethods', 'jobRoles', 'skills', 'jobWorks', 'user', 'currentDate'));
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
