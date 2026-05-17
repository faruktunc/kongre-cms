<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\ContactItem;
use App\Models\Document;
use App\Models\Event;
use App\Models\Menu;
use App\Models\PageComponent;
use App\Models\Setting;
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

        $this->seedMenus($json['menus']['links'] ?? []);
        Setting::updateOrCreate(['key' => 'menu_socials'], ['value' => $json['menus']['socials'] ?? []]);
        Setting::updateOrCreate(['key' => 'logo'], ['value' => $json['logo'] ?? ['src' => null, 'alt' => null]]);

        $this->seedPageComponents('homeComponent', $json['homeComponent'] ?? []);
        $this->seedPageComponents('speakersComponent', $json['speakersComponent'] ?? []);
        $this->seedPageComponents('contactComponent', $json['contactComponent'] ?? []);
        $this->seedPageComponents('boardsComponent', $json['boardsComponent'] ?? []);
        $this->seedPageComponents('pdfComponent', $json['pdfComponent'] ?? []);
        $this->seedPageComponents('infoPDFComponent', $json['infoPDFComponent'] ?? []);

        $this->seedSpeakers($json['speakers'] ?? []);
        $this->seedSponsors($json['sponsors'] ?? []);
        $this->seedBoards($json['boards'] ?? []);
        $this->seedContacts($json['contact'] ?? []);

        $event = $json['events'] ?? null;
        if (is_array($event)) {
            Event::updateOrCreate(
                ['id' => $event['id'] ?? 1],
                [
                    'title' => $event['title'] ?? null,
                    'date' => $event['date'] ?? null,
                    'location' => $event['location'] ?? null,
                    'description' => $event['description'] ?? null,
                    'payload' => $event,
                    'order' => $event['order'] ?? 0,
                    'is_active' => $event['isActive'] ?? true,
                ]
            );
        }

        $pdf = $json['pdfDocument'] ?? null;
        if (is_array($pdf)) {
            Document::updateOrCreate(
                ['type' => 'pdfDocument'],
                [
                    'title' => $pdf['title'] ?? 'PDF Document',
                    'description' => $pdf['description'] ?? null,
                    'file_path' => $pdf['url'] ?? ($pdf['file_path'] ?? null),
                    'payload' => $pdf,
                    'order' => 0,
                    'is_active' => true,
                ]
            );
        }

        Setting::updateOrCreate(['key' => 'infoPdf'], ['value' => $json['infoPdf'] ?? []]);
        Setting::updateOrCreate(['key' => 'conferenceInfo'], ['value' => $json['conferenceInfo'] ?? []]);
    }

    private function seedMenus(array $links): void
    {
        foreach ($links as $item) {
            if (! is_array($item)) {
                continue;
            }

            Menu::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'title' => $item['name'] ?? 'Untitled',
                    'slug' => $item['slug'] ?? null,
                    'url' => $item['url'] ?? null,
                    'parent_id' => ($item['parentId'] ?? 0) > 0 ? $item['parentId'] : null,
                    'order' => $item['order'] ?? 0,
                    'is_active' => $item['isActive'] ?? true,
                    'payload' => $item,
                ]
            );
        }
    }

    private function seedPageComponents(string $key, array $items): void
    {
        foreach ($items as $item) {
            if (! is_array($item)) {
                continue;
            }

            PageComponent::updateOrCreate(
                [
                    'component_key' => $key,
                    'order' => $item['order'] ?? 0,
                ],
                [
                    'title' => $item['component'] ?? null,
                    'payload' => $item,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
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
                    'photo' => $item['photo'] ?? null,
                    'bio' => $item['bio'] ?? null,
                    'expertise' => $item['expertise'] ?? [],
                    'payload' => $item,
                    'order' => $item['order'] ?? ($index + 1) * 10,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
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
                    'payload' => $item,
                    'order' => $item['order'] ?? ($index + 1) * 10,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }

    private function seedContacts(array $items): void
    {
        foreach ($items as $index => $item) {
            if (! is_array($item)) {
                continue;
            }

            ContactItem::updateOrCreate(
                [
                    'label' => $item['title'] ?? null,
                    'order' => $item['order'] ?? ($index + 1) * 10,
                ],
                [
                    'type' => $item['icon'] ?? null,
                    'value' => $item['value'] ?? null,
                    'payload' => $item,
                    'is_active' => $item['isActive'] ?? true,
                ]
            );
        }
    }
}
