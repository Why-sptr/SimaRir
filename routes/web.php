<?php

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.loker');
});

Route::get('/admin',[ViewsController::class,'admin']);
