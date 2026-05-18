<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages\CreateSponsor;
use App\Filament\Resources\SponsorResource\Pages\EditSponsor;
use App\Filament\Resources\SponsorResource\Pages\ListSponsors;
use App\Models\Sponsor;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Sponsor Information')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('url')->url(),
                    FileUpload::make('image')
                        ->disk('public')
                        ->directory('sponsors')
                        ->visibility('public')
                        ->image(),
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
            ImageColumn::make('image')->disk('public'),
            TextColumn::make('name')->searchable(),
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
            'index' => ListSponsors::route('/'),
            'create' => CreateSponsor::route('/create'),
            'edit' => EditSponsor::route('/{record}/edit'),
        ];
    }
}
