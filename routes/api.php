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
    Route::get('/announcements', 'announcements');
    Route::get('/announcements/{announcement:slug}', 'announcement');
    Route::get('/contact', 'contact');
    Route::post('/contact/messages', 'storeContactMessage')->middleware('throttle:5,1');
    Route::get('/aboutConference', 'aboutConference');
    Route::get('/home-popups', 'homePopups');
    Route::get('/boards', 'boards');
    Route::get('/boards/{board:slug}', 'board');
});
