<?php

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.loker');
});

Route::get('admin',[ViewsController::class,'admin'])->name('admin.dashboard');
Route::get('admin/list-company',[ViewsController::class,'listCompany']);
Route::get('admin/verification-company',[ViewsController::class,'verificationCompany']);
Route::get('admin/job-admin',[ViewsController::class,'jobAdmin']);
Route::get('admin/job-company',[ViewsController::class,'jobCompany']);
Route::get('admin/list-user',[ViewsController::class,'listUser']);
Route::get('admin/list-admin',[ViewsController::class,'listAdmin']);
Route::get('admin/skill',[ViewsController::class,'skill']);
Route::get('admin/company-field',[ViewsController::class,'companyField']);
Route::get('/company',[ViewsController::class,'company']);
Route::get('/user/company',[ViewsController::class,'userCompany']);
Route::get('/user/detail-company',[ViewsController::class,'userDetailCompany']);
Route::get('/user/loker',[ViewsController::class,'userLoker']);
Route::get('/user/detail-loker',[ViewsController::class,'detailLoker']);
Route::get('/user/lamaran-saya',[ViewsController::class,'lamaranSaya']);
Route::get('/user/disimpan',[ViewsController::class,'disimpan']);
Route::get('/user/profile',[ViewsController::class,'profile']);