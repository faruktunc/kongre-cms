<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages\CreateBoard;
use App\Filament\Resources\BoardResource\Pages\EditBoard;
use App\Filament\Resources\BoardResource\Pages\ListBoards;
use App\Models\Board;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BoardResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|\UnitEnum|null $navigationGroup = 'Konferans Bilgileri';

    protected static ?string $navigationLabel = 'Kurullar';

    protected static ?string $modelLabel = 'Kurul';

    protected static ?string $pluralModelLabel = 'Kurullar';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Kurul Bilgileri')
                ->schema([
                    TextInput::make('name')
                        ->label('Kurul Adı')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
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
                        ->columnSpan(1),
                    Repeater::make('members')
                        ->schema([
                            TextInput::make('name')
                                ->label('Ad Soyad')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('title')
                                ->label('Ünvan')
                                ->maxLength(255),
                            TextInput::make('institution')
                                ->label('Kurum')
                                ->maxLength(255),
                            TextInput::make('order')
                                ->label('Sıra')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(4)
                        ->collapsible()
                        ->columnSpanFull(),
                    TextInput::make('order')
                        ->label('Sıra')
                        ->numeric()
                        ->default(0),
                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->label('Kurul Adı')->searchable(),
            TextColumn::make('order')->label('Sıra')->sortable(),
            ToggleColumn::make('is_active')->label('Aktif'),
        ])->recordActions([
            EditAction::make(),
            DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBoards::route('/'),
            'create' => CreateBoard::route('/create'),
            'edit' => EditBoard::route('/{record}/edit'),
        ];
    }
}
