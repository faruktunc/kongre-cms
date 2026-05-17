<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('home');
});

Route::get('/speakers', function (){
    return inertia('speakers');
});


Route::get("/contact", function () {
    return inertia('contact');
});

Route::get('/boards', function () {
    return inertia('board');
});

Route::get('/pdf', function() {
    return inertia("pdf");
});

Route::get("/info", function(){
    return inertia("infoPDF");
});

Route::get('/{slug}', function ($slug) {
    return inertia('DynamicPage', [
        'pageSlug' => $slug
    ]);
})->name('page.show');


