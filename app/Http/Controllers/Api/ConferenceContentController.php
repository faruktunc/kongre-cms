<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\ContactItem;
use App\Models\Document;
use App\Models\Event;
use App\Models\Menu;
use App\Models\PageComponent;
use App\Models\Setting;
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

        $socials = $this->setting('menu_socials', []);

        return response()->json([
            'menus' => ['links' => $links, 'socials' => $socials],
            'links' => $links,
            'socials' => is_array($socials) ? $socials : [],
        ]);
    }

    public function logo(): JsonResponse
    {
        $logo = $this->setting('logo', ['src' => null, 'alt' => null]);

        if (! is_array($logo)) {
            return response()->json(['src' => null, 'alt' => null]);
        }

        $logo['src'] = $this->assetUrl($logo['src'] ?? null);

        return response()->json($logo);
    }

    public function homeComponent(): JsonResponse
    {
        return response()->json($this->components('homeComponent'));
    }

    public function speakersComponent(): JsonResponse
    {
        return response()->json($this->components('speakersComponent'));
    }

    public function contactComponent(): JsonResponse
    {
        return response()->json($this->components('contactComponent'));
    }

    public function boardsComponent(): JsonResponse
    {
        return response()->json($this->components('boardsComponent'));
    }

    public function pdfComponent(): JsonResponse
    {
        return response()->json($this->components('pdfComponent'));
    }

    public function infoPDFComponent(): JsonResponse
    {
        return response()->json($this->components('infoPDFComponent'));
    }

    public function events(): JsonResponse
    {
        $event = Event::query()->active()->orderBy('order')->first();

        return response()->json($event?->payload ?? []);
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

    public function pdfDocument(): JsonResponse
    {
        $doc = Document::query()->active()->where('type', 'pdfDocument')->orderBy('order')->first();
        if (! $doc) {
            return response()->json([]);
        }

        $fallback = [
            'id' => $doc->id,
            'title' => $doc->title,
            'description' => $doc->description,
            'url' => $this->assetUrl($doc->file_path),
            'file_path' => $this->assetUrl($doc->file_path),
            'type' => $doc->type,
        ];

        if (! is_array($doc->payload)) {
            return response()->json($fallback);
        }

        $payload = $doc->payload;
        $payload['url'] = $this->assetUrl($doc->file_path ?? ($payload['url'] ?? ($payload['file_path'] ?? null)));
        $payload['file_path'] = $this->assetUrl($doc->file_path ?? ($payload['file_path'] ?? ($payload['url'] ?? null)));

        return response()->json(array_merge($fallback, $payload));
    }

    public function infoPdf(): JsonResponse
    {
        $value = $this->setting('infoPdf', []);

        return response()->json(is_array($value) ? $value : []);
    }

    public function conferenceInfo(): JsonResponse
    {
        $value = $this->setting('conferenceInfo', []);

        return response()->json(is_array($value) ? $value : []);
    }

    private function components(string $key): array
    {
        return PageComponent::query()
            ->where('component_key', $key)
            ->active()
            ->orderBy('order')
            ->get()
            ->map(fn (PageComponent $row) => $row->payload ?? [
                'id' => $row->id,
                'component' => $row->title,
                'order' => $row->order,
                'isActive' => $row->is_active,
            ])
            ->values()
            ->all();
    }

    private function setting(string $key, mixed $default = null): mixed
    {
        return Setting::query()->where('key', $key)->value('value') ?? $default;
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
}
