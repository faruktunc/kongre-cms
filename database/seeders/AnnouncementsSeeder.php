<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $title = rtrim(fake()->sentence(fake()->numberBetween(5, 10), false), '.');

            $paragraphs = array_map(
                fn (string $text): array => [
                    'type' => 'paragraph',
                    'content' => [
                        ['type' => 'text', 'text' => $text],
                    ],
                ],
                fake()->paragraphs(5),
            );

            Announcement::create([
                'title' => $title,
                'slug' => Announcement::generateUniqueSlug($title),
                'subtitle' => fake()->sentence(fake()->numberBetween(6, 12), false),
                'content' => [
                    'type' => 'doc',
                    'content' => $paragraphs,
                ],
                'gallery' => [],
                'documents' => [],
                'published_at' => now()->subDays(49 - $i)->startOfDay(),
                'is_active' => true,
            ]);
        }
    }
}
