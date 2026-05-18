<?php

use App\Http\Controllers\Api\ConferenceContentController;
use Illuminate\Support\Facades\Route;

Route::controller(ConferenceContentController::class)->group(function () {
    Route::get('/menus', 'menus');
    Route::get('/logo', 'logo');
    Route::get('/events', 'events');
    Route::get('/sessions', 'sessions');
    Route::get('/speakers', 'speakers');
    Route::get('/sponsors', 'sponsors');
    Route::get('/contact', 'contact');
    Route::get('/boards', 'boards');
    Route::get('/aboutConference', 'aboutConference');
});
