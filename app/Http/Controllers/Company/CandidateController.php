<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
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
        $candidate = Candidate::with([
            'user.jobRole',
            'user.education',
            'user.socialMedia',
            'user.attachment',
            'user.recentWorkExperiences',
            'user.certifications',
            'user.organizations',
        ])->findOrFail($id);

        return view('company.detail-user', compact('candidate'));
    }
}
