<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobRole;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    public function index()
    {
        $jobRoles = JobRole::all();
        return view('admin.job-role.index', compact('jobRoles'))->with('title', 'Role Pekerjaan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        JobRole::create($request->all());

        return redirect()->route('job-role.index')
            ->with('success', 'Role Pekerjaan berhasil ditambah.');
    }

    public function edit(JobRole $jobRole)
    {
        return view('admin.job-role.index', compact('jobRole'));
    }

    public function update(Request $request, JobRole $jobRole)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jobRole->update($request->all());

        return redirect()->route('job-role.index')->with('success', 'Role Pekerjaan berhasil diperbarui.');
    }

    public function destroy(JobRole $jobRole)
    {
        $jobRole->delete();

        return redirect()->route('job-role.index')
            ->with('success', 'Role Pekerjaan berhasil dihapus.');
    }
}
