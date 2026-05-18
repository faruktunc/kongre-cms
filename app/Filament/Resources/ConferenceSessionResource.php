<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConferenceSessionResource\Pages\CreateConferenceSession;
use App\Filament\Resources\ConferenceSessionResource\Pages\EditConferenceSession;
use App\Filament\Resources\ConferenceSessionResource\Pages\ListConferenceSessions;
use App\Models\Event;
use App\Models\Session;
use App\Models\Speaker;
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

    protected static ?string $navigationLabel = 'Conference Sessions';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Session Information')
                ->schema([
                    Select::make('event_id')
                        ->label('Event')
                        ->options(
                            Event::query()
                                ->orderBy('order')
                                ->pluck('title', 'id')
                                ->all()
                        )
                        ->searchable()
                        ->preload(),
                    TextInput::make('title')->required(),
                    Textarea::make('description')->columnSpanFull(),
                    DatePicker::make('date')
                        ->native(false)
                        ->displayFormat('Y-m-d'),
                    TimePicker::make('start_time')
                        ->seconds(false),
                    TimePicker::make('end_time')
                        ->seconds(false),
                    Select::make('speakers')
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
                        ->default([]),
                    TextInput::make('order')->numeric()->default(0),
                    Toggle::make('is_active')->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('event.title')->label('Event')->toggleable(),
            TextColumn::make('title')->searchable(),
            TextColumn::make('date')->sortable(),
            TextColumn::make('start_time'),
            TextColumn::make('end_time'),
            TextColumn::make('order')->sortable(),
            ToggleColumn::make('is_active'),
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
