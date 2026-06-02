<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Announcement;
use App\Models\Board;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\HomePopup;
use App\Models\Page;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\Sponsor;
use Awcodes\RicherEditor\Plugins\EmbedPlugin;
use Awcodes\RicherEditor\Plugins\EmojiPlugin;
use Awcodes\RicherEditor\Plugins\IdPlugin;
use Awcodes\RicherEditor\Plugins\LinkPlugin;
use DOMDocument;
use DOMElement;
use DOMXPath;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ConferenceContentController extends Controller
{
    public function menus(): JsonResponse
    {
        $databaseLinks = Page::query()
            ->active()
            ->orderBy('order')
            ->orderBy('id')
            ->get()
            ->map(fn (Page $page): array => $this->pageToLegacy($page))
            ->values()
            ->collect();

        $databaseIds = $databaseLinks->pluck('id');
        $databaseSlugs = $databaseLinks->pluck('slug')->filter();

        $fallbackStaticLinks = collect(Page::staticPages())
            ->reject(fn (array $page): bool => $databaseIds->contains($page['id'] ?? null)
                || $databaseSlugs->contains($page['slug'] ?? null))
            ->map(fn (array $page): array => $this->staticPageToLegacy($page));

        $links = $databaseLinks
            ->merge($fallbackStaticLinks)
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

    public function announcements(): JsonResponse
    {
        $paginator = Announcement::query()
            ->active()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10);

        return response()->json([
            'data' => $paginator
                ->getCollection()
                ->map(fn (Announcement $row): array => $this->announcementToLegacy($row))
                ->values()
                ->all(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'from' => $paginator->firstItem(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'to' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ],
            'links' => [
                'first' => $paginator->url(1),
                'last' => $paginator->url($paginator->lastPage()),
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
        ]);
    }

    public function announcement(Announcement $announcement): JsonResponse
    {
        abort_unless($announcement->is_active, 404);

        return response()->json($this->announcementToLegacy($announcement));
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

        return response()->json([
            'items' => $items,
            'turnstileSiteKey' => config('services.turnstile.key'),
        ]);
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

    public function aboutConference(): JsonResponse
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $conferenceInfo = $payload['conference_info'] ?? [];

        return response()->json(is_array($conferenceInfo) ? $conferenceInfo : []);
    }

    public function homePopups(): JsonResponse
    {
        $rows = HomePopup::query()
            ->active()
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return response()->json($rows->map(fn (HomePopup $row): array => [
            'id' => $row->id,
            'title' => $row->title,
            'message' => $row->message,
            'bannerImage' => $this->assetUrl($row->banner_image),
            'buttonLabel' => $row->button_label,
            'buttonUrl' => $row->button_url,
            'order' => $row->order,
            'isActive' => $row->is_active,
        ])->values()->all());
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

        $legacyPage = [
            'id' => $page->id,
            'name' => $page->title,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'content' => $this->renderRichContent($page->content),
            'gallery' => $gallery,
            'documents' => $documents,
            'slug' => $page->slug,
            'url' => $page->slug ? '/'.ltrim($page->slug, '/') : null,
            'parentId' => $page->parent_id ?? 0,
            'order' => $page->order,
            'isActive' => $page->is_active,
        ];

        if ($page->slug === 'kurullar') {
            $legacyPage['url'] = null;
            $legacyPage['menuType'] = 'boards';
            $legacyPage['boards'] = $this->activeBoards();
        }

        return $legacyPage;
    }

    /**
     * @param  array{id?: int, name?: string, slug?: string, parentId?: int, order?: int, isActive?: bool}  $page
     * @return array{id: int|null, name: string|null, title: string|null, subtitle: null, content: null, gallery: array<int, string>, documents: array<int, array<string, string>>, slug: string|null, url: string|null, parentId: int, order: int, isActive: bool}
     */
    private function staticPageToLegacy(array $page): array
    {
        $slug = isset($page['slug']) ? (string) $page['slug'] : null;
        $title = isset($page['name']) ? (string) $page['name'] : null;

        $legacyPage = [
            'id' => $page['id'] ?? null,
            'name' => $title,
            'title' => $title,
            'subtitle' => null,
            'content' => null,
            'gallery' => [],
            'documents' => [],
            'slug' => $slug,
            'url' => $slug !== null ? '/'.ltrim($slug, '/') : null,
            'parentId' => $page['parentId'] ?? 0,
            'order' => $page['order'] ?? 0,
            'isActive' => $page['isActive'] ?? true,
        ];

        if ($slug === 'kurullar') {
            $legacyPage['url'] = null;
            $legacyPage['menuType'] = 'boards';
            $legacyPage['boards'] = $this->activeBoards();
        }

        return $legacyPage;
    }

    /**
     * @return array<int, array{id: int, name: string, icon: string|null, members: array<int, array<string, mixed>>, order: int, isActive: bool}>
     */
    private function activeBoards(): array
    {
        return Board::query()
            ->active()
            ->orderBy('order')
            ->orderBy('id')
            ->get()
            ->map(fn (Board $row): array => $this->boardToLegacy($row))
            ->values()
            ->all();
    }

    /**
     * @return array{id: int, name: string, icon: string|null, members: array<int, array<string, mixed>>, order: int, isActive: bool}
     */
    private function boardToLegacy(Board $row): array
    {
        $members = collect($this->normalizeArray($row->members))
            ->filter(fn (mixed $member): bool => is_array($member))
            ->sortBy(fn (array $member): int => (int) ($member['order'] ?? 0))
            ->values()
            ->all();

        return [
            'id' => $row->id,
            'name' => $row->name,
            'icon' => $row->icon,
            'members' => $members,
            'order' => $row->order,
            'isActive' => $row->is_active,
        ];
    }

    private function announcementToLegacy(Announcement $announcement): array
    {
        $gallery = collect($this->normalizeArray($announcement->gallery))
            ->map(fn (mixed $path): ?string => is_string($path) ? $this->assetUrl($path) : null)
            ->filter(fn (?string $path): bool => is_string($path) && $path !== '')
            ->values()
            ->all();

        $documents = collect($this->normalizeArray($announcement->documents))
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
            'id' => $announcement->id,
            'title' => $announcement->title,
            'slug' => $announcement->slug,
            'url' => '/duyurular/'.$announcement->slug,
            'subtitle' => $announcement->subtitle,
            'content' => $this->renderRichContent($announcement->content),
            'gallery' => $gallery,
            'documents' => $documents,
            'publishedAt' => $announcement->published_at?->toIso8601String(),
            'isActive' => $announcement->is_active,
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

    private function renderRichContent(mixed $content): ?string
    {
        if (blank($content)) {
            return null;
        }

        if (! is_string($content) && ! is_array($content)) {
            return null;
        }

        $html = RichContentRenderer::make($content)
            ->plugins([
                EmbedPlugin::make(),
                EmojiPlugin::make(),
                IdPlugin::make(),
                LinkPlugin::make(),
            ])
            ->toHtml();

        if (! is_array($content)) {
            return $html;
        }

        return $this->applyRichContentTableColumnWidths($html, $content);
    }

    private function applyRichContentTableColumnWidths(string $html, array $content): string
    {
        $tableWidths = $this->extractRichContentTableWidths($content);

        if ($tableWidths === []) {
            return $html;
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previousErrors = libxml_use_internal_errors(true);
        $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="rich-content-root">'.$html.'</div>',
            LIBXML_HTML_NODEFDTD | LIBXML_HTML_NOIMPLIED,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrors);

        $xpath = new DOMXPath($document);
        $tables = $xpath->query('//*[@id="rich-content-root"]//table');

        if ($tables === false) {
            return $html;
        }

        foreach ($tables as $tableIndex => $table) {
            if (! $table instanceof DOMElement || ! isset($tableWidths[$tableIndex])) {
                continue;
            }

            $this->applyWidthsToTableElement($xpath, $table, $tableWidths[$tableIndex]);
        }

        $root = $document->getElementById('rich-content-root');

        if (! $root instanceof DOMElement) {
            return $html;
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode);
        }

        return $output;
    }

    /**
     * @return array<int, array<int, int>>
     */
    private function extractRichContentTableWidths(array $node): array
    {
        $tables = [];

        $this->collectRichContentTableWidths($node, $tables);

        return $tables;
    }

    /**
     * @param  array<int, array<int, int>>  $tables
     */
    private function collectRichContentTableWidths(array $node, array &$tables): void
    {
        if (($node['type'] ?? null) === 'table') {
            $tables[] = $this->extractTableWidths($node);

            return;
        }

        foreach ($node['content'] ?? [] as $childNode) {
            if (is_array($childNode)) {
                $this->collectRichContentTableWidths($childNode, $tables);
            }
        }
    }

    /**
     * @return array<int, int>
     */
    private function extractTableWidths(array $tableNode): array
    {
        $widths = [];

        foreach ($tableNode['content'] ?? [] as $rowNode) {
            if (! is_array($rowNode) || ($rowNode['type'] ?? null) !== 'tableRow') {
                continue;
            }

            $columnIndex = 0;

            foreach ($rowNode['content'] ?? [] as $cellNode) {
                if (! is_array($cellNode)) {
                    continue;
                }

                $attrs = is_array($cellNode['attrs'] ?? null) ? $cellNode['attrs'] : [];
                $colspan = max(1, (int) ($attrs['colspan'] ?? 1));
                $colwidth = is_array($attrs['colwidth'] ?? null) ? $attrs['colwidth'] : [];

                for ($index = 0; $index < $colspan; $index++) {
                    $width = (int) ($colwidth[$index] ?? 0);

                    if ($width > 0) {
                        $widths[$columnIndex + $index] = $width;
                    }
                }

                $columnIndex += $colspan;
            }
        }

        ksort($widths);

        return $widths;
    }

    /**
     * @param  array<int, int>  $widths
     */
    private function applyWidthsToTableElement(DOMXPath $xpath, DOMElement $table, array $widths): void
    {
        if ($widths === []) {
            return;
        }

        $rows = $xpath->query('.//tr', $table);

        if ($rows === false) {
            return;
        }

        foreach ($rows as $row) {
            if (! $row instanceof DOMElement) {
                continue;
            }

            $cells = $xpath->query('./th|./td', $row);

            if ($cells === false) {
                continue;
            }

            $columnIndex = 0;

            foreach ($cells as $cell) {
                if (! $cell instanceof DOMElement) {
                    continue;
                }

                $colspan = max(1, (int) ($cell->getAttribute('colspan') ?: 1));
                $cellWidth = $this->sumTableColumnWidths($widths, $columnIndex, $colspan);

                if ($cellWidth > 0) {
                    $this->mergeStyleAttribute($cell, [
                        'width' => $cellWidth.'px',
                        'min-width' => $cellWidth.'px',
                    ]);
                }

                $columnIndex += $colspan;
            }
        }
    }

    /**
     * @param  array<int, int>  $widths
     */
    private function sumTableColumnWidths(array $widths, int $columnIndex, int $colspan): int
    {
        $width = 0;

        for ($index = 0; $index < $colspan; $index++) {
            $width += $widths[$columnIndex + $index] ?? 0;
        }

        return $width;
    }

    /**
     * @param  array<string, string>  $styles
     */
    private function mergeStyleAttribute(DOMElement $element, array $styles): void
    {
        $existingStyles = collect(explode(';', $element->getAttribute('style')))
            ->mapWithKeys(function (string $style): array {
                [$property, $value] = array_pad(explode(':', $style, 2), 2, null);

                if ($property === null || $value === null || trim($property) === '') {
                    return [];
                }

                return [trim($property) => trim($value)];
            })
            ->all();

        $mergedStyles = array_merge($existingStyles, $styles);

        $style = collect($mergedStyles)
            ->map(fn (string $value, string $property): string => $property.': '.$value)
            ->implode('; ');

        $element->setAttribute('style', $style);
    }
}
