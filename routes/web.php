<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CorporateFieldController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\JobAdminController;
use App\Http\Controllers\Admin\JobRoleController;
use App\Http\Controllers\Admin\JobWorkController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\Admin\WorkMethodController;
use App\Http\Controllers\Admin\WorkTypeController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.loker');
});

Route::get('/company', [ViewsController::class, 'company'])->name('company.dashboard');
Route::get('/company/detail-job', [ViewsController::class, 'detailJob']);
Route::get('/company/detail-user', [ViewsController::class, 'detailUser']);
Route::get('/user/company', [ViewsController::class, 'userCompany']);
Route::get('/user/detail-company', [ViewsController::class, 'userDetailCompany']);
Route::get('/user/loker', [ViewsController::class, 'userLoker'])->name('user.loker');
Route::get('/user/detail-loker', [ViewsController::class, 'detailLoker']);
Route::get('/user/lamaran-saya', [ViewsController::class, 'lamaranSaya']);
Route::get('/user/disimpan', [ViewsController::class, 'disimpan']);
Route::get('/user/profile', [ViewsController::class, 'profile']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/register/company', [AuthController::class, 'showRegisterFormCompany'])->name('register.company');
Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('register.company');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class,'index']);
    Route::resource('company', CompanyController::class);
    Route::resource('verification', VerificationController::class);
    Route::resource('corporate-field', CorporateFieldController::class);
    Route::resource('education', EducationController::class);
    Route::resource('job-role', JobRoleController::class);
    Route::resource('job-work', JobWorkController::class);
    Route::resource('job-admin', JobAdminController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('user', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('work-method', WorkMethodController::class);
    Route::resource('work-type', WorkTypeController::class);
});
