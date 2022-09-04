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

    Route::controller(ScheduleController::class)->group(function () {
        Route::get('/my-schedule', 'mySchedule')->name('mySchedule');
        Route::put('/save-schedule', 'saveSchedule')->name('saveSchedule');
    });

    Route::controller(MeetingController::class)->group(function () {
        Route::get('/my-meetings', 'myMeetings')->name('myMeetings');
    });
});

Route::get('/connect-with-me/{uuid}', [MeetingController::class, 'connectWithMe'])->name('connectWithMe');

Route::controller(PageController::class)->group(function () {
    Route::get('/privacy-policy', 'privacyPolicy')->name('pages.privacy-policy');
    Route::get('/terms-of-service', 'termsOfService')->name('pages.terms-of-service');
});


require __DIR__ . '/auth.php';
