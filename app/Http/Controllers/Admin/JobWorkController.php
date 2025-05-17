<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobRole;
use App\Models\JobWork;
use App\Models\Qualification;
use App\Models\WorkMethod;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobWorkController extends Controller
{
    public function index()
    {
        $jobWorks = JobWork::with(['company', 'workType', 'workMethod', 'jobRole', 'qualification'])->get();
        return view('admin.job-work.index', [
            'title' => 'Pekerjaan',
            'jobWorks' => $jobWorks
        ]);
    }

    public function show($id)
    {
        $jobWork = JobWork::with(['company', 'workType', 'workMethod', 'jobRole', 'qualification'])->findOrFail($id);

        return view('admin.job-work.show', [
            'title' => 'Detail Pekerjaan',
            'jobWork' => $jobWork
        ]);
    }

    public function destroy($id)
    {
        $jobWork = JobWork::findOrFail($id);
        $jobWork->delete();

        return redirect()->route('job-work.index')
            ->with('success', 'Pekerjaan berhasil dihapus.');
    }
}
