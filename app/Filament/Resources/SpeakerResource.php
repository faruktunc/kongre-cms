<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages\CreateSpeaker;
use App\Filament\Resources\SpeakerResource\Pages\EditSpeaker;
use App\Filament\Resources\SpeakerResource\Pages\ListSpeakers;
use App\Models\Speaker;
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

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Speaker Information')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('title'),
                    TextInput::make('company'),
                    FileUpload::make('photo')
                        ->disk('public')
                        ->directory('speakers')
                        ->visibility('public')
                        ->image(),
                    Textarea::make('bio')->columnSpanFull(),
                    Repeater::make('expertise')
                        ->label('Expertise Items')
                        ->simple(TextInput::make('value')->required())
                        ->default([])
                        ->columnSpanFull(),
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
            ImageColumn::make('photo')->disk('public')->circular(),
            TextColumn::make('name')->searchable(),
            TextColumn::make('title'),
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
            'index' => ListSpeakers::route('/'),
            'create' => CreateSpeaker::route('/create'),
            'edit' => EditSpeaker::route('/{record}/edit'),
        ];
    }
}
