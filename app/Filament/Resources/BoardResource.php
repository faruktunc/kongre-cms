<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages\CreateBoard;
use App\Filament\Resources\BoardResource\Pages\EditBoard;
use App\Filament\Resources\BoardResource\Pages\ListBoards;
use App\Models\Board;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
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

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Board Information')
                ->schema([
                    TextInput::make('name')->required(),
                    Repeater::make('members')
                        ->schema([
                            TextInput::make('name')->required(),
                            TextInput::make('title'),
                            TextInput::make('institution'),
                            TextInput::make('order')->numeric(),
                        ])
                        ->columns(2)
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
            'index' => ListBoards::route('/'),
            'create' => CreateBoard::route('/create'),
            'edit' => EditBoard::route('/{record}/edit'),
        ];
    }
}
