<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RecentWorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WorkExperienceController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'jobdesk' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $experience = new RecentWorkExperience();
        $experience->user_id = $user->id;
        $experience->name = $validated['name'];
        $experience->jobdesk = $validated['jobdesk'];
        $experience->description = $validated['description'];
        $experience->start_date = $validated['start_date'];
        $experience->end_date = $validated['end_date'];
        $experience->save();

        return redirect()->back()->with('success', 'Pengalaman kerja berhasil ditambahkan');
    }

    public function show($id)
    {
        $experience = RecentWorkExperience::findOrFail($id);
        return response()->json($experience);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'jobdesk' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $experience = RecentWorkExperience::findOrFail($id);
        $experience->update($validated);

        return redirect()->back()->with('success', 'Pengalaman kerja berhasil diperbarui');
    }

    public function destroy($id)
    {
        $experience = RecentWorkExperience::find($id);
        if (!$experience) {
            return redirect()->back()->with('error', 'Pengalaman kerja tidak ditemukan.');
        }
        $experience->delete();

        return redirect()->back()->with('success', 'Pengalaman kerja berhasil dihapus.');
    }
}
