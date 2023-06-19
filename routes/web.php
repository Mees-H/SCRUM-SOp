<?php

use App\Http\Controllers\Admin\CreateUserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingGroupController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SiteMapController;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/team', [NavigationController::class, 'team']);
Route::get('/partners', [NavigationController::class, 'partners']);
Route::get('/overons', [NavigationController::class, 'overons']);
Route::get('/locatie', [NavigationController::class, 'locatie']);
Route::get('/links', [NavigationController::class, 'links']);
Route::get('slider-delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');

//Resource routes
Route::resource('slider', SliderController::class);

//Training routes
Route::get('training', [TrainingController::class, 'training']);
Route::post('training', [TrainingController::class, 'trainingOtherWeek']);
Route::get('/training/signout', [TrainingController::class, 'signout']);
Route::post('/training/signout', [TrainingController::class, 'sendsignoutmail']);

//FAQ routes
Route::get('/vragenantwoorden/vraagformulier', [FAQController::class, 'questionform']);
Route::post('/vragenantwoorden/submit', [FAQController::class, 'submit']);
Route::get('/vragenantwoorden', [FAQController::class, 'viewquestions']);

//Event routes
Route::resource('events', EventController::class);
Route::get('/evenement/{event}/details', [EventController::class, 'show'])->name('eventsDetails');
Route::get('evenement/export', [EventController::class, 'exportIcal']);
Route::get('events/enroll/{id}', [EventController::class, 'enroll']);
Route::post('events/submit/{id}', [EventController::class, 'submit']);

//Team routes
Route::resource('links', SiteMapController::class);

//album routes
Route::get('/albums/{year}', [GalleryController::class, 'showGallery'])->name('galerij_jaar');
Route::get('/albums/{id}/{year}', [GalleryController::class, 'show'])->name('galerij_album');




//privacyverklaring routes
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');
Route::get('/privacy/download', [App\Http\Controllers\PrivacyController::class, 'download'])->name('privacy.download');

Route::middleware(['role:admin'])->group(function () {
    //User creation routes
    Route::get('/admin/gebruikers', [CreateUserController::class, 'adminIndex']);
    Route::get('/admin/create', [CreateUserController::class, 'adminCreateUser']);
    Route::post('/admin/submit', [CreateUserController::class, 'storeUser']);
    Route::post('/admin/delete', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'destroy']);
    Route::get('/admin/gebruikers/all', [CreateUserController::class, 'showAll']);

    //News routes

    Route::resource('nieuwsartikel', NewsArticleController::class)->except(['index']);
    Route::resource('nieuwsbrief', NewsLetterController::class)->except(['show']);
    Route::post('/nieuwsartikel/create', [NewsArticleController::class, 'store'])->name('nieuwsartikel.store');
    Route::post('/nieuwsbrief/create', [NewsLetterController::class, 'store'])->name('nieuwsbrief.store');


    //Slider routes
    Route::resource('slider', SliderController::class);

    //FAQ routes
    Route::resource('faq', FAQController::class);

    //Event routes
    Route::resource('events', EventController::class);

    //Team routes
    Route::resource('members', TeamController::class);

    //Partner routes
    Route::resource('groups', PartnerController::class);

    //Galerij routes
    Route::get('galerij/{id}/addPhoto', [GalleryController::class, 'addPhoto']);
    Route::post('/galerij/{id}/voegfotostoe', [GalleryController::class, 'addAlbumPictures'])->name('addAlbumPictures');
    Route::post('/galerij/{id}/verwijderfotos', [GalleryController::class, 'deleteAlbumPictures']);
    Route::resource('galerij', GalleryController::class);

    //Training routes
    Route::resource('trainingsessions', TrainingController::class);
    Route::resource('traininggroups', TrainingGroupController::class);
    Route::get('/traininggroups/participants/create', [TrainingGroupController::class, 'createParticipant']);
    Route::post('/traininggroups/participants', [TrainingGroupController::class, 'storeParticipant']);
    Route::delete('/traininggroups/participants/{participant}', [TrainingGroupController::class, 'destroyParticipant']);

    //privacyverklaring routes
    Route::get('/privacy/edit', [App\Http\Controllers\PrivacyController::class, 'edit'])->name('privacy.edit');
    Route::post('/privacy/edit', [App\Http\Controllers\PrivacyController::class, 'store'])->name('privacy.store');

});

//News routes
Route::get('/nieuwsartikel', [NewsArticleController::class, 'index'])->name('newsArticle.index');
Route::get('/nieuwsbrief', [NewsLetterController::class, 'index'])->name('newsLetter.index');
Route::post('/nieuwsartikel', [NewsArticleController::class, 'index'])->name('newsArticle.sorting');
Route::post('/nieuwsbrief', [NewsLetterController::class, 'index'])->name('newsLetter.sorting');

Route::middleware(['role:admin,coach'])->group(function () {

});

Route::middleware(['role:admin,coach,supervisor'])->group(function () {

});

require __DIR__ . '/auth.php';
