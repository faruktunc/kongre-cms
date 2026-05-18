<?php

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class SliderSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Slider Settings';

    protected static ?int $navigationSort = 3;

    protected string $view = 'filament.pages.slider-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $normalizedImages = $this->normalizeSliderImagePaths($payload['images'] ?? []);

        if ($event) {
            $payload['images'] = $normalizedImages;
            $event->payload = $payload;
            $event->save();
        }

        $this->form->fill([
            'event_images' => $normalizedImages,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Slider Images')
                    ->description('SliderSection için çoklu görsel yükleme alanı.')
                    ->schema([
                        FileUpload::make('event_images')
                            ->label('Slider Görselleri')
                            ->disk('public')
                            ->directory('slider')
                            ->visibility('public')
                            ->image()
                            ->multiple()
                            ->panelLayout('grid')
                            ->reorderable()
                            ->appendFiles()
                            ->minFiles(1)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->action(fn (): mixed => $this->save()),
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $event = Event::query()->active()->orderBy('order')->first();
        $event ??= Event::query()->create([
            'title' => null,
            'date' => null,
            'location' => null,
            'description' => null,
            'payload' => [],
            'order' => 10,
            'is_active' => true,
        ]);

        $payload = is_array($event->payload) ? $event->payload : [];
        $payload['images'] = is_array($state['event_images'] ?? null) ? $state['event_images'] : [];

        $event->payload = $payload;
        $event->save();

        Notification::make()
            ->title('Slider ayarları kaydedildi.')
            ->success()
            ->send();
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
}
