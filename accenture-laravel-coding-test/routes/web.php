<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventViewController;

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
    return view('home');
});

// Route::get('/events', function() {
//     return view('events');
// });

// List
Route::get('events', [EventViewController::class, 'index']);

// Search
// Route::get('search', [EventViewController::class, 'search']);

// Create
Route::view('create', 'createEvent');
Route::post('events/create', [EventViewController::class, 'create']);

// Edit
Route::get('event/{id}', [EventViewController::class, 'show']);
Route::post('event/{id}/edit', [EventViewController::class, 'update']);

// Delete
Route::get('/delete/{id}', [EventViewController::class, 'destroy']);

Route::get('search', [EventViewController::class, 'index'])->name('search');
Route::get('autocomplete', [EventViewController::class, 'autocomplete'])->name('autocomplete');
