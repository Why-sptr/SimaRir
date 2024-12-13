<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobAdminController extends Controller
{
    public function index()
    {
        return view('admin.job-admin.index', ['title' => 'Loker by Admin']);
    }
}
