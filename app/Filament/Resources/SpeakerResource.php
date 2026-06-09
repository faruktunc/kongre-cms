<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages\CreateSpeaker;
use App\Filament\Resources\SpeakerResource\Pages\EditSpeaker;
use App\Filament\Resources\SpeakerResource\Pages\ListSpeakers;
use App\Models\Speaker;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SpeakerResource extends Resource
{
    protected static ?string $model = Speaker::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';

    protected static string|\UnitEnum|null $navigationGroup = 'Konferans Bilgileri';

    protected static ?string $navigationLabel = 'Konuşmacılar';

    protected static ?string $modelLabel = 'Konuşmacı';

    protected static ?string $pluralModelLabel = 'Konuşmacılar';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Konuşmacı Bilgileri')
                ->schema([
                    TextInput::make('name')
                        ->label('Ad Soyad')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('title')
                        ->label('Ünvan')
                        ->maxLength(255),
                    TextInput::make('company')
                        ->label('Kurum')
                        ->maxLength(255),
                    FileUpload::make('photo')
                        ->label('Fotoğraf')
                        ->disk('public')
                        ->directory('speakers')
                        ->visibility('public')
                        ->image()
                        ->imageEditor()
                        ->columnSpan(1),
                    Textarea::make('bio')
                        ->label('Biyografi')
                        ->rows(6)
                        ->columnSpan(2),
                    Repeater::make('expertise')
                        ->label('Konu')
                        ->simple(TextInput::make('value')->label('Konu')->required())
                        ->default([])
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
            ImageColumn::make('photo')->label('Fotoğraf')->disk('public')->circular(),
            TextColumn::make('name')->label('Ad Soyad')->searchable(),
            TextColumn::make('title')->label('Ünvan'),
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
            'index' => ListSpeakers::route('/'),
            'create' => CreateSpeaker::route('/create'),
            'edit' => EditSpeaker::route('/{record}/edit'),
        ];
    }
}
