<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\FAQController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [NavigationController::class, 'index'])->name('mainmenu');
Route::get('/training', [NavigationController::class, 'training']);
Route::get('/evenement', [NavigationController::class, 'evenement']);
Route::get('/vragenantwoorden', [NavigationController::class, 'vragenantwoorden']);
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

//FAQ routes
Route::get('/vragenantwoorden/vraagformulier', [FAQController::class, 'questionform']);
Route::post('/vragenantwoorden/submit', [FAQController::class, 'submit']);

//Event routes
Route::resource('events', EventController::class);
Route::get('/evenement/{event}/details', [EventController::class, 'show'])->name('eventsDetails');
// });//dit is voor het testen van de mailer, wordt er nog uitgehaald maar heb het er in gelaten om het testen makkelijker te maken.


//TODO:remove
Route::get('/mail', function () {return view('mailForm');});
Route::post('/mail', function (Request $request){
    $name = $request['name'];
    $age = $request['age'];
    $eventId = $request['event_id'];

Route::get('events/enroll/{id}', [EventController::class, 'enroll']);
Route::post('events/submit/{id}', [EventController::class, 'submit']);

//Galerij routes
Route::get('/galerij/{year}', [GalleryController::class, 'showGallery'])->name('galerij_jaar');
Route::get('/galerij/{year}/{title}', [GalleryController::class, 'show'])->name('galerij_album');

Route::get('events/enroll/{id}', [EventController::class, 'enroll']);
Route::post('events/submit/{id}', [EventController::class, 'submit']);
    $factory = new MailFactory();
    $mail = $factory->createMail('eventRegistration',['name' => $name, 'event_id' => $eventId]);
    \App\Models\Mail\Mailer::Mail([],$mail, true);
    return view('sent',['name' => $name]);
});

//TODO: voor een andere user story
Route::get('/galerij/aanmakenAlbum', [GalleryController::class, 'create']);
Route::post('/galerij/aanmakenAlbum', [GalleryController::class, 'store']);
Route::get('/galerij/verwijderenAlbum', [GalleryController::class, 'delete']);

Route::middleware(['role:admin'])->group(function () {
    //Resource routes
    Route::resource('slider', SliderController::class);

    //FAQ routes
    Route::resource('faq', FAQController::class);

    //Event routes
    Route::resource('events', EventController::class);

    //TODO: voor een andere user story
    Route::get('/galerij/aanmakenAlbum', [GalleryController::class, 'create']);
    Route::post('/galerij/aanmakenAlbum', [GalleryController::class, 'store']);
    Route::get('/galerij/verwijderenAlbum', [GalleryController::class, 'delete']);

});

Route::middleware(['role:admin,coach'])->group(function () {

});

Route::middleware(['role:admin,coach,supervisor'])->group(function () {

});

require __DIR__.'/auth.php';
