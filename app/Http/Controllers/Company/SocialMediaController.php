<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SocialMediaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'instagram' => 'nullable|url',
            'github' => 'nullable|url',
            'youtube' => 'nullable|url',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $socialMedia = $user->socialMedia()->firstOrNew();
        $socialMedia->fill($validated);
        $socialMedia->save();
        
        $user->social_media_id = $socialMedia->id;
        $user->save();

        return redirect()->route('company.index');
    }
}
