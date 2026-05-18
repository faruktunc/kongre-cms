<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages\CreateSponsor;
use App\Filament\Resources\SponsorResource\Pages\EditSponsor;
use App\Filament\Resources\SponsorResource\Pages\ListSponsors;
use App\Models\Sponsor;
use BackedEnum;
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

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static string|\UnitEnum|null $navigationGroup = 'Konferans Bilgileri';

    protected static ?string $navigationLabel = 'Sponsorlar';

    protected static ?string $modelLabel = 'Sponsor';

    protected static ?string $pluralModelLabel = 'Sponsorlar';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Sponsor Bilgileri')
                ->schema([
                    TextInput::make('name')
                        ->label('Sponsor Adı')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('url')
                        ->label('Web Sitesi')
                        ->url()
                        ->prefix('https://'),
                    FileUpload::make('image')
                        ->label('Logo')
                        ->disk('public')
                        ->directory('sponsors')
                        ->visibility('public')
                        ->image()
                        ->imageEditor()
                        ->columnSpan(1),
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
            ImageColumn::make('image')->label('Logo')->disk('public'),
            TextColumn::make('name')->label('Sponsor Adı')->searchable(),
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
            'index' => ListSponsors::route('/'),
            'create' => CreateSponsor::route('/create'),
            'edit' => EditSponsor::route('/{record}/edit'),
        ];
    }
}
