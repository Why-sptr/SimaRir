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

        // Filter pekerjaan yang belum kedaluwarsa
        $query->where(function ($q) use ($currentDate) {
            $q->whereNull('end_date')->orWhere('end_date', '>=', $currentDate);
        });

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('work_types')) {
            $query->whereIn('work_type_id', $request->work_types);
        }

        if ($request->filled('work_methods')) {
            $query->whereIn('work_method_id', $request->work_methods);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $query->orderBy('created_at', 'desc');

        $allJobs = $query->with(['skillJobs.skill'])->get();

        $userHasSkills = false;
        $filteredBySkills = false;

        if ($user && $user->skills->isNotEmpty()) {
            $userHasSkills = true;
            $userSkillIds = $user->skills->pluck('id')->toArray();

            $matchingJobs = $allJobs->filter(function ($job) use ($userSkillIds) {
                $jobSkillIds = $job->skillJobs->pluck('skill_id')->toArray();
                $matchingSkills = array_intersect($userSkillIds, $jobSkillIds);
                $job->matchingSkills = $matchingSkills;
                $job->matchingSkillsCount = count($matchingSkills);
                return $job->matchingSkillsCount > 0;
            })->sortByDesc('matchingSkillsCount')->values();

            $filteredBySkills = $matchingJobs->isNotEmpty();
            $allJobs = $matchingJobs;
        } else {
            // Jika user tidak login atau tidak punya skill, kosongkan hasil
            $allJobs = collect();
        }

        // Manual pagination
        $page = $request->get('page', 1);
        $perPage = 10;
        $total = $allJobs->count();
        $currentPageItems = $allJobs->slice(($page - 1) * $perPage, $perPage)->values();

        $jobWorks = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
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

        $recommendations = collect();

        if ($user && $user->skills->isNotEmpty()) {
            $userSkillIds = $user->skills->pluck('id')->toArray();

            $recommendations = JobWork::where('id', '!=', $currentJob->id)
                ->where(function ($q) use ($currentJob) {
                    $q->where('work_type_id', $currentJob->work_type_id)
                        ->orWhere('work_method_id', $currentJob->work_method_id);
                })
                ->where(function ($q) use ($currentDate) {
                    $q->whereNull('end_date')
                        ->orWhere('end_date', '>=', $currentDate);
                })
                ->with(['skillJobs.skill'])
                ->get()
                ->filter(function ($job) use ($userSkillIds) {
                    $jobSkillIds = $job->skillJobs->pluck('skill_id')->toArray();
                    $matching = array_intersect($userSkillIds, $jobSkillIds);
                    return count($matching) > 0;
                })
                ->shuffle()
                ->take(2)
                ->values();
        }

        return $recommendations;
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
            'skillJobs.skill'
        ])->findOrFail($id);

        $alreadyApplied = false;
        if ($user) {
            $alreadyApplied = Candidate::where('user_id', $user->id)
                ->where('job_id', $jobWork->id)
                ->exists();
        }

        // Matching skill untuk job utama
        $jobWork->matchingSkills = [];
        $jobWork->matchingSkillsCount = 0;

        if ($user && $user->skills->isNotEmpty()) {
            $userSkillIds = $user->skills->pluck('id')->toArray();
            $jobSkillIds = $jobWork->skillJobs->pluck('skill_id')->toArray();
            $jobWork->matchingSkills = array_intersect($userSkillIds, $jobSkillIds);
            $jobWork->matchingSkillsCount = count($jobWork->matchingSkills);
        }

        $recommendedJobs = $this->getRecommendedJobs($jobWork);

        // Tambahkan matching skill untuk job rekomendasi
        if ($user && $user->skills->isNotEmpty() && $recommendedJobs->isNotEmpty()) {
            $userSkillIds = $user->skills->pluck('id')->toArray();

            foreach ($recommendedJobs as $job) {
                $jobSkillIds = $job->skillJobs->pluck('skill_id')->toArray();
                $job->matchingSkills = array_intersect($userSkillIds, $jobSkillIds);
                $job->matchingSkillsCount = count($job->matchingSkills);
            }
        }

        return view('user.job-work.show', compact(
            'jobWork',
            'recommendedJobs',
            'alreadyApplied',
            'user',
            'currentDate'
        ));
    }


}
