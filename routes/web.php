<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
Use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


// dashboard 
Route::middleware('auth')->prefix('dashboard')->group(function () {

    // all routes for links
    Route::resource('/links', LinkController::class);

    // /settings
    Route::get('/settings', [UserController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [UserController::class, 'update'])->name('settings.update');
});

// /visit/5
Route::post('/visit/{link}', [VisitController::class, 'store']) ;


// /5 ==> page of user whose id = 5
Route::get('/{user}', [UserController::class, 'show']);
