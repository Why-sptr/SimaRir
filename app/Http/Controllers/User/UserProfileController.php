<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Certification;
use App\Models\Education;
use App\Models\JobRole;
use App\Models\RecentWorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $educations = Education::all();
        $workExperiences = RecentWorkExperience::where('user_id', $user->id)->get();
        $certificates = Certification::where('user_id', $user->id)->get();
        $organizations = Auth::user()->organizations;
        $jobRoles = JobRole::all();

        return view('user.profile.index', compact('user', 'educations', 'workExperiences', 'certificates', 'organizations', 'jobRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'nullable|string|max:255',
            'moto' => 'nullable|string|max:255',
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png',
            'description' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'portfolio' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'job_role_id' => 'nullable|exists:job_roles,id',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User data not found!');
        }

        $user->location = $request->location ?: $user->location;
        $user->moto = $request->moto ?: $user->moto;
        $user->work_experience = $request->work_experience ?: $user->work_experience;
        $user->phone = $request->phone ?: $user->phone;
        $user->gender = $request->gender ?: $user->gender;
        $user->education_id = $request->education_id ?: $user->education_id;
        $user->job_role_id = $request->job_role_id ?: $user->job_role_id;
        $user->description = $request->description ?: $user->description;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarFileName = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('avatars', $avatarFileName, 'public');
            $user->avatar = basename($avatarPath);
        }

        $attachment = $user->attachment_id
            ? Attachment::find($user->attachment_id)
            : new Attachment();

        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = 'cv_' . $user->name . '_' . time() . '.' . $cvFile->getClientOriginalExtension();
            $cvPath = $cvFile->storeAs('attachments', $cvFileName, 'public');
            $attachment->cv = basename($cvPath);
        }

        if ($request->hasFile('portfolio')) {
            $portfolioFile = $request->file('portfolio');
            $portfolioFileName = 'portfolio_' . $user->name . '_' . time() . '.' . $portfolioFile->getClientOriginalExtension();
            $portfolioPath = $portfolioFile->storeAs('attachments', $portfolioFileName, 'public');
            $attachment->portfolio = basename($portfolioPath);
        }

        $attachment->save();
        $user->attachment_id = $attachment->id;

        $user->save();

        return redirect()->route('user-profile.index')->with('success', 'Profile updated successfully!');
    }
}
