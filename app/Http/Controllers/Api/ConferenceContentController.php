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
        return response()->json($this->setting('logo', ['src' => null, 'alt' => null]));
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
        return response()->json($rows->map(fn (Speaker $row) => $row->payload ?? [
            'id' => $row->id,
            'name' => $row->name,
            'title' => $row->title,
            'company' => $row->company,
            'photo' => $row->photo,
            'bio' => $row->bio,
            'expertise' => $row->expertise ?? [],
            'isActive' => $row->is_active,
        ])->values()->all());
    }

    public function sponsors(): JsonResponse
    {
        $rows = Sponsor::query()->active()->orderBy('order')->get();
        return response()->json($rows->map(fn (Sponsor $row) => $row->payload ?? [
            'id' => $row->id,
            'name' => $row->name,
            'imgsrc' => $row->image,
            'url' => $row->url,
            'order' => $row->order,
            'isActive' => $row->is_active,
            'show' => true,
        ])->values()->all());
    }

    public function contact(): JsonResponse
    {
        $rows = ContactItem::query()->active()->orderBy('order')->get();
        return response()->json($rows->map(fn (ContactItem $row) => $row->payload ?? [
            'icon' => $row->type,
            'title' => $row->label,
            'value' => $row->value,
            'link' => null,
        ])->values()->all());
    }

    public function boards(): JsonResponse
    {
        $rows = Board::query()->active()->orderBy('order')->get();
        return response()->json($rows->map(fn (Board $row) => $row->payload ?? [
            'id' => $row->id,
            'name' => $row->name,
            'members' => $row->members ?? [],
            'isActive' => $row->is_active,
        ])->values()->all());
    }

    public function pdfDocument(): JsonResponse
    {
        $doc = Document::query()->active()->where('type', 'pdfDocument')->orderBy('order')->first();
        return response()->json($doc?->payload ?? []);
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
