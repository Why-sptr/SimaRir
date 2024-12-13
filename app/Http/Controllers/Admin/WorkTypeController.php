<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    public function index()
    {
        return view('admin.work-type.index', ['title' => 'Tipe Pekerjaan']);
    }
}
