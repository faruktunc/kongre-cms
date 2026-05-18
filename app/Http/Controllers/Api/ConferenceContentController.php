<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\ContactItem;
use App\Models\Event;
use App\Models\Menu;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ConferenceContentController extends Controller
{
    public function menus(): JsonResponse
    {
        $links = Menu::query()
            ->active()
            ->orderBy('order')
            ->get()
            ->map(fn (Menu $menu) => $this->menuToLegacy($menu))
            ->values()
            ->all();

        return response()->json([
            'menus' => ['links' => $links, 'socials' => []],
            'links' => $links,
            'socials' => [],
        ]);
    }

    public function logo(): JsonResponse
    {
        return response()->json([
            'src' => '/assets/images/logo.png',
            'alt' => 'Logo',
        ]);
    }

    public function events(): JsonResponse
    {
        $event = Event::query()->active()->orderBy('order')->first();

        if (! $event) {
            return response()->json([]);
        }

        $payload = is_array($event->payload) ? $event->payload : [];

        return response()->json($this->eventIdentity(array_merge([
            'title' => $event->title,
            'description' => $event->description,
            'date' => $event->date,
            'location' => $event->location,
        ], $payload)));
    }

    public function sessions(): JsonResponse
    {
        $speakers = Speaker::query()->active()->get()->keyBy('id');

        $rows = Session::query()
            ->active()
            ->orderBy('date')
            ->orderBy('start_time')
            ->orderBy('order')
            ->get();

        return response()->json($rows->map(function (Session $row) use ($speakers): array {
            $speakerIds = collect($this->normalizeArray($row->speakers))
                ->map(fn (mixed $id): int => (int) $id)
                ->filter(fn (int $id): bool => $id > 0)
                ->values();

            return [
                'id' => $row->id,
                'event_id' => $row->event_id,
                'title' => $row->title,
                'description' => $row->description,
                'date' => $row->date,
                'start_time' => $row->start_time,
                'end_time' => $row->end_time,
                'order' => $row->order,
                'is_active' => $row->is_active,
                'speakers' => $speakerIds
                    ->map(function (int $speakerId) use ($speakers): ?array {
                        /** @var Speaker|null $speaker */
                        $speaker = $speakers->get($speakerId);

                        if (! $speaker) {
                            return null;
                        }

                        $payload = is_array($speaker->payload) ? $speaker->payload : [];

                        return [
                            'id' => $speaker->id,
                            'name' => $payload['name'] ?? $speaker->name,
                            'title' => $payload['title'] ?? $speaker->title,
                            'company' => $payload['company'] ?? $speaker->company,
                            'photo' => $this->assetUrl($speaker->photo ?? ($payload['photo'] ?? null)),
                            'bio' => $payload['bio'] ?? $speaker->bio,
                            'expertise' => $this->normalizeArray($payload['expertise'] ?? $speaker->expertise),
                        ];
                    })
                    ->filter()
                    ->values()
                    ->all(),
            ];
        })->values()->all());
    }

    public function speakers(): JsonResponse
    {
        $rows = Speaker::query()->active()->orderBy('order')->get();

        return response()->json($rows->map(function (Speaker $row): array {
            $fallback = [
                'id' => $row->id,
                'name' => $row->name,
                'title' => $row->title,
                'company' => $row->company,
                'photo' => $this->assetUrl($row->photo),
                'bio' => $row->bio,
                'expertise' => $this->normalizeArray($row->expertise),
                'isActive' => $row->is_active,
            ];

            if (! is_array($row->payload)) {
                return $fallback;
            }

            $payload = $row->payload;
            $payload['photo'] = $this->assetUrl($row->photo ?? ($payload['photo'] ?? null));
            $payload['expertise'] = $this->normalizeArray($payload['expertise'] ?? $row->expertise);

            return array_merge($fallback, $payload);
        })->values()->all());
    }

    public function sponsors(): JsonResponse
    {
        $rows = Sponsor::query()->active()->orderBy('order')->get();

        return response()->json($rows->map(function (Sponsor $row): array {
            $storageImageUrl = $this->sponsorStorageUrl($row->image, $row->payload);

            $fallback = [
                'id' => $row->id,
                'name' => $row->name,
                'imgsrc' => $storageImageUrl,
                'image' => $storageImageUrl,
                'url' => $row->url,
                'order' => $row->order,
                'isActive' => $row->is_active,
                'show' => true,
            ];

            if (! is_array($row->payload)) {
                return $fallback;
            }

            $payload = $row->payload;
            $payload['imgsrc'] = $storageImageUrl;
            $payload['image'] = $storageImageUrl;

            return array_merge($payload, $fallback);
        })->values()->all());
    }

    public function contact(): JsonResponse
    {
        $rows = ContactItem::query()->active()->orderBy('order')->get();

        return response()->json($rows->map(function (ContactItem $row): array {
            $fallback = [
                'icon' => $row->type,
                'title' => $row->label,
                'value' => $this->normalizeDisplayValue($row->value),
                'link' => null,
            ];

            if (! is_array($row->payload)) {
                return $fallback;
            }

            return array_merge($fallback, $row->payload);
        })->values()->all());
    }

    public function boards(): JsonResponse
    {
        $rows = Board::query()->active()->orderBy('order')->get();

        return response()->json($rows->map(function (Board $row): array {
            $fallback = [
                'id' => $row->id,
                'name' => $row->name,
                'members' => $this->normalizeArray($row->members),
                'isActive' => $row->is_active,
            ];

            if (! is_array($row->payload)) {
                return $fallback;
            }

            $payload = $row->payload;
            $payload['members'] = $this->normalizeArray($payload['members'] ?? $row->members);

            return array_merge($fallback, $payload);
        })->values()->all());
    }

    public function aboutConference(): JsonResponse
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $conferenceInfo = $payload['conference_info'] ?? [];

        return response()->json(is_array($conferenceInfo) ? $conferenceInfo : []);
    }

    private function assetUrl(?string $path): ?string
    {
        if ($path === null || trim($path) === '') {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }

    private function normalizeArray(mixed $value): array
    {
        if (is_array($value)) {
            return $value;
        }

        return [];
    }

    private function normalizeDisplayValue(mixed $value): string
    {
        if ($value === null) {
            return '';
        }

        if (is_scalar($value)) {
            return (string) $value;
        }

        $encodedValue = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return $encodedValue === false ? '' : $encodedValue;
    }

    private function sponsorStorageUrl(?string $imagePath, mixed $payload): ?string
    {
        $path = $imagePath;

        if (($path === null || trim($path) === '') && is_array($payload)) {
            $path = $payload['image'] ?? ($payload['imgsrc'] ?? null);
        }

        if (! is_string($path) || trim($path) === '') {
            return null;
        }

        $normalizedPath = $path;

        if (str_starts_with($normalizedPath, 'http://') || str_starts_with($normalizedPath, 'https://') || str_starts_with($normalizedPath, '/')) {
            $normalizedPath = basename(parse_url($normalizedPath, PHP_URL_PATH) ?? $normalizedPath);
        }

        if (! str_contains($normalizedPath, '/')) {
            $normalizedPath = 'sponsors/'.$normalizedPath;
        }

        return Storage::disk('public')->url($normalizedPath);
    }

    private function menuToLegacy(Menu $menu): array
    {
        $payload = $menu->payload ?? [];

        return array_merge([
            'id' => $menu->id,
            'name' => $menu->title,
            'slug' => $menu->slug,
            'url' => $menu->url,
            'parentId' => $menu->parent_id ?? 0,
            'order' => $menu->order,
            'isActive' => $menu->is_active,
        ], is_array($payload) ? $payload : []);
    }

    private function eventIdentity(array $event): array
    {
        $images = collect($this->normalizeArray($event['images'] ?? []))
            ->map(fn (mixed $path): ?string => is_string($path) ? $this->assetUrl($path) : null)
            ->filter(fn (?string $path): bool => is_string($path) && $path !== '')
            ->values()
            ->all();

        return [
            'title' => $event['title'] ?? null,
            'description' => $event['description'] ?? null,
            'date' => $event['date'] ?? null,
            'end_date' => $event['end_date'] ?? null,
            'location' => $event['location'] ?? null,
            'images' => $images,
            'highlight_words' => $this->normalizeArray($event['highlight_words'] ?? []),
        ];
    }
}
