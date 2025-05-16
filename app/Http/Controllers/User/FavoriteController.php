<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\JobWork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get the logged-in user's favorite jobs
        $userId = auth()->id(); // Get the current logged-in user's ID
        $jobWorks = JobWork::whereHas('bookmarks', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate(10)->withQueryString();

        // Pass the jobWorks (favorite jobs) to the view
        return view('user.favorite.index', compact('jobWorks', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job_works,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Cek apakah pekerjaan sudah ada dalam bookmark
        $existingBookmark = Bookmark::where('job_id', $request->job_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingBookmark) {
            return response()->json(['success' => false, 'message' => 'Pekerjaan sudah ada dalam favorit!']);
        }

        // Buat bookmark baru
        $bookmark = Bookmark::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['success' => true, 'favoriteId' => $bookmark->id]);
    }

    public function destroy($id, Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job_works,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Temukan bookmark berdasarkan ID favorit
        $bookmark = Bookmark::find($id);

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pekerjaan tidak ditemukan di favorit.']);
    }
    public function checkFavorite($jobId, $userId)
    {
        $existingBookmark = Bookmark::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->first();

        return response()->json([
            'exists' => $existingBookmark ? true : false,
            'favoriteId' => $existingBookmark ? $existingBookmark->id : null
        ]);
    }
}
