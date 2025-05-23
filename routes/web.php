<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthAdminController;
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
use App\Http\Controllers\Company\CandidateController;
use App\Http\Controllers\Company\CompanyController as CompanyCompanyController;
use App\Http\Controllers\Company\CompanyJobWorkController;
use App\Http\Controllers\Company\GalleryController;
use App\Http\Controllers\Company\SocialMediaController;
use App\Http\Controllers\Company\WorkTimeController;
use App\Http\Controllers\User\ApplyController;
use App\Http\Controllers\User\CertificationController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\OrganizationController;
use App\Http\Controllers\User\UserCompanyController;
use App\Http\Controllers\User\UserJobWorkController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserSkillController;
use App\Http\Controllers\User\WorkExperienceController;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasRole('user')) {
            return redirect()->route('user-job-work.index');
        } elseif (auth()->user()->hasRole('company')) {
            return redirect()->route('company.index');
        } elseif (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin');
        }
    } else {
        return view('auth.login');
    }
});
Route::middleware(['auth', 'role:company'])->group(function () {
    Route::resource('company', CompanyCompanyController::class);
    Route::resource('social-media', SocialMediaController::class);
    Route::resource('work-time', WorkTimeController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('company-job-work', CompanyJobWorkController::class);
    Route::resource('candidates', CandidateController::class);
    Route::get('jobwork/{jobWorkId}/candidates', [CandidateController::class, 'index'])->name('candidates.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('user-job-work', UserJobWorkController::class);
    Route::resource('user-company', UserCompanyController::class);
    Route::resource('user-profile', UserProfileController::class);
    Route::resource('work-experience', WorkExperienceController::class);
    Route::resource('certification', CertificationController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('user-skill', UserSkillController::class);
    Route::resource('favorite', FavoriteController::class);
    Route::get('favorite/check/{jobId}/{userId}', [FavoriteController::class, 'checkFavorite'])->name('favorite.check');
    Route::resource('apply', ApplyController::class);
    Route::get('apply/check', [ApplyController::class, 'check'])->name('apply.check');
});

// Auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/register/company', [AuthController::class, 'showRegisterFormCompany'])->name('register.company');
Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('register.company');

// Admin
Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthAdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthAdminController::class, 'login'])->name('admin.login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('company', CompanyController::class)->names([
            'index' => 'admin.company.index',
            'store' => 'admin.company.store',
        ]);
        Route::post('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');
        Route::resource('verification', VerificationController::class);
        Route::post('/verification/{id}/process',[VerificationController::class, 'verify'])->name('verification.process');
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

        Route::get('/register', [AuthAdminController::class, 'showRegisterForm'])->name('admin.register');
        Route::post('/register', [AuthAdminController::class, 'register'])->name('admin.register.post');
    });
});
