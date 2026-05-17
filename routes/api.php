<?php

use App\Http\Controllers\Api\ConferenceContentController;
use Illuminate\Support\Facades\Route;

Route::controller(ConferenceContentController::class)->group(function () {
    Route::get('/menus', 'menus');
    Route::get('/logo', 'logo');
    Route::get('/homeComponent', 'homeComponent');
    Route::get('/speakersComponent', 'speakersComponent');
    Route::get('/contactComponent', 'contactComponent');
    Route::get('/boardsComponent', 'boardsComponent');
    Route::get('/pdfComponent', 'pdfComponent');
    Route::get('/infoPDFComponent', 'infoPDFComponent');
    Route::get('/events', 'events');
    Route::get('/speakers', 'speakers');
    Route::get('/sponsors', 'sponsors');
    Route::get('/contact', 'contact');
    Route::get('/boards', 'boards');
    Route::get('/pdfDocument', 'pdfDocument');
    Route::get('/infoPdf', 'infoPdf');
    Route::get('/conferenceInfo', 'conferenceInfo');
});
