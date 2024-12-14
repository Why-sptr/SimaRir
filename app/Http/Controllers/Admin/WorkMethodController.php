<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkMethod;
use Illuminate\Http\Request;

class WorkMethodController extends Controller
{
    public function index()
    {
        return view('admin.work-method.index', ['title' => 'Metode Pekerjaan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WorkMethod::create($request->all());

        return redirect()->route('work-method.index')
            ->with('success', 'Metode Pekerjaan berhasil ditambah.');
    }

    public function edit(WorkMethod $workMethod)
    {
        return view('admin.work-method.index', compact('workMethod'));
    }

    public function update(Request $request, WorkMethod $workMethod)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $workMethod->update($request->all());

        return redirect()->route('work-method.index')->with('success', 'Metode Pekerjaan berhasil diperbarui.');
    }

    public function destroy(WorkMethod $workMethod)
    {
        $workMethod->delete();

        return redirect()->route('work-method.index')
            ->with('success', 'Metode Pekerjaan berhasil dihapus.');
    }
}
