<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->organizations()->create($request->all());

        return redirect()->back()->with('success', 'Pengalaman organisasi berhasil ditambahkan!');
    }
    public function show(Organization $organization)
    {
        return response()->json($organization);
    }

    public function update(Request $request, Organization $organization)
    {
        $organization = Organization::findOrFail($organization->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $organization->update($request->all());

        return redirect()->back()->with('success', 'Pengalaman organisasi berhasil diperbarui!');
    }

    public function destroy(Organization $organization)
    {
        $organization = Organization::findOrFail($organization->id);

        $organization->delete();
        return redirect()->back()->with('success', 'Pengalaman organisasi berhasil dihapus!');
    }
}
