<?php

use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\EventController;

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
    Route::get('/faq', 'faq');
    Route::get('/nieuwsbrief', 'nieuwsbrief');
    Route::get('/team', 'team');
});

Route::resource('events', EventController::class);
Route::get('events/enroll/{id}', [EventController::class, 'enroll']);
Route::post('events/submit/{id}', [EventController::class, 'submit']);

//Route::post('/aanmelden', [EventController::class, 'submit']);
