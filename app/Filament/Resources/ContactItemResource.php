<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Concerns\HandlesJsonTextarea;
use App\Filament\Resources\ContactItemResource\Pages\ManageContactItems;
use App\Models\ContactItem;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ContactItemResource extends Resource
{
    use HandlesJsonTextarea;

    protected static ?string $model = ContactItem::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('type'),
            TextInput::make('label'),
            static::jsonTextarea('value', 'Value', false),
            TextInput::make('order')->numeric()->default(0),
            Toggle::make('is_active')->default(true),
            static::jsonTextarea('payload', 'Payload'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('type'),
            TextColumn::make('label')->searchable(),
            TextColumn::make('order')->sortable(),
            ToggleColumn::make('is_active'),
        ])->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageContactItems::route('/')];
    }
}
