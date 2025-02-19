<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\JobWork;
use Illuminate\Http\Request;

class UserJobWorkController extends Controller
{
    public function index()
    {
        $jobWorks = JobWork::paginate(10);
        return view('user.job-work.index', compact('jobWorks'));
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

        $alreadyApplied = false;
        if (auth()->check()) {
            $alreadyApplied = Candidate::where('user_id', auth()->id())
                ->where('job_id', $jobWork->id)
                ->exists();
        }

        $jobWorks = JobWork::take(2)->get();

        return view('user.job-work.show', compact('jobWork','jobWorks','alreadyApplied'));
    }
}
