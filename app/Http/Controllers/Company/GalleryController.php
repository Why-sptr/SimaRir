<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_id' => 'required|uuid',
            'deleted_images' => 'array',
        ]);

        $companyId = $request->company_id;

        $gallery = Gallery::firstOrNew(['company_id' => $companyId]);

        $images = $request->file('images');
        $deletedImages = $request->deleted_images;

        for ($i = 0; $i < 6; $i++) {
            $columnName = 'image' . ($i + 1);

            if (isset($deletedImages[$i]) && $deletedImages[$i] === 'true') {
                if ($gallery->$columnName) {
                    Storage::delete('gallery_images/' . $gallery->$columnName);
                    $gallery->$columnName = null;
                }
            }

            if (isset($images[$i])) {
                $file = $images[$i];
                $fileName = time() . "_{$columnName}." . $file->getClientOriginalExtension();

                $file->storeAs('gallery_images', $fileName);

                if ($gallery->$columnName) {
                    Storage::delete('gallery_images/' . $gallery->$columnName);
                }

                $gallery->$columnName = $fileName;
            }
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Galeri berhasil diperbarui.');
    }
}
