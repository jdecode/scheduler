<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ScheduleController;
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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PageController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::resource('/schedules', ScheduleController::class)->only(
        ['index', 'show', 'store', 'create', 'destroy', 'edit', 'update']
    );

    Route::resource('/meetings', MeetingController::class)->only(
        ['index', 'show', 'store', 'create', 'destroy', 'edit', 'update']
    );

});

Route::controller(PageController::class)->group(function () {
    Route::get('/privacy-policy', 'privacyPolicy')->name('pages.privacy-policy');
    Route::get('/terms-of-service', 'termsOfService')->name('pages.terms-of-service');
});


require __DIR__ . '/auth.php';
