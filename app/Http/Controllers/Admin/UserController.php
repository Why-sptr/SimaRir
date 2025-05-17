<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role('user')->with('jobRole')->get();

        return view('admin.user.index', [
            'title' => 'User Management',
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::with([
            'education',
            'socialMedia',
            'attachment',
            'jobRole',
            'certifications',
            'companies',
            'recentWorkExperiences',
            'organizations',
            'skills'
        ])->findOrFail($id);

        return view('admin.user.show', [
            'title' => 'Detail User',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
