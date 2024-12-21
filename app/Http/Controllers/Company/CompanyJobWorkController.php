<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobWork;
use App\Models\SkillJob;
use Illuminate\Http\Request;

class CompanyJobWorkController extends Controller
{
    public function store(Request $request)
    {
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
        ]);

        $jobWorkData = $validated;
        unset($jobWorkData['skill_job_id']);

        $jobWork = JobWork::create($jobWorkData);

        if (!empty($validated['skill_job_id'])) {
            foreach ($validated['skill_job_id'] as $skillId) {
                SkillJob::create([
                    'skill_id' => $skillId,
                    'job_work_id' => $jobWork->id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Lowongan pekerjaan berhasil ditambahkan.');
    }
}
