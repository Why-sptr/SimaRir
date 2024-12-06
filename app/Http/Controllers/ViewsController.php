<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function admin(){
        return view('admin.index');
    }
    public function company(){
        return view('company.index');
    }
    public function userCompany(){
        return view('user.company');
    }
    public function userDetailCompany(){
        return view('user.detail-company');
    }
    public function userLoker(){
        return view('user.loker');
    }
}
