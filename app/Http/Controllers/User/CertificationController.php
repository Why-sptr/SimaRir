<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
        ]);

        $certificate = new Certification();
        $certificate->user_id = $user->id;
        $certificate->fill($validated);

        if ($request->hasFile('media')) {
            $mediaFile = $request->file('media');
            $mediaName = 'cert_' . $user->name . '_' . time() . '.' . $mediaFile->getClientOriginalExtension();
            $mediaPath = $mediaFile->storeAs('certificates', $mediaName, 'public');
            $certificate->media = basename($mediaPath);
        }

        $certificate->save();

        return redirect()->back()->with('success', 'Sertifikasi berhasil ditambahkan');
    }


    public function show($id)
    {
        $certificate = Certification::findOrFail($id);
        return response()->json($certificate);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $certificate = Certification::findOrFail($id);
        $certificate->fill($validated);

        if ($request->hasFile('media')) {
            $mediaFile = $request->file('media');
            $mediaName = 'cert_' . $certificate->user_id . '_' . time() . '.' . $mediaFile->getClientOriginalExtension();
            $mediaPath = $mediaFile->storeAs('certificates', $mediaName, 'public');
            $certificate->media = basename($mediaPath);
        }

        $certificate->save();

        return redirect()->back()->with('success', 'Sertifikasi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $certificate = Certification::find($id);
        if (!$certificate) {
            return redirect()->back()->with('error', 'Sertifikasi tidak ditemukan.');
        }
        $certificate->delete();

        return redirect()->back()->with('danger', 'Sertifikasi berhasil dihapus.');
    }
}
