<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class UserSkillController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $skills = Skill::all();
        $userSkills = Auth::user()->skills()->pluck('skills.id')->toArray();
        return view('user.skills', compact('skills', 'userSkills', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id'
        ]);

        Auth::user()->skills()->syncWithoutDetaching($request->skills);

        return redirect()->back()->with('success', 'Skill berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id'
        ]);

        Auth::user()->skills()->sync($request->skills);

        return redirect()->back()->with('success', 'Skill berhasil diperbarui');
    }
}
