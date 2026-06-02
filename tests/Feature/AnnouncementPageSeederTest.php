<?php

use App\Models\Page;
use Database\Seeders\AnnouncementPageSeeder;
use Database\Seeders\PageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('keeps announcements out of the general page seeder', function () {
    $this->seed(PageSeeder::class);

    expect(Page::query()->where('slug', 'duyurular')->exists())->toBeFalse();
});

it('seeds the announcements static page independently', function () {
    $this->seed(AnnouncementPageSeeder::class);

    $page = Page::query()->where('slug', 'duyurular')->first();

    expect($page)
        ->not->toBeNull()
        ->and($page->title)->toBe('Duyurular')
        ->and($page->parent_id)->toBe(-1)
        ->and($page->order)->toBe(45)
        ->and($page->is_active)->toBeTrue();
});
