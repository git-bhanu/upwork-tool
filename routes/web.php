<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewListController;
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

    Route::get('/archived-jobs', function () {
        return view('archive-jobs');
    })->name('job.archive');

    Route::get('/upwork-job/{job}', [JobController::class, 'show'])->name('job.single');


    Route::get('/phrases', function () {
        return view('phrases');
    })->name('phrases');

    Route::get('/analyze', function () {
        return view('analyze');
    })->name('analyze');

        // Only super admin enabled routes.
        Route::group(['middleware' => ['role:super-admin']], function ()   {

            Route::get('/users/{user}', [UserController::class, 'show'])
                ->name('user.single');

            Route::get('/users', function () {
                return view('users');
            })->name('users');

            Route::get('/review-list', [ReviewListController::class, 'index'])->name('reviewList.index');
            Route::get('/review-list/create', [ReviewListController::class, 'create'])->name('reviewList.create');
            Route::post('/review-list/store', [ReviewListController::class, 'store'])->name('reviewList.store');
        });

        // Only super admin and sales-manager enabled routes.
        Route::group(['middleware' => ['role:super-admin|sales-manager|sales-associate']], function () {
            Route::get('/my-reviews', [ReviewController::class, 'index'])->name('review.index');
        });
    });


Route::post('slack', [\App\Http\Controllers\SlackController::class, 'handle']);

require __DIR__.'/auth.php';
