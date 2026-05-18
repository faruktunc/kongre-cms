<?php

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ConferenceSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Konferans Ayarları';

    protected static string|\UnitEnum|null $navigationGroup = 'Ana Sayfa Ayarları';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.conference-settings';

    public ?array $data = [];

    public function getTitle(): string
    {
        return 'Konferans Ayarları';
    }

    public function mount(): void
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];

        $this->form->fill([
            'event_title' => $event?->title ?? ($payload['title'] ?? null),
            'event_description' => $event?->description ?? ($payload['description'] ?? null),
            'event_date' => $event?->date ?? ($payload['date'] ?? null),
            'event_end_date' => $payload['end_date'] ?? null,
            'event_location' => $event?->location ?? ($payload['location'] ?? null),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Etkinlik Bilgileri')
                    ->description('SliderSection\'da görünen kongre adı, tarihler ve lokasyon.')
                    ->schema([
                        TextInput::make('event_title')
                            ->label('Kongre Adı')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('event_description')
                            ->label('Kısa Açıklama')
                            ->rows(2)
                            ->columnSpanFull(),
                        DatePicker::make('event_date')->label('Başlangıç Tarihi'),
                        DatePicker::make('event_end_date')->label('Bitiş Tarihi'),
                        TextInput::make('event_location')->label('Konum')->columnSpanFull(),
                    ])
                    ->columns(2),
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

        $event->payload = array_merge($payload, [
            'title' => $state['event_title'] ?? null,
            'description' => $state['event_description'] ?? null,
            'date' => $state['event_date'] ?? null,
            'end_date' => $state['event_end_date'] ?? null,
            'location' => $state['event_location'] ?? null,
        ]);
        $event->title = $state['event_title'] ?? null;
        $event->description = $state['event_description'] ?? null;
        $event->date = $state['event_date'] ?? null;
        $event->location = $state['event_location'] ?? null;
        $event->save();

        Notification::make()
            ->title('Ayarlar kaydedildi.')
            ->success()
            ->send();
    }
}
