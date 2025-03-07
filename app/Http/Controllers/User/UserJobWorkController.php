<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\JobWork;
use App\Models\WorkMethod;
use App\Models\WorkType;
use Illuminate\Http\Request;

class UserJobWorkController extends Controller
{
    public function index(Request $request)
    {
        $workTypes = WorkType::all();
        $workMethods = WorkMethod::all();

        $query = JobWork::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($request->has('work_types') && !empty($request->work_types)) {
            $query->whereIn('work_type_id', $request->work_types);
        }

        if ($request->has('work_methods') && !empty($request->work_methods)) {
            $query->whereIn('work_method_id', $request->work_methods);
        }

        if ($request->has('location') && $request->location != '') {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $jobWorks = $query->paginate(10)->withQueryString();

        return view('user.job-work.index', compact('jobWorks', 'workTypes', 'workMethods'));
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

        return view('user.job-work.show', compact('jobWork', 'jobWorks', 'alreadyApplied'));
    }
}
