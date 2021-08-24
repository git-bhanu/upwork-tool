<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');

})->name('home');


Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/upwork-job/{job}', [JobController::class, 'show'])->name('job.single');


    Route::get('/phrases', function () {
        return view('phrases');
    })->name('phrases');

    Route::get('/analyze', function () {
        return view('analyze');
    })->name('analyze');

    // Only super admin enabled routes.
    Route::group(['middleware' => ['role:super-admin']], function ()   {
        Route::get('/users/{user}', [UserController::class, 'show'])->name('user.single');

        Route::get('/users', function () {
            return view('users');
        })->name('users');


    });

});

require __DIR__.'/auth.php';
