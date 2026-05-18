<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages\CreateMenu;
use App\Filament\Resources\MenuResource\Pages\EditMenu;
use App\Filament\Resources\MenuResource\Pages\ListMenus;
use App\Models\Menu;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Menu Item')
                ->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('slug'),
                    TextInput::make('url'),
                    Select::make('parent_id')
                        ->label('Parent Menu')
                        ->relationship('parent', 'title')
                        ->searchable()
                        ->preload()
                        ->native(false),
                    TextInput::make('order')->numeric()->default(0),
                    Toggle::make('is_active')->default(true),
                    Toggle::make('payload.show')
                        ->label('Show')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('order')->sortable(),
                ToggleColumn::make('is_active'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMenus::route('/'),
            'create' => CreateMenu::route('/create'),
            'edit' => EditMenu::route('/{record}/edit'),
        ];
    }
}
