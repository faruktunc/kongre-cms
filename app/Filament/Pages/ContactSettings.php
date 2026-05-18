<?php

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'İletişim Ayarları';

    protected static string|\UnitEnum|null $navigationGroup = 'İletişim';

    protected static ?int $navigationSort = 4;

    protected string $view = 'filament.pages.contact-settings';

    public ?array $data = [];

    public function getTitle(): string
    {
        return 'İletişim Ayarları';
    }

    public function mount(): void
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $contact = is_array($payload['contact'] ?? null) ? $payload['contact'] : $this->defaultContactConfig();

        $this->form->fill([
            'phone_value' => $contact['phone']['value'] ?? null,
            'phone_is_active' => $contact['phone']['is_active'] ?? true,
            'email_value' => $contact['email']['value'] ?? null,
            'email_is_active' => $contact['email']['is_active'] ?? true,
            'address_value' => $contact['address']['value'] ?? null,
            'address_is_active' => $contact['address']['is_active'] ?? true,
            'hours_value' => $contact['hours']['value'] ?? null,
            'hours_is_active' => $contact['hours']['is_active'] ?? true,
            'academic_is_active' => $contact['academic']['is_active'] ?? true,
            'academic_members' => is_array($contact['academic']['members'] ?? null)
                ? $contact['academic']['members']
                : [],
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Temel İletişim')
                    ->schema([
                        TextInput::make('phone_value')->label('Telefon'),
                        Toggle::make('phone_is_active')->label('Telefon Aktif')->default(true),
                        TextInput::make('email_value')->label('E-posta')->email(),
                        Toggle::make('email_is_active')->label('E-posta Aktif')->default(true),
                    ])
                    ->columns(2),

                Section::make('Adres ve Saat')
                    ->schema([
                        TextInput::make('address_value')->label('Adres')->columnSpanFull(),
                        Toggle::make('address_is_active')->label('Adres Aktif')->default(true),
                        TextInput::make('hours_value')->label('Çalışma Saatleri')->columnSpanFull(),
                        Toggle::make('hours_is_active')->label('Çalışma Saatleri Aktif')->default(true),
                    ])
                    ->columns(2),

                Section::make('Akademik İletişim')
                    ->description('Ad Soyad ve e-posta listesi. Her satir aktif/pasif olabilir.')
                    ->schema([
                        Toggle::make('academic_is_active')->label('Akademik İletişim Aktif')->default(true),
                        Repeater::make('academic_members')
                            ->label('Akademik İletişim Listesi')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Ad Soyad')
                                    ->required(),
                                TextInput::make('email')
                                    ->label('E-posta')
                                    ->email()
                                    ->required(),
                                Toggle::make('isActive')
                                    ->label('Aktif')
                                    ->default(true),
                            ])
                            ->columns(2)
                            ->default([])
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
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
        $payload['contact'] = [
            'phone' => [
                'value' => $state['phone_value'] ?? null,
                'is_active' => $state['phone_is_active'] ?? true,
            ],
            'email' => [
                'value' => $state['email_value'] ?? null,
                'is_active' => $state['email_is_active'] ?? true,
            ],
            'address' => [
                'value' => $state['address_value'] ?? null,
                'is_active' => $state['address_is_active'] ?? true,
            ],
            'hours' => [
                'value' => $state['hours_value'] ?? null,
                'is_active' => $state['hours_is_active'] ?? true,
            ],
            'academic' => [
                'is_active' => $state['academic_is_active'] ?? true,
                'members' => $this->normalizeAcademicMembers($state['academic_members'] ?? []),
            ],
        ];

        $event->payload = $payload;
        $event->save();

        Notification::make()
            ->title('İletişim ayarları kaydedildi.')
            ->success()
            ->send();
    }

    private function normalizeAcademicMembers(mixed $members): array
    {
        if (! is_array($members)) {
            return [];
        }

        return collect($members)
            ->filter(fn (mixed $item): bool => is_array($item))
            ->map(function (array $item): array {
                return [
                    'name' => $item['name'] ?? null,
                    'email' => $item['email'] ?? null,
                    'isActive' => $item['isActive'] ?? true,
                ];
            })
            ->values()
            ->all();
    }

    private function defaultContactConfig(): array
    {
        return [
            'phone' => ['value' => null, 'is_active' => true],
            'email' => ['value' => null, 'is_active' => true],
            'address' => ['value' => null, 'is_active' => true],
            'hours' => ['value' => null, 'is_active' => true],
            'academic' => ['is_active' => true, 'members' => []],
        ];
    }
}
