<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Event;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ConferenceContentSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('mocks/db.json');
        if (! file_exists($path)) {
            return;
        }

        $json = json_decode((string) file_get_contents($path), true);
        if (! is_array($json)) {
            return;
        }

        $this->seedSpeakers($json['speakers'] ?? []);
        $this->seedSponsors($json['sponsors'] ?? []);
        $this->seedBoards($json['boards'] ?? []);
        $event = $json['events'] ?? null;
        if (is_array($event)) {
            $logo = is_array($json['logo'] ?? null) ? $json['logo'] : [];
            $socials = is_array($json['menus']['socials'] ?? null) ? $json['menus']['socials'] : [];

            $eventIdentity = [
                'title' => $event['title'] ?? null,
                'description' => $event['description'] ?? null,
                'date' => $event['date'] ?? null,
                'end_date' => $event['end_date'] ?? null,
                'location' => $event['location'] ?? null,
                'images' => $this->normalizeSliderImagePaths($event['images'] ?? []),
                'highlight_words' => $event['highlight_words'] ?? [],
                'conference_info' => is_array($json['conferenceInfo'] ?? null) ? $json['conferenceInfo'] : [],
                'contact' => $this->buildContactPayload($json['contact'] ?? []),
                'general' => [
                    'logo' => [
                        'src' => $this->normalizeLogoPath($logo['src'] ?? null),
                        'alt' => $logo['alt'] ?? 'Logo',
                    ],
                    'socials' => $socials,
                ],
            ];

            $eventModel = Event::updateOrCreate(
                ['id' => $event['id'] ?? 1],
                [
                    'title' => $event['title'] ?? null,
                    'date' => $event['date'] ?? null,
                    'location' => $event['location'] ?? null,
                    'description' => $event['description'] ?? null,
                    'payload' => $eventIdentity,
                    'order' => $event['order'] ?? 0,
                    'is_active' => $event['isActive'] ?? true,
                ]
            );

            $this->seedSessions($eventModel->id, $event['sessions'] ?? []);
        }
    }

    private function seedSpeakers(array $items): void
    {
        foreach ($items as $index => $item) {
            if (! is_array($item)) {
                continue;
            }

            Speaker::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? 'Unknown',
                    'title' => $item['title'] ?? null,
                    'company' => $item['company'] ?? null,
                    'photo' => $this->normalizeSpeakerPhotoPath($item['photo'] ?? null),
                    'bio' => $item['bio'] ?? null,
                    'expertise' => $item['expertise'] ?? [],
                    'payload' => $item,
                    'order' => $item['order'] ?? ($index + 1) * 10,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }

    private function normalizeSpeakerPhotoPath(mixed $rawPath): ?string
    {
        if (! is_string($rawPath) || trim($rawPath) === '') {
            return null;
        }

        $filename = basename(parse_url($rawPath, PHP_URL_PATH) ?? $rawPath);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        $sourcePath = public_path('assets/images/'.$filename);
        $destinationPath = 'speakers/'.$filename;

        if (is_file($sourcePath) && ! Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->put($destinationPath, (string) file_get_contents($sourcePath));
        }

        if (Storage::disk('public')->exists($destinationPath)) {
            return $destinationPath;
        }

        return null;
    }

    private function normalizeLogoPath(mixed $rawPath): ?string
    {
        if (! is_string($rawPath) || trim($rawPath) === '') {
            return null;
        }

        $filename = basename(parse_url($rawPath, PHP_URL_PATH) ?? $rawPath);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        $sourcePath = public_path('assets/images/'.$filename);
        $destinationPath = 'logos/'.$filename;

        if (is_file($sourcePath) && ! Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->put($destinationPath, (string) file_get_contents($sourcePath));
        }

        if (Storage::disk('public')->exists($destinationPath)) {
            return $destinationPath;
        }

        return null;
    }

    private function seedSponsors(array $items): void
    {
        foreach ($items as $item) {
            if (! is_array($item)) {
                continue;
            }

            $storageImagePath = $this->normalizeSponsorImagePath(
                $item['imgsrc'] ?? ($item['image'] ?? null)
            );

            Sponsor::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? 'Sponsor',
                    'image' => $storageImagePath,
                    'url' => $item['url'] ?? null,
                    'payload' => $item,
                    'order' => $item['order'] ?? 0,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }

    private function normalizeSponsorImagePath(mixed $rawPath): ?string
    {
        if (! is_string($rawPath) || trim($rawPath) === '') {
            return null;
        }

        $filename = basename(parse_url($rawPath, PHP_URL_PATH) ?? $rawPath);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        $sourcePath = public_path('assets/images/sponsors/'.$filename);
        $destinationPath = 'sponsors/'.$filename;

        if (is_file($sourcePath) && ! Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->put($destinationPath, (string) file_get_contents($sourcePath));
        }

        if (Storage::disk('public')->exists($destinationPath)) {
            return $destinationPath;
        }

        return null;
    }

    private function seedBoards(array $items): void
    {
        foreach ($items as $index => $item) {
            if (! is_array($item)) {
                continue;
            }

            Board::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'name' => $item['name'] ?? 'Board',
                    'members' => $item['members'] ?? [],
                    'order' => $item['order'] ?? ($index + 1) * 10,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }

    private function seedSessions(int $eventId, array $items): void
    {
        foreach ($items as $index => $item) {
            if (! is_array($item)) {
                continue;
            }

            Session::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'event_id' => $eventId,
                    'title' => $item['title'] ?? null,
                    'description' => $item['description'] ?? null,
                    'date' => $item['date'] ?? null,
                    'start_time' => $item['start_time'] ?? null,
                    'end_time' => $item['end_time'] ?? null,
                    'speakers' => $item['speakers'] ?? [],
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }

    private function normalizeSliderImagePaths(mixed $rawPaths): array
    {
        if (! is_array($rawPaths)) {
            return [];
        }

        return collect($rawPaths)
            ->map(fn (mixed $path): ?string => $this->normalizeSliderImagePath($path))
            ->filter(fn (?string $path): bool => is_string($path) && $path !== '')
            ->values()
            ->all();
    }

    private function normalizeSliderImagePath(mixed $rawPath): ?string
    {
        if (! is_string($rawPath) || trim($rawPath) === '') {
            return null;
        }

        $filename = basename(parse_url($rawPath, PHP_URL_PATH) ?? $rawPath);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        $destinationPath = 'slider/'.$filename;

        if (Storage::disk('public')->exists($destinationPath)) {
            return $destinationPath;
        }

        $sourceCandidates = [
            public_path('assets/images/slider/'.$filename),
            public_path('assets/images/'.$filename),
            public_path($filename),
        ];

        foreach ($sourceCandidates as $sourcePath) {
            if (is_file($sourcePath)) {
                Storage::disk('public')->put($destinationPath, (string) file_get_contents($sourcePath));

                return $destinationPath;
            }
        }

        return str_contains($rawPath, '/') && ! str_starts_with($rawPath, '/')
            ? $rawPath
            : null;
    }

    private function buildContactPayload(array $items): array
    {
        $payload = [
            'phone' => ['value' => null, 'is_active' => false],
            'email' => ['value' => null, 'is_active' => false],
            'address' => ['value' => null, 'is_active' => false],
            'hours' => ['value' => null, 'is_active' => false],
            'academic' => ['is_active' => false, 'members' => []],
        ];

        foreach ($items as $item) {
            if (! is_array($item)) {
                continue;
            }

            $title = mb_strtolower((string) ($item['title'] ?? ''), 'UTF-8');
            $isActive = (bool) ($item['isActive'] ?? true);

            if (str_contains($title, 'telefon')) {
                $payload['phone'] = ['value' => $item['value'] ?? null, 'is_active' => $isActive];
            } elseif (str_contains($title, 'e-posta') || str_contains($title, 'email')) {
                $payload['email'] = ['value' => $item['value'] ?? null, 'is_active' => $isActive];
            } elseif (str_contains($title, 'adres')) {
                $payload['address'] = ['value' => $item['value'] ?? null, 'is_active' => $isActive];
            } elseif (str_contains($title, 'saat')) {
                $payload['hours'] = ['value' => $item['value'] ?? null, 'is_active' => $isActive];
            } elseif (str_contains($title, 'akademik')) {
                $members = collect(is_array($item['members'] ?? null) ? $item['members'] : [])
                    ->filter(fn (mixed $member): bool => is_array($member))
                    ->map(fn (array $member): array => [
                        'name' => $member['name'] ?? null,
                        'email' => $member['email'] ?? null,
                        'isActive' => $member['isActive'] ?? true,
                    ])
                    ->values()
                    ->all();

                $payload['academic'] = [
                    'is_active' => $isActive,
                    'members' => $members,
                ];
            }
        }

        return $payload;
    }
}
