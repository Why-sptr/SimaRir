<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateField;
use Illuminate\Http\Request;

class CorporateFieldController extends Controller
{
    public function index()
    {
        return view('admin.corporate-field.index', ['title' => 'Bidang Perusahaan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CorporateField::create($request->all());

        return redirect()->route('corporate-field.index')
            ->with('success', 'Bidang Perusahaan berhasil ditambah.');
    }

    public function edit(CorporateField $corporateField)
    {
        return view('admin.corporate-field.index', compact('corporateField'));
    }

    public function update(Request $request, CorporateField $corporateField)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $corporateField->update($request->all());

        return redirect()->route('corporate-field.index')->with('success', 'Bidang Perusahaan berhasil diperbarui.');
    }

    public function destroy(CorporateField $corporateField)
    {
        $corporateField->delete();

        return redirect()->route('corporate-field.index')
            ->with('success', 'Bidang Perusahaan berhasil dihapus.');
    }
}
