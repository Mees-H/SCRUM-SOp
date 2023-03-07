<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::controller(NavigationController::class)->group(function() {
    Route::get('/index', 'index');
    Route::get('/training', 'training');
    Route::get('/evenement', 'evenement');
    Route::get('/gallerij', 'gallerij');
    Route::get('/aanmelden', 'aanmelden');
    Route::get('/faq', 'faq');
    Route::get('/nieuwsbrief', 'nieuwsbrief');
    Route::get('/team', 'team');
});

Route::resource('events', EventController::class);

// Route::controller(EventController::class)->group(function (){
//     Route::get('/eventscrud/index', 'index');
// });