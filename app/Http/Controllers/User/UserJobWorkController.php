<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\JobWork;
use App\Models\SkillJob;
use App\Models\WorkMethod;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserJobWorkController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $workTypes = WorkType::all();
        $workMethods = WorkMethod::all();

        $query = JobWork::query();

        // Get authenticated user
        $user = auth()->user();
        $userHasSkills = false;
        $filteredBySkills = false;
        $userSkillIds = [];

        // Apply filters
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
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

        // Get all job works with their skills
        $allJobs = $query->with(['skillJobs.skill'])->get();

        // Check if user is logged in and has skills
        if ($user) {
            $userSkills = $user->skills;
            if ($userSkills->count() > 0) {
                $userHasSkills = true;
                $userSkillIds = $userSkills->pluck('id')->toArray();

                // For each job, calculate matching skills with user
                $matchingJobs = collect();
                $nonMatchingJobs = collect();

                foreach ($allJobs as $jobWork) {
                    $jobSkillIds = $jobWork->skillJobs->pluck('skill_id')->toArray();
                    $jobWork->matchingSkills = array_intersect($userSkillIds, $jobSkillIds);
                    $jobWork->matchingSkillsCount = count($jobWork->matchingSkills);

                    // Split jobs into matching and non-matching collections
                    if ($jobWork->matchingSkillsCount > 0) {
                        $matchingJobs->push($jobWork);
                    } else {
                        $nonMatchingJobs->push($jobWork);
                    }
                }

                // Sort matching jobs by matchingSkillsCount (descending)
                $matchingJobs = $matchingJobs->sortByDesc('matchingSkillsCount');

                // Merge collections - matching jobs first, then non-matching jobs
                $allJobs = $matchingJobs->merge($nonMatchingJobs);

                // Set filtered flag if we have matching jobs
                if ($matchingJobs->count() > 0) {
                    $filteredBySkills = true;
                }
            }
        } else {
            // If user is not logged in, ensure we set matchingSkillsCount to 0 for all jobs
            foreach ($allJobs as $jobWork) {
                $jobWork->matchingSkills = [];
                $jobWork->matchingSkillsCount = 0;
            }
        }

        // Manual pagination for sorted collection
        $page = request()->get('page', 1);
        $perPage = 10;
        $total = $allJobs->count();
        $currentPageItems = $allJobs->slice(($page - 1) * $perPage, $perPage);

        // Create a new paginator instance
        $jobWorks = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $total,
            $perPage,
            $page,
            ['path' => \Request::url(), 'query' => $request->query()]
        );

        return view('user.job-work.index', compact(
            'jobWorks',
            'workTypes',
            'workMethods',
            'userHasSkills',
            'filteredBySkills',
            'user'
        ));
    }

    public function show($id)
    {
        $user = Auth::user();
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

        return view('user.job-work.show', compact('jobWork', 'jobWorks', 'alreadyApplied', 'user'));
    }
}
