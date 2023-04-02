<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\TrainingController;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\SliderController;


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

Route::get('/', [NavigationController::class, 'index']);
Route::get('/index', [NavigationController::class, 'index']);
Route::get('/training', [NavigationController::class, 'training']);
Route::get('/evenement', [NavigationController::class, 'evenement']);
Route::get('/aanmelden', [NavigationController::class, 'aanmelden']);
Route::get('/faq', [NavigationController::class, 'faq']);
Route::get('/nieuwsbrief', [NavigationController::class, 'nieuwsbrief']);
Route::get('/team', [NavigationController::class, 'team']);
Route::get('/partner', [NavigationController::class, 'partner']);
Route::get('/overons', [NavigationController::class, 'overons']);
Route::get('/locatie', [NavigationController::class, 'locatie']);
Route::get('/links', [NavigationController::class, 'links']);
Route::get('slider-delete/{slider}',[SliderController::class,'delete'])->name('slider.delete');

//Resource routes
Route::resource('slider', SliderController::class);

//Training routes
//Route::resource('trainingsessions', TrainingController::class);
Route::get('/training/signout', [TrainingController::class, 'signout']);
Route::post('/training/signout', [TrainingController::class, 'sendsignoutmail']);

//Event routes
Route::resource('events', EventController::class);
Route::get('events/enroll/{id}', [EventController::class, 'enroll']);
Route::post('events/submit/{id}', [EventController::class, 'submit']);

//Galerij routes
Route::get('/galerij/{year}', [GalleryController::class, 'showGallery'])->name('galerij_jaar');
Route::get('/galerij/{year}/{title}', [GalleryController::class, 'show'])->name('galerij_album');

//TODO: voor een andere user story
Route::get('/galerij/aanmakenAlbum', [GalleryController::class, 'create']);
Route::post('/galerij/aanmakenAlbum', [GalleryController::class, 'store']);
Route::get('/galerij/verwijderenAlbum', [GalleryController::class, 'delete']);
