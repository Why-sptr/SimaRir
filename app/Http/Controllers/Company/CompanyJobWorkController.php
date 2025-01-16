<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\JobRole;
use App\Models\JobWork;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\SkillJob;
use App\Models\WorkMethod;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompanyJobWorkController extends Controller
{
    public function create()
    {
        $workTypes = WorkType::all();
        $workMethods = WorkMethod::all();
        $jobRoles = JobRole::all();
        $skills = Skill::all();
        $educations = Education::all();

        return view('company.create-job', compact('workTypes', 'workMethods', 'jobRoles', 'skills', 'educations'));
    }

    public function store(Request $request)
    {
        Log::info('Request data: ' . json_encode($request->all()));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'work_type_id' => 'nullable|exists:work_types,id',
            'work_method_id' => 'nullable|exists:work_methods,id',
            'job_role_id' => 'nullable|exists:job_roles,id',
            'skill_job_id' => 'nullable|array',
            'skill_job_id.*' => 'exists:skills,id',
            'qualification.work_experience' => 'required|numeric|min:0',
            'qualification.education_id' => 'required|exists:educations,id',
            'qualification.major' => 'required|string|max:255',
            'qualification.ipk' => 'required|numeric|min:0|max:4',
            'qualification.toefl' => 'required|numeric|min:0',
        ]);

        $company = auth()->user()->companies()->first();

        if (!$company) {
            Log::error('Perusahaan tidak ditemukan.');
            return redirect()->back()->withErrors('Perusahaan tidak ditemukan.');
        }

        $qualificationData = $validated['qualification'];
        $qualification = Qualification::create($qualificationData);

        if (!$qualification) {
            Log::error('Gagal menyimpan data kualifikasi. Data: ' . json_encode($qualificationData));
            return redirect()->back()->withErrors('Gagal menyimpan data kualifikasi.');
        }

        $jobWorkData = $validated;
        $jobWorkData['company_id'] = $company->id;
        $jobWorkData['qualification_id'] = $qualification->id;
        unset($jobWorkData['skill_job_id'], $jobWorkData['qualification']);

        Log::info('Data job work: ' . json_encode($jobWorkData));

        $jobWork = JobWork::create($jobWorkData);

        if (!$jobWork) {
            Log::error('Gagal menyimpan data job work. Data: ' . json_encode($jobWorkData));
            return redirect()->back()->withErrors('Gagal menyimpan data job work.');
        }

        if (!empty($validated['skill_job_id'])) {
            foreach ($validated['skill_job_id'] as $skillId) {
                SkillJob::create([
                    'skill_id' => $skillId,
                    'job_id' => $jobWork->id,
                ]);
            }
        }

        return redirect()->route('company.index')->with('success', 'Lowongan pekerjaan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jobWork = JobWork::with([
            'workType',
            'workMethod',
            'jobRole',
            'qualification',
            'candidates',
            'bookmarks',
            'skillJobs'
        ])->findOrFail($id);

        return view('company.detail-job', compact('jobWork'));
    }
}
