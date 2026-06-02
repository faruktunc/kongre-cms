<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Page::staticPages() as $staticPage) {
            if (($staticPage['slug'] ?? null) === 'duyurular') {
                continue;
            }

            Page::query()->updateOrCreate(
                ['slug' => $staticPage['slug'] ?? null],
                [
                    'id' => $staticPage['id'] ?? null,
                    'title' => $staticPage['name'] ?? 'Untitled',
                    'subtitle' => null,
                    'content' => null,
                    'gallery' => [],
                    'documents' => [],
                    'slug' => $staticPage['slug'] ?? null,
                    'parent_id' => ($staticPage['parentId'] ?? 0) > 0 ? $staticPage['parentId'] : -1,
                    'order' => $staticPage['order'] ?? 0,
                    'is_active' => $staticPage['isActive'] ?? true,
                ]
            );
        }

        $menuItems = [
            ['id' => 2001, 'title' => 'Konular', 'parent_id' => -1],
            ['id' => 2002, 'title' => 'Genel Bilgiler', 'parent_id' => -1],
            ['id' => 2003, 'title' => 'Önemli Tarihler', 'parent_id' => 2002],
            ['id' => 2004, 'title' => 'Kongre Bilgileri', 'parent_id' => 2002],
            ['id' => 2005, 'title' => 'Denizli Hakkında', 'parent_id' => 2002],
            ['id' => 2006, 'title' => 'Kongre Merkezi', 'parent_id' => 2002],
            ['id' => 2007, 'title' => 'Ulaşım', 'parent_id' => 2002],
            ['id' => 2008, 'title' => 'Bildiri Gönderimi', 'parent_id' => -1],
            ['id' => 2009, 'title' => 'Kayıt-Konaklama', 'parent_id' => -1],
            ['id' => 2010, 'title' => 'Kayıt', 'parent_id' => 2009],
            ['id' => 2011, 'title' => 'Konaklama', 'parent_id' => 2009],
            ['id' => 2015, 'title' => 'Programlar', 'parent_id' => -1],
            ['id' => 2016, 'title' => 'Sosyal Program', 'parent_id' => 2015],
            ['id' => 2017, 'title' => 'Kongre Programı', 'parent_id' => 2015],
        ];

        foreach ($menuItems as $index => $menuItem) {
            $existing = Page::find($menuItem['id']);
            $slug = $existing?->slug ?? Page::generateUniqueSlug($menuItem['title'], $menuItem['id']);

            Page::query()->updateOrCreate(
                ['id' => $menuItem['id']],
                [
                    'title' => $menuItem['title'],
                    'subtitle' => null,
                    'content' => null,
                    'gallery' => [],
                    'documents' => [],
                    'slug' => $slug,
                    'parent_id' => $menuItem['parent_id'],
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
