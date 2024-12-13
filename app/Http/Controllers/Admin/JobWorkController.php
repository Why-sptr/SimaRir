<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobWorkController extends Controller
{
    public function index()
    {
        return view('admin.job-work.index', ['title' => 'Pekerjaan']);
    }
}
