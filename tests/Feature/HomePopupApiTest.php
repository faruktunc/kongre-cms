<?php

use App\Models\HomePopup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('returns active home popups in display order', function () {
    Storage::fake('public');

    HomePopup::query()->create([
        'title' => 'Pasif Duyuru',
        'order' => 1,
        'is_active' => false,
    ]);

    HomePopup::query()->create([
        'title' => 'İkinci Duyuru',
        'message' => '<p>İkinci mesaj</p>',
        'banner_image' => 'home-popups/ikinci.jpg',
        'button_label' => 'Detaylar',
        'button_url' => 'https://example.com',
        'order' => 20,
        'is_active' => true,
    ]);

    HomePopup::query()->create([
        'message' => '<p>İlk mesaj</p>',
        'banner_image' => 'home-popups/ilk.jpg',
        'order' => 10,
        'is_active' => true,
    ]);

    $this->getJson('/api/home-popups')
        ->assertSuccessful()
        ->assertJsonCount(2)
        ->assertJsonPath('0.title', null)
        ->assertJsonPath('0.bannerImage', Storage::disk('public')->url('home-popups/ilk.jpg'))
        ->assertJsonPath('1.title', 'İkinci Duyuru')
        ->assertJsonPath('1.buttonLabel', 'Detaylar');
});
