<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'))->with('title', 'skill');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Skill::create($request->all());

        return redirect()->route('skill.index')
            ->with('success', 'Skill berhasil ditambah.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skill.index', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill->update($request->all());

        return redirect()->route('skill.index')->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skill.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}
