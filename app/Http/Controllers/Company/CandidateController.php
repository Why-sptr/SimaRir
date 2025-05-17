<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function index($jobWorkId)
    {
        $user = Auth::user();
        $companies = Company::where('user_id', $user->id)->with(['corporateField'])->first();
        $jobWork = JobWork::findOrFail($jobWorkId);

        // Ensure the company user only sees their own job posts' candidates
        $company = auth()->user()->companies()->first();
        if ($jobWork->company_id != $company->id) {
            return redirect()->route('company-job-work.index')->with('error', 'Anda tidak memiliki akses ke data kandidat ini.');
        }

        // Get candidates with pagination and apply filters if needed
        $query = $jobWork->candidates()->with('user', 'user.jobRole', 'user.education', 'user.skills');

        // Filter by status if requested
        if (request('status')) {
            $query->where('status', request('status'));
        }

        // Search by name or email
        if (request('search')) {
            $search = request('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $candidates = $query->paginate(10);

        return view('company.list-candidate', compact('jobWork', 'candidates', 'user', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $validStatuses = [
            Candidate::STATUS_PENDING,
            Candidate::STATUS_REVIEW,
            Candidate::STATUS_ACCEPTED,
            Candidate::STATUS_REJECTED
        ];

        $request->validate([
            'status' => 'required|in:' . implode(',', $validStatuses)
        ]);

        $candidate = Candidate::findOrFail($id);
        $candidate->status = $request->status;
        $candidate->save();

        return response()->json([
            'success' => true,
            'message' => 'Status kandidat berhasil diperbarui.',
            'status' => $candidate->status
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $companies = Company::where('user_id', $user->id)->with(['corporateField'])->first();
        $candidate = Candidate::with([
            'user.jobRole',
            'user.education',
            'user.socialMedia',
            'user.attachment',
            'user.recentWorkExperiences',
            'user.certifications',
            'user.organizations',
        ])->findOrFail($id);

        // Get the job information related to this candidate
        $jobWork = null;
        if ($candidate->job_id) {
            $jobWork = JobWork::find($candidate->job_id);
        }

        return view('company.detail-user', compact('candidate', 'jobWork', 'user', 'companies'));
    }
}
