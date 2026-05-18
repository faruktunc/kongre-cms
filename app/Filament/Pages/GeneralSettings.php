<?php

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'Genel Ayarlar';

    protected static string|\UnitEnum|null $navigationGroup = 'Site Ayarları';

    protected static ?int $navigationSort = 0;

    protected string $view = 'filament.pages.general-settings';

    public ?array $data = [];

    public function getTitle(): string
    {
        return 'Genel Ayarlar';
    }

    public function mount(): void
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $general = is_array($payload['general'] ?? null) ? $payload['general'] : [];

        $this->form->fill([
            'logo_src' => $general['logo']['src'] ?? null,
            'logo_alt' => $general['logo']['alt'] ?? null,
            'socials' => is_array($general['socials'] ?? null) ? $general['socials'] : [],
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Logo')
                    ->schema([
                        FileUpload::make('logo_src')
                            ->label('Site Logo')
                            ->disk('public')
                            ->directory('logos')
                            ->visibility('public')
                            ->image()
                            ->columnSpanFull(),
                        TextInput::make('logo_alt')
                            ->label('Logo Alt Metni')
                            ->columnSpanFull(),
                    ]),
                Section::make('Alt Bilgi Sosyal Medya')
                    ->schema([
                        Repeater::make('socials')
                            ->label('Sosyal Medya Hesapları')
                            ->schema([
                                Select::make('platform')
                                    ->label('Platform')
                                    ->options([
                                        'instagram' => 'Instagram',
                                        'x' => 'X',
                                        'linkedin' => 'LinkedIn',
                                        'facebook' => 'Facebook',
                                        'youtube' => 'YouTube',
                                        'github' => 'GitHub',
                                    ])
                                    ->required(),
                                TextInput::make('url')
                                    ->label('Bağlantı Adresi')
                                    ->url()
                                    ->required(),
                                TextInput::make('order')
                                    ->label('Sıra')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('isActive')
                                    ->label('Aktif')
                                    ->default(true),
                            ])
                            ->columns(2)
                            ->default([])
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Kaydet')
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

        $payload['general'] = [
            'logo' => [
                'src' => $state['logo_src'] ?? null,
                'alt' => $state['logo_alt'] ?? 'Logo',
            ],
            'socials' => array_values(array_map(
                function (array $social, int $index): array {
                    return [
                        'id' => $social['id'] ?? ($index + 1),
                        'platform' => $social['platform'] ?? null,
                        'url' => $social['url'] ?? null,
                        'order' => $social['order'] ?? 0,
                        'isActive' => $social['isActive'] ?? true,
                    ];
                },
                is_array($state['socials'] ?? null) ? $state['socials'] : [],
                array_keys(is_array($state['socials'] ?? null) ? $state['socials'] : [])
            )),
        ];

        $event->payload = $payload;
        $event->save();

        Notification::make()
            ->title('Genel ayarlar kaydedildi.')
            ->success()
            ->send();
    }
}
