<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorporateFieldController extends Controller
{
    public function index()
    {
        return view('admin.corporate-field.index', ['title' => 'Bidang Perusahaan']);
    }
}
