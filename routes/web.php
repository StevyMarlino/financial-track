<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


/**
 *
 * ROUTE ERRORS
 *
 */

Route::get('/errors',[App\Http\Controllers\HomeController::class, 'error']);

Auth::routes(['register' => false]);

route::group(['prefix' => 'dashboard'], function() {

    /**
     * ROUTE ALL USER
     */

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'settings'])->name('setting');
    Route::put('/update-basic-information',[App\Http\Controllers\HomeController::class,'updateBasicInformation'])->name('basic.update');
    Route::put('/update-password',[App\Http\Controllers\HomeController::class,'updateSecurityInformation'])->name('password.update');
    Route::get('/users-list',[App\Http\Controllers\AdminController::class,'index'])->name('user.index');
    Route::get('/details/{id}',[VerificationController::class, 'details'])->name('details');

    /**
     * ROUTE ACCOUNTANT
     */

    Route::get('/all-domain-registered', [App\Http\Controllers\AccountantController::class, 'showAll'])->name('all-domain-registered');
    // Route::get('/all-domain-paid', [VerificationController::class, 'showAll'])->name('all-domain-paid');
    Route::get('/invoice',[VerificationController::class, 'verify'])->name('check');
    Route::get('/mark/{id}',[VerificationController::class, 'domain_exist'])->name('mark');


    /**
     * ROUTE USER
     */

    Route::get('/my-domain', [App\Http\Controllers\UserController::class, 'show'])->name('myDomain');
    Route::post('/store',[App\Http\Controllers\UserController::class,'store'])->name('store');

    /**
     * ROUTE ADMIN
     */

     Route::post('/list-users',[App\Http\Controllers\AdminController::class,'store'])->name('userSave');
     Route::delete('/users-list/{id}',[App\Http\Controllers\AdminController::class,'destroy'])->name('UserDestroy');
     Route::put('/users-update/{id]',[App\Http\Controllers\AdminController::class,'update'])->name('userUpdate');

});
