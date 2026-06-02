<?php

use App\Models\Board;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('uses database order for static pages in menus api', function () {
    Page::query()->create([
        'id' => 1002,
        'title' => 'Konuşmacılar',
        'slug' => 'konusmacilar',
        'parent_id' => Page::defaultParentKey(),
        'order' => 5,
        'is_active' => true,
    ]);

    Page::query()->create([
        'id' => 1003,
        'title' => 'Kongre Takvimi',
        'slug' => 'kongre-takvimi',
        'parent_id' => Page::defaultParentKey(),
        'order' => 2,
        'is_active' => true,
    ]);

    $response = $this->getJson('/api/menus')
        ->assertSuccessful();

    $links = collect($response->json('links'));

    expect($links->whereIn('slug', ['konusmacilar', 'kongre-takvimi'])->pluck('slug')->values()->all())
        ->toBe(['kongre-takvimi', 'konusmacilar']);
});

it('exposes boards as a dropdown menu instead of a page link', function () {
    Page::query()->create([
        'title' => 'Kurullar',
        'slug' => 'kurullar',
        'parent_id' => Page::defaultParentKey(),
        'order' => 3,
        'is_active' => true,
    ]);

    Board::query()->create([
        'name' => 'Bilim Kurulu',
        'icon' => 'GraduationCap',
        'members' => [
            ['name' => 'İkinci Üye', 'title' => 'Dr.', 'institution' => 'GÜ', 'order' => 20],
            ['name' => 'İlk Üye', 'title' => 'Prof. Dr.', 'institution' => 'GÜ', 'order' => 10],
        ],
        'order' => 20,
        'is_active' => true,
    ]);

    Board::query()->create([
        'name' => 'Pasif Kurul',
        'icon' => 'Users',
        'members' => [],
        'order' => 10,
        'is_active' => false,
    ]);

    $response = $this->getJson('/api/menus')
        ->assertSuccessful();

    $boardsMenu = collect($response->json('links'))
        ->firstWhere('slug', 'kurullar');

    expect($boardsMenu)
        ->not->toBeNull()
        ->and($boardsMenu['url'])->toBeNull()
        ->and($boardsMenu['menuType'])->toBe('boards')
        ->and($boardsMenu['boards'])->toHaveCount(1)
        ->and($boardsMenu['boards'][0]['name'])->toBe('Bilim Kurulu')
        ->and($boardsMenu['boards'][0]['icon'])->toBe('GraduationCap')
        ->and(collect($boardsMenu['boards'][0]['members'])->pluck('name')->all())
        ->toBe(['İlk Üye', 'İkinci Üye']);
});

it('does not expose the standalone boards api endpoint', function () {
    $this->getJson('/api/boards')
        ->assertNotFound();
});

it('renders dynamic page content through filament rich content renderer', function () {
    $page = Page::query()->create([
        'title' => 'Table Page',
        'slug' => 'table-page',
        'content' => [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'table',
                    'content' => [
                        [
                            'type' => 'tableRow',
                            'content' => [
                                [
                                    'type' => 'tableHeader',
                                    'attrs' => [
                                        'colspan' => 1,
                                        'rowspan' => 1,
                                        'colwidth' => [56],
                                    ],
                                    'content' => [
                                        [
                                            'type' => 'paragraph',
                                            'content' => [
                                                ['type' => 'text', 'text' => 'test'],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type' => 'tableHeader',
                                    'attrs' => [
                                        'colspan' => 1,
                                        'rowspan' => 1,
                                        'colwidth' => null,
                                    ],
                                    'content' => [
                                        [
                                            'type' => 'paragraph',
                                            'content' => [
                                                ['type' => 'text', 'text' => 'test'],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'parent_id' => Page::defaultParentKey(),
        'order' => 1,
        'is_active' => true,
    ]);

    $response = $this->getJson('/api/menus')
        ->assertSuccessful();

    $renderedPage = collect($response->json('links'))
        ->firstWhere('id', $page->id);

    expect($renderedPage['content'] ?? null)
        ->toContain('<table>')
        ->toContain('width: 56px')
        ->toContain('min-width: 56px');
});
