<?php

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

Route::get('/mail', function () {
    return view('mailForm');
});

Route::post('/mail', function (Request $request){
    $name = $request['name'];
    $age = $request['age'];
    $eventId = $request['event_id'];

    $factory = new MailFactory();
    $mail = $factory->CreateMail('event_registration',['name' => $name, 'event_id' => $eventId]);
    \App\Models\Mail\Mailer::Mail(['koenverstappen2003@gmail.com','k.verstappen1@student.avans.nl'],$mail);
    return view('sent',['name' => $name]);
});
