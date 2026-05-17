<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Concerns\HandlesJsonTextarea;
use App\Filament\Resources\SettingResource\Pages\ManageSettings;
use App\Models\Setting;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    use HandlesJsonTextarea;

    protected static ?string $model = Setting::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('key')->required(),
            static::jsonTextarea('value', 'Value'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('key')->searchable(),
            TextColumn::make('updated_at')->dateTime(),
        ])->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageSettings::route('/')];
    }
}
