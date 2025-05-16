<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Candidate::where('user_id', auth()->id());

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('jobWork', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
        }

        if ($request->has('statuses') && !empty($request->statuses)) {
            $query->whereIn('status', $request->statuses);
        }

        $candidates = $query->paginate(10)->withQueryString();

        return view('user.apply.index', compact('candidates', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job_works,id',
            'cv' => 'nullable|mimes:pdf|max:2048'
        ]);

        $existingApplication = Candidate::where('user_id', auth()->id())
            ->where('job_id', $request->job_id)
            ->first();

        if ($existingApplication) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah melamar untuk pekerjaan ini'
            ], 422);
        }

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = 'cv_' . auth()->user()->name . '_' . time() . '.' . $cvFile->getClientOriginalExtension();
            $cvPath = $cvFile->storeAs('attachments', $cvFileName, 'public');
        } else {
            $user = auth()->user();
            if ($user->attachment && $user->attachment->cv) {
                $cvPath = $user->attachment->cv;
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Mohon upload CV Anda'
                ], 422);
            }
        }

        $candidate = Candidate::create([
            'user_id' => auth()->id(),
            'job_id' => $request->job_id,
            'status' => 'pending',
            'cv' => $cvPath
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lamaran berhasil dikirim'
        ]);
    }


    public function check(Request $request)
    {
        $applied = Candidate::where('user_id', auth()->id())
            ->where('job_id', $request->job_id)
            ->exists();

        return response()->json(['applied' => $applied]);
    }
}
