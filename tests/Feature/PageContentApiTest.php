<?php

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

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
