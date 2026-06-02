<?php

use App\Models\Announcement;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists active announcements by newest creation date', function () {
    Announcement::factory()->create([
        'title' => 'Pasif Duyuru',
        'is_active' => false,
    ]);

    Announcement::factory()->create([
        'title' => 'İkinci Duyuru',
        'slug' => 'ikinci-duyuru',
        'subtitle' => 'İkinci alt başlık',
        'content' => [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        ['type' => 'text', 'text' => 'İkinci içerik'],
                    ],
                ],
            ],
        ],
        'gallery' => ['announcements/gallery/second.jpg'],
        'documents' => [
            ['display_name' => 'Program', 'file' => 'announcements/documents/program.pdf'],
        ],
        'published_at' => '2026-06-02 12:00:00',
        'created_at' => '2026-06-01 12:00:00',
        'is_active' => true,
    ]);

    Announcement::factory()->create([
        'title' => 'İlk Duyuru',
        'slug' => 'ilk-duyuru',
        'published_at' => '2026-06-01 12:00:00',
        'created_at' => '2026-06-02 12:00:00',
        'is_active' => true,
    ]);

    $response = $this->getJson('/api/announcements')
        ->assertSuccessful();

    expect(collect($response->json('data'))->pluck('title')->all())
        ->toBe(['İlk Duyuru', 'İkinci Duyuru'])
        ->and($response->json('data.1.subtitle'))->toBe('İkinci alt başlık')
        ->and($response->json('data.1.slug'))->toBe('ikinci-duyuru')
        ->and($response->json('data.1.url'))->toBe('/duyurular/ikinci-duyuru')
        ->and($response->json('data.1.content'))->toContain('İkinci içerik')
        ->and($response->json('data.1.gallery.0'))->toContain('/storage/announcements/gallery/second.jpg')
        ->and($response->json('data.1.documents.0.display_name'))->toBe('Program')
        ->and($response->json('data.1.documents.0.url'))->toContain('/storage/announcements/documents/program.pdf')
        ->and($response->json('data.1.publishedAt'))->toStartWith('2026-06-02T12:00:00')
        ->and($response->json('data.1'))->not->toHaveKey('order')
        ->and($response->json('meta.per_page'))->toBe(10);
});

it('paginates announcements ten at a time', function () {
    Announcement::factory()
        ->count(11)
        ->sequence(fn ($sequence) => [
            'title' => 'Duyuru '.($sequence->index + 1),
            'slug' => 'duyuru-'.($sequence->index + 1),
            'created_at' => now()->subMinutes($sequence->index),
        ])
        ->create();

    $firstPage = $this->getJson('/api/announcements')
        ->assertSuccessful();

    $secondPage = $this->getJson('/api/announcements?page=2')
        ->assertSuccessful();

    expect($firstPage->json('data'))->toHaveCount(10)
        ->and($firstPage->json('meta.per_page'))->toBe(10)
        ->and($firstPage->json('meta.current_page'))->toBe(1)
        ->and($firstPage->json('meta.last_page'))->toBe(2)
        ->and($secondPage->json('data'))->toHaveCount(1)
        ->and($secondPage->json('meta.current_page'))->toBe(2);
});

it('sets the publish date automatically when creating announcements', function () {
    $announcement = Announcement::query()->create([
        'title' => 'Otomatik Tarih',
        'slug' => 'otomatik-tarih',
        'is_active' => true,
    ]);

    expect($announcement->published_at)->not->toBeNull();
});

it('shows a single active announcement by slug', function () {
    Announcement::factory()->create([
        'title' => 'Detay Duyuru',
        'slug' => 'detay-duyuru',
        'content' => [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        ['type' => 'text', 'text' => 'Detay içeriği'],
                    ],
                ],
            ],
        ],
        'is_active' => true,
    ]);

    $response = $this->getJson('/api/announcements/detay-duyuru')
        ->assertSuccessful()
        ->assertJsonPath('title', 'Detay Duyuru')
        ->assertJsonPath('slug', 'detay-duyuru')
        ->assertJsonPath('url', '/duyurular/detay-duyuru');

    expect($response->json('content'))->toContain('Detay içeriği');
});

it('does not show inactive announcements by slug', function () {
    Announcement::factory()->create([
        'title' => 'Pasif Detay',
        'slug' => 'pasif-detay',
        'is_active' => false,
    ]);

    $this->getJson('/api/announcements/pasif-detay')
        ->assertNotFound();
});

it('exposes announcements static page in menus api', function () {
    $response = $this->getJson('/api/menus')
        ->assertSuccessful();

    $announcementPage = collect($response->json('links'))
        ->firstWhere('slug', 'duyurular');

    expect($announcementPage)
        ->not->toBeNull()
        ->and($announcementPage['name'])->toBe('Duyurular')
        ->and($announcementPage['url'])->toBe('/duyurular')
        ->and($announcementPage['isActive'])->toBeTrue();
});
