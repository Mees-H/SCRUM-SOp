<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;
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
    Route::get('/galerij/{year}', [GalleryController::class, 'showGallery'])->name('galerij_jaar');
Route::get('/gallerij/aanmaken', [GalleryController::class, 'create']);
Route::get('/aanmelden', 'aanmelden');
    Route::get('/faq', 'faq');
    Route::get('/nieuwsbrief', 'nieuwsbrief');
    Route::get('/team', 'team');

});

Route::resource('events', EventController::class);

// });

//Galerij routes
Route::get('/galerij/year/{id}', [GalleryController::class, 'show'])->name('galerij_album');

//TODO: voor een andere user story
Route::get('/galerij/aanmakenAlbum', [GalleryController::class, 'create']);
Route::post('/galerij/aanmakenAlbum', [GalleryController::class, 'store']);
Route::get('/galerij/verwijderenAlbum', [GalleryController::class, 'delete']);

//dit is voor het testen van de mailer, wordt er nog uitgehaald maar heb het er in gelaten om het testen makkelijker te maken.
//TODO:remove
Route::get('/mail', function () {return view('mailForm');});
Route::post('/mail', function (Request $request){
    $name = $request['name'];
    $age = $request['age'];
    $eventId = $request['event_id'];

    $factory = new MailFactory();
    $mail = $factory->createMail('eventRegistration',['name' => $name, 'event_id' => $eventId]);
    \App\Models\Mail\Mailer::Mail([],$mail, true);
    return view('sent',['name' => $name]);
});
