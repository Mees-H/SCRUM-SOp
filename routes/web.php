<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\NavigationController;
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

Route::get('/', [NavigationController::class, 'index']);
Route::get('/index', [NavigationController::class, 'index']);
Route::get('/training', [NavigationController::class, 'training']);
Route::get('/evenement', [NavigationController::class, 'evenement']);
Route::get('/galerij', [NavigationController::class, 'galerij']);
Route::get('/galerij/2023', [NavigationController::class, 'J2023']);
Route::get('/galerij/2022', [NavigationController::class, 'J2022']);
Route::get('/galerij/2021', [NavigationController::class, 'J2021']);
Route::get('/aanmelden', [NavigationController::class, 'aanmelden']);
Route::get('/faq', [NavigationController::class, 'faq']);
Route::get('/nieuwsbrief', [NavigationController::class, 'nieuwsbrief']);
Route::get('/team', [NavigationController::class, 'team']);
Route::get('/partner', [NavigationController::class, 'partner']);
Route::get('/overons', [NavigationController::class, 'overons']);
Route::get('/locatie', [NavigationController::class, 'locatie']);
Route::get('/links', [NavigationController::class, 'links']);


//Resource routes

Route::resource('slider', SliderController::class);

//dit is voor het testen van de mailer, wordt er nog uitgehaald maar heb het er in gelaten om het testen makkelijker te maken.
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

// });//dit is voor het testen van de mailer, wordt er nog uitgehaald maar heb het er in gelaten om het testen makkelijker te maken.
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