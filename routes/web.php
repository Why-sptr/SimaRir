<?php

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.loker');
});

Route::get('/admin',[ViewsController::class,'admin']);
Route::get('/company',[ViewsController::class,'company']);
Route::get('/user/company',[ViewsController::class,'userCompany']);
Route::get('/user/detail-company',[ViewsController::class,'userDetailCompany']);
Route::get('/user/loker',[ViewsController::class,'userLoker']);
