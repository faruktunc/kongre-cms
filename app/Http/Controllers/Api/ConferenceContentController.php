<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Board;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\Page;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ConferenceContentController extends Controller
{
    public function menus(): JsonResponse
    {
        $dynamicLinks = Page::query()
            ->active()
            ->orderBy('order')
            ->get()
            ->filter(fn (Page $page): bool => ! $page->isStaticPage())
            ->map(fn (Page $page): array => $this->pageToLegacy($page))
            ->values()
            ->all();

        $links = collect(Page::staticPages())
            ->map(fn (array $page): array => array_merge($page, [
                'url' => isset($page['slug']) ? '/'.ltrim((string) $page['slug'], '/') : null,
            ]))
            ->merge($dynamicLinks)
            ->unique(fn (array $item): string => (string) ($item['slug'] ?? $item['url'] ?? $item['id']))
            ->sortBy('order')
            ->values()
            ->all();

        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $general = is_array($payload['general'] ?? null) ? $payload['general'] : [];
        $socials = collect(is_array($general['socials'] ?? null) ? $general['socials'] : [])
            ->filter(fn (mixed $item): bool => is_array($item) && ($item['isActive'] ?? true))
            ->values()
            ->all();

        return response()->json([
            'menus' => ['links' => $links, 'socials' => $socials],
            'links' => $links,
            'socials' => $socials,
        ]);
    }

    public function logo(): JsonResponse
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $general = is_array($payload['general'] ?? null) ? $payload['general'] : [];
        $logo = is_array($general['logo'] ?? null) ? $general['logo'] : [];

        return response()->json([
            'src' => $this->assetUrl($logo['src'] ?? null) ?? '/assets/images/logo.png',
            'alt' => $logo['alt'] ?? 'Logo',
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
            ->chronological()
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
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $contact = is_array($payload['contact'] ?? null) ? $payload['contact'] : [];

        $items = [];

        if (($contact['phone']['is_active'] ?? false) && filled($contact['phone']['value'] ?? null)) {
            $phone = (string) $contact['phone']['value'];
            $items[] = [
                'icon' => 'Phone',
                'title' => 'Telefon',
                'value' => $phone,
                'link' => 'tel:'.preg_replace('/\s+/', '', $phone),
            ];
        }

        if (($contact['email']['is_active'] ?? false) && filled($contact['email']['value'] ?? null)) {
            $email = (string) $contact['email']['value'];
            $items[] = [
                'icon' => 'Mail',
                'title' => 'E-posta',
                'value' => $email,
                'link' => 'mailto:'.$email,
            ];
        }

        if (($contact['address']['is_active'] ?? false) && filled($contact['address']['value'] ?? null)) {
            $items[] = [
                'icon' => 'MapPin',
                'title' => 'Adres',
                'value' => (string) $contact['address']['value'],
                'link' => null,
            ];
        }

        if (($contact['hours']['is_active'] ?? false) && filled($contact['hours']['value'] ?? null)) {
            $items[] = [
                'icon' => 'Clock',
                'title' => 'Calisma Saatleri',
                'value' => (string) $contact['hours']['value'],
                'link' => null,
            ];
        }

        if ($contact['academic']['is_active'] ?? false) {
            $members = collect(is_array($contact['academic']['members'] ?? null) ? $contact['academic']['members'] : [])
                ->filter(fn (mixed $member): bool => is_array($member) && ($member['isActive'] ?? true))
                ->map(fn (array $member): array => [
                    'name' => $member['name'] ?? null,
                    'email' => $member['email'] ?? null,
                ])
                ->filter(fn (array $member): bool => filled($member['name']) && filled($member['email']))
                ->values()
                ->all();

            if ($members !== []) {
                $items[] = [
                    'icon' => 'Mail',
                    'title' => 'Akademik İletişim',
                    'members' => $members,
                ];
            }
        }

        return response()->json($items);
    }

    public function storeContactMessage(StoreContactMessageRequest $request): Response
    {
        ContactMessage::query()->create([
            'name' => $request->string('name')->toString(),
            'email' => $request->string('email')->toString(),
            'subject' => $request->string('subject')->toString(),
            'message' => $request->string('message')->toString(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'is_read' => false,
        ]);

        return response()->noContent();
    }

    public function boards(): JsonResponse
    {
        $rows = Board::query()->active()->orderBy('order')->get();

        return response()->json($rows->map(fn (Board $row): array => [
            'id' => $row->id,
            'name' => $row->name,
            'icon' => $row->icon,
            'members' => $this->normalizeArray($row->members),
            'isActive' => $row->is_active,
        ])->values()->all());
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

    private function pageToLegacy(Page $page): array
    {
        $gallery = collect($this->normalizeArray($page->gallery))
            ->map(fn (mixed $path): ?string => is_string($path) ? $this->assetUrl($path) : null)
            ->filter(fn (?string $path): bool => is_string($path) && $path !== '')
            ->values()
            ->all();

        $documents = collect($this->normalizeArray($page->documents))
            ->map(function (mixed $item, int $index): ?array {
                if (is_string($item)) {
                    $url = $this->assetUrl($item);

                    if (! is_string($url) || $url === '') {
                        return null;
                    }

                    return [
                        'display_name' => 'Doküman '.($index + 1),
                        'url' => $url,
                    ];
                }

                if (! is_array($item)) {
                    return null;
                }

                $displayName = $item['display_name'] ?? $item['name'] ?? null;
                $rawPath = $item['file'] ?? $item['url'] ?? null;
                $url = is_string($rawPath) ? $this->assetUrl($rawPath) : null;

                if (! is_string($url) || $url === '') {
                    return null;
                }

                return [
                    'display_name' => filled($displayName) ? (string) $displayName : 'Doküman '.($index + 1),
                    'url' => $url,
                ];
            })
            ->filter(fn (?array $item): bool => is_array($item))
            ->values()
            ->all();

        return [
            'id' => $page->id,
            'name' => $page->title,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'content' => $page->content,
            'gallery' => $gallery,
            'documents' => $documents,
            'slug' => $page->slug,
            'url' => $page->slug ? '/'.ltrim($page->slug, '/') : null,
            'parentId' => $page->parent_id ?? 0,
            'order' => $page->order,
            'isActive' => $page->is_active,
        ];
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
