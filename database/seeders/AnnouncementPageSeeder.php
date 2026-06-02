<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class AnnouncementPageSeeder extends Seeder
{
    public function run(): void
    {
        $announcementPage = collect(Page::staticPages())
            ->firstWhere('slug', 'duyurular');

        if (! is_array($announcementPage)) {
            return;
        }

        Page::query()->updateOrCreate(
            ['slug' => $announcementPage['slug']],
            [
                'id' => $announcementPage['id'] ?? null,
                'title' => $announcementPage['name'] ?? 'Duyurular',
                'subtitle' => null,
                'content' => null,
                'gallery' => [],
                'documents' => [],
                'slug' => $announcementPage['slug'],
                'parent_id' => ($announcementPage['parentId'] ?? 0) > 0 ? $announcementPage['parentId'] : -1,
                'order' => $announcementPage['order'] ?? 0,
                'is_active' => $announcementPage['isActive'] ?? true,
            ],
        );
    }
}
