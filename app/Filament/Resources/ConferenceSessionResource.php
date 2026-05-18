<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConferenceSessionResource\Pages\CreateConferenceSession;
use App\Filament\Resources\ConferenceSessionResource\Pages\EditConferenceSession;
use App\Filament\Resources\ConferenceSessionResource\Pages\ListConferenceSessions;
use App\Models\Event;
use App\Models\Session;
use App\Models\Speaker;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ConferenceSessionResource extends Resource
{
    protected static ?string $model = Session::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    protected static string|\UnitEnum|null $navigationGroup = 'Konferans Bilgileri';

    protected static ?string $navigationLabel = 'Konferans Oturumları';

    protected static ?string $modelLabel = 'Konferans Oturumu';

    protected static ?string $pluralModelLabel = 'Konferans Oturumları';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Oturum Bilgileri')
                ->schema([
                    Select::make('event_id')
                        ->label('Etkinlik')
                        ->options(
                            Event::query()
                                ->orderBy('order')
                                ->pluck('title', 'id')
                                ->all()
                        )
                        ->required()
                        ->searchable()
                        ->preload(),
                    TextInput::make('title')
                        ->label('Oturum Başlığı')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
                    Textarea::make('description')
                        ->label('Açıklama')
                        ->rows(5)
                        ->columnSpanFull(),
                    DatePicker::make('date')
                        ->label('Tarih')
                        ->native(false)
                        ->displayFormat('Y-m-d')
                        ->required(),
                    TimePicker::make('start_time')
                        ->label('Başlangıç Saati')
                        ->seconds(false),
                    TimePicker::make('end_time')
                        ->label('Bitiş Saati')
                        ->seconds(false),
                    Select::make('speakers')
                        ->label('Konuşmacılar')
                        ->multiple()
                        ->options(
                            Speaker::query()
                                ->active()
                                ->orderBy('order')
                                ->pluck('name', 'id')
                                ->all()
                        )
                        ->searchable()
                        ->preload()
                        ->default([])
                        ->columnSpanFull(),
                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(4)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date')
            ->modifyQueryUsing(fn ($query) => $query->orderBy('date')->orderBy('start_time'))
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('event.title')->label('Etkinlik')->toggleable(),
                TextColumn::make('title')->label('Oturum Başlığı')->searchable(),
                TextColumn::make('date')->label('Tarih')->sortable(),
                TextColumn::make('start_time')->label('Başlangıç Saati'),
                TextColumn::make('end_time')->label('Bitiş Saati'),
                ToggleColumn::make('is_active')->label('Aktif'),
            ])->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConferenceSessions::route('/'),
            'create' => CreateConferenceSession::route('/create'),
            'edit' => EditConferenceSession::route('/{record}/edit'),
        ];
    }
}
