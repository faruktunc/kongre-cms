<?php

namespace App\Filament\Pages;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ConferenceAboutSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Konferans Hakkında';

    protected static string|\UnitEnum|null $navigationGroup = 'Ana Sayfa Ayarları';

    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.conference-about-settings';

    public ?array $data = [];

    public function getTitle(): string
    {
        return 'Konferans Hakkında';
    }

    public function mount(): void
    {
        $event = Event::query()->active()->orderBy('order')->first();
        $payload = is_array($event?->payload) ? $event->payload : [];
        $conferenceInfo = is_array($payload['conference_info'] ?? null) ? $payload['conference_info'] : [];

        $this->form->fill([
            'info_title' => $conferenceInfo['title'] ?? null,
            'info_subtitle' => $conferenceInfo['subtitle'] ?? null,
            'info_overview' => $conferenceInfo['overview'] ?? null,
            'highlights' => is_array($conferenceInfo['highlights'] ?? null) ? $conferenceInfo['highlights'] : [],
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Konferans Hakkında')
                    ->description('"Bu Konferansa Neden Katılmalısınız" bölümünün içeriği.')
                    ->schema([
                        TextInput::make('info_title')
                            ->label('Bölüm Başlığı')
                            ->columnSpanFull(),
                        TextInput::make('info_subtitle')
                            ->label('Alt Başlık')
                            ->columnSpanFull(),
                        Textarea::make('info_overview')
                            ->label('Genel Açıklama')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
                Section::make('Öne Çıkan Kartlar')
                    ->description('Her kartın ikonu, rengi, başlığı ve açıklamasını belirleyin.')
                    ->schema([
                        Repeater::make('highlights')
                            ->label('Öne Çıkan Kartlar')
                            ->schema([
                                Select::make('icon')
                                    ->label('İkon')
                                    ->options([
                                        'Users' => '👥 Kullanıcılar',
                                        'Star' => '⭐ Yıldız',
                                        'BookOpen' => '📖 Kitap',
                                        'Award' => '🏆 Ödül',
                                        'Lightbulb' => '💡 Fikir / İnovasyon',
                                        'Globe' => '🌍 Dünya / Uluslararası',
                                        'Briefcase' => '💼 Profesyonel',
                                        'Mic' => '🎤 Mikrofon / Sunum',
                                        'GraduationCap' => '🎓 Eğitim',
                                        'Handshake' => '🤝 İşbirliği',
                                        'Zap' => '⚡ Enerji / Hız',
                                        'Heart' => '❤️ Topluluk',
                                        'Target' => '🎯 Hedef',
                                        'Trophy' => '🥇 Başarı',
                                        'FlaskConical' => '🧪 Araştırma',
                                        'Network' => '🕸️ Ağ / Networking',
                                        'BarChart' => '📊 İstatistik',
                                        'Calendar' => '📅 Takvim',
                                        'MessageCircle' => '💬 İletişim',
                                        'Rocket' => '🚀 Kariyer / Büyüme',
                                    ])
                                    ->native(false)
                                    ->required(),
                                ColorPicker::make('color')
                                    ->label('Kart Rengi')
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Başlık')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Açıklama')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->reorderable()
                            ->addActionLabel('Kart Ekle')
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
        $payload['conference_info'] = [
            'title' => $state['info_title'] ?? null,
            'subtitle' => $state['info_subtitle'] ?? null,
            'overview' => $state['info_overview'] ?? null,
            'highlights' => is_array($state['highlights'] ?? null) ? $state['highlights'] : [],
        ];

        $event->payload = $payload;
        $event->save();

        Notification::make()
            ->title('Konferans hakkında ayarları kaydedildi.')
            ->success()
            ->send();
    }
}
