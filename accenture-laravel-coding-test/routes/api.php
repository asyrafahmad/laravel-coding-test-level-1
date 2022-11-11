<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\EventController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('events.')->group(function () {

    Route::get('events', [EventController::class, 'index'])->name('index');
    Route::get('events/active-events', [EventController::class, 'activeEvent'])->name('activeEvent');
    Route::get('events/{id}', [EventController::class, 'show'])->name('show');
    Route::post('events', [EventController::class, 'store'])->name('store');
    Route::put('events/{id}', [EventController::class, 'update'])->name('update');
    Route::patch('events/{id}', [EventController::class, 'update'])->name('update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('destroy');
});

// Route::resource('v1/events', EventController::class);