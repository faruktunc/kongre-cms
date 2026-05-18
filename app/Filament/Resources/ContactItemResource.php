<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactItemResource\Pages\CreateContactItem;
use App\Filament\Resources\ContactItemResource\Pages\EditContactItem;
use App\Filament\Resources\ContactItemResource\Pages\ListContactItems;
use App\Models\ContactItem;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ContactItemResource extends Resource
{
    protected static ?string $model = ContactItem::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Contact Item')
                ->schema([
                    Select::make('type')
                        ->options([
                            'phone' => 'Phone',
                            'email' => 'Email',
                            'address' => 'Address',
                            'social' => 'Social',
                            'map' => 'Map',
                            'text' => 'Text',
                        ])
                        ->native(false)
                        ->required(),
                    TextInput::make('label'),
                    Textarea::make('value'),
                    TextInput::make('payload.link')->label('URL')->url(),
                    TextInput::make('payload.icon')->label('Icon'),
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
            TextColumn::make('type'),
            TextColumn::make('label')->searchable(),
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
            'index' => ListContactItems::route('/'),
            'create' => CreateContactItem::route('/create'),
            'edit' => EditContactItem::route('/{record}/edit'),
        ];
    }
}
