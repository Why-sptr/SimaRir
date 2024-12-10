<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function admin()
    {
        return view('admin.index', ['title' => 'Dashboard']);
    }
    public function listCompany()
    {
        return view('admin.company.list-company', ['title' => 'List Perusahaan']);
    }
    public function verificationCompany()
    {
        return view('admin.company.verification', ['title' => 'Verifikasi Perusahaan']);
    }
    public function jobAdmin()
    {
        return view('admin.job.job-admin', ['title' => 'Loker Admin']);
    }
    public function jobCompany()
    {
        return view('admin.job.job-company', ['title' => 'Loker Perusahaan']);
    }
    public function listUser()
    {
        return view('admin.user.list-user', ['title' => 'List User']);
    }
    public function listAdmin()
    {
        return view('admin.user.list-admin', ['title' => 'List Admin']);
    }
    public function skill()
    {
        return view('admin.setting.skill', ['title' => 'Skill']);
    }
    public function companyField()
    {
        return view('admin.setting.company-field', ['title' => 'Bidang Perusahaan']);
    }
    public function company()
    {
        return view('company.index');
    }
    public function detailJob()
    {
        return view('company.detail-job');
    }
    public function detailUser()
    {
        return view('company.detail-user');
    }
    public function userCompany()
    {
        return view('user.company');
    }
    public function userDetailCompany()
    {
        return view('user.detail-company');
    }
    public function userLoker()
    {
        return view('user.loker');
    }
    public function detailLoker()
    {
        return view('user.detail-job');
    }
    public function lamaranSaya()
    {
        return view('user.job-apply');
    }
    public function disimpan()
    {
        return view('user.bookmarking');
    }
    public function profile()
    {
        return view('user.user-profile');
    }
}
