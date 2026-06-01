<?php

namespace App\Filament\Resources\HomePopups;

use App\Filament\Resources\HomePopups\Pages\CreateHomePopup;
use App\Filament\Resources\HomePopups\Pages\EditHomePopup;
use App\Filament\Resources\HomePopups\Pages\HomePopupTree;
use App\Models\HomePopup;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomePopupResource extends Resource
{
    protected static ?string $model = HomePopup::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static string|\UnitEnum|null $navigationGroup = 'Ana Sayfa Ayarları';

    protected static ?string $navigationLabel = 'Ana Sayfa Pop-up';

    protected static ?string $modelLabel = 'Pop-up';

    protected static ?string $pluralModelLabel = 'Pop-up Mesajları';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Pop-up İçeriği')
                ->schema([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->maxLength(255),
                    RichEditor::make('message')
                        ->label('Mesaj')
                        ->columnSpanFull(),
                    FileUpload::make('banner_image')
                        ->label('Afiş')
                        ->disk('public')
                        ->directory('home-popups')
                        ->visibility('public')
                        ->image()
                        ->imageEditor()
                        ->columnSpanFull(),
                    Grid::make(2)->schema([
                        TextInput::make('button_label')
                            ->label('Buton Yazısı')
                            ->maxLength(255),
                        TextInput::make('button_url')
                            ->label('Buton Bağlantısı')
                            ->url()
                            ->maxLength(255),
                    ]),
                ])
                ->columnSpanFull(),
            Section::make('Yayın Ayarları')
                ->schema([
                    TextInput::make('order')
                        ->label('Sıra')
                        ->numeric()
                        ->default(0),
                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('banner_image')
                    ->label('Afiş')
                    ->disk('public')
                    ->visibility('public'),
                TextColumn::make('title')
                    ->label('Başlık')
                    ->placeholder('Başlıksız pop-up')
                    ->searchable()
                    ->grow(),
                TextColumn::make('order')->label('Sıra')->sortable(),
                ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => HomePopupTree::route('/'),
            'create' => CreateHomePopup::route('/create'),
            'edit' => EditHomePopup::route('/{record}/edit'),
        ];
    }
}
