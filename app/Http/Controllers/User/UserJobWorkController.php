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
use Illuminate\Support\Facades\DB;

class UserJobWorkController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $workTypes = WorkType::all();
        $workMethods = WorkMethod::all();
        $currentDate = now()->format('Y-m-d');

        $query = JobWork::query();

        // Filter out expired jobs
        $query->where(function ($q) use ($currentDate) {
            $q->whereNull('end_date')
                ->orWhere('end_date', '>=', $currentDate);
        });

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

        // Order by most recent
        $query->orderBy('created_at', 'desc');

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
    public function getSkillBasedRecommendations($currentJob, $user = null)
    {
        $currentDate = now()->format('Y-m-d');

        $recommendedJobs = collect();

        if ($user && $user->skills && $user->skills->count() > 0) {
            $userSkillIds = $user->skills->pluck('id')->toArray();

            $matchingJobIds = DB::table('skill_jobs')
                ->join('job_works', 'skill_jobs.job_id', '=', 'job_works.id')
                ->whereIn('skill_jobs.skill_id', $userSkillIds)
                ->where('job_works.id', '!=', $currentJob->id)
                ->where(function ($q) use ($currentDate) {
                    $q->whereNull('job_works.end_date')
                        ->orWhere('job_works.end_date', '>=', $currentDate);
                })
                ->groupBy('job_works.id')
                ->select('job_works.id', DB::raw('COUNT(DISTINCT skill_jobs.skill_id) as skill_match_count'))
                ->orderByDesc('skill_match_count')
                ->limit(2)
                ->pluck('id')
                ->toArray();

            if (!empty($matchingJobIds)) {
                $jobs = JobWork::whereIn('id', $matchingJobIds)
                    ->with([
                        'workType',
                        'workMethod',
                        'skillJobs.skill',
                        'qualification.education',
                        'company.user',
                        'candidates'
                    ])
                    ->get();

                foreach ($jobs as $job) {
                    $jobSkillIds = $job->skillJobs->pluck('skill_id')->toArray();
                    $job->matchingSkills = array_intersect($userSkillIds, $jobSkillIds);
                    $job->matchingSkillsCount = count($job->matchingSkills);
                }

                $recommendedJobs = $jobs->sortByDesc('matchingSkillsCount')->take(3)->values();
            }
        }

        return $recommendedJobs;
    }

    public function getRecommendedJobs($currentJob)
    {
        $user = Auth::user();
        $currentDate = now()->format('Y-m-d');

        $skillBasedRecommendations = $this->getSkillBasedRecommendations($currentJob, $user);

        if ($skillBasedRecommendations->isNotEmpty()) {
            return $skillBasedRecommendations;
        }

        return JobWork::where('id', '!=', $currentJob->id)
            ->where(function ($q) use ($currentJob) {
                $q->where('work_type_id', $currentJob->work_type_id)
                    ->orWhere('work_method_id', $currentJob->work_method_id);
            })
            ->where(function ($q) use ($currentDate) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', $currentDate);
            })
            ->with([
                'workType',
                'workMethod',
                'qualification.education',
                'company.user',
                'candidates'
            ])
            ->inRandomOrder()
            ->take(3)
            ->get();
    }

    public function show($id)
    {
        $user = Auth::user();
        $currentDate = now()->format('Y-m-d');
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

        $recommendedJobs = $this->getRecommendedJobs($jobWork);

        return view('user.job-work.show', compact(
            'jobWork',
            'recommendedJobs',
            'alreadyApplied',
            'user',
            'currentDate'
        ));
    }
}
