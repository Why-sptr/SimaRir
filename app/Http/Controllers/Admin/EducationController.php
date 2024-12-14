<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.education.index', compact('educations'))->with('title', 'Pendidikan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Education::create($request->all());

        return redirect()->route('education.index')
            ->with('success', 'Pendidikan berhasil ditambah.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.index', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Pendidikan berhasil diperbarui.');
    }


    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('education.index')
            ->with('success', 'Pendidikan berhasil dihapus.');
    }
}
