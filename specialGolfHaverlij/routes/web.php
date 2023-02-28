<?php

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

Route::get('/index', [NavigationController::class, 'index']);
Route::get('/training', [NavigationController::class, 'training']);
Route::get('/evenement', [NavigationController::class, 'evenement']);
Route::get('/gallerij', [NavigationController::class, 'gallerij']);
Route::get('/aanmelden', [NavigationController::class, 'aanmelden']);
Route::get('/faq', [NavigationController::class, 'faq']);
Route::get('/nieuwsbrief', [NavigationController::class, 'nieuwsbrief']);
Route::get('/team', [NavigationController::class, 'team']);