<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    public function index()
    {
        return view('admin.job-role.index', ['title' => 'Role Pekerjaan']);
    }
}
