<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('home');
});

Route::get('/konusmacilar', function () {
    return inertia('speakers');
});

Route::get('/iletisim', function () {
    return inertia('contact');
});

Route::get('/duyurular/{announcementSlug}', function (string $announcementSlug) {
    return inertia('announcement', [
        'announcementSlug' => $announcementSlug,
    ]);
})->name('announcements.show');

Route::get('/{slug}', function ($slug) {
    return inertia('DynamicPage', [
        'pageSlug' => $slug,
    ]);
})->name('page.show');
