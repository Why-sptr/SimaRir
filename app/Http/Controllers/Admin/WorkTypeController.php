<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    public function index()
    {
        return view('admin.work-type.index', ['title' => 'Tipe Pekerjaan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WorkType::create($request->all());

        return redirect()->route('work-type.index')
            ->with('success', 'Tipe Pekerjaan berhasil ditambah.');
    }

    public function edit(WorkType $workType)
    {
        return view('admin.work-type.index', compact('workType'));
    }

    public function update(Request $request, WorkType $workType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $workType->update($request->all());

        return redirect()->route('work-type.index')->with('success', 'Tipe Pekerjaan berhasil diperbarui.');
    }

    public function destroy(WorkType $workType)
    {
        $workType->delete();

        return redirect()->route('work-type.index')
            ->with('success', 'Tipe Pekerjaan berhasil dihapus.');
    }
}
