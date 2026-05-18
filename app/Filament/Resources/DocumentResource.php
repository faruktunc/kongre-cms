<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages\CreateDocument;
use App\Filament\Resources\DocumentResource\Pages\EditDocument;
use App\Filament\Resources\DocumentResource\Pages\ListDocuments;
use App\Models\Document;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
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

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Document')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),
                    Select::make('type')
                        ->options([
                            'document' => 'Document',
                        ])
                        ->native(false)
                        ->required(),
                    FileUpload::make('file_path')
                        ->label('File')
                        ->disk('public')
                        ->directory('documents')
                        ->visibility('public')
                        ->acceptedFileTypes(['application/pdf']),
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
            TextColumn::make('title')->searchable(),
            TextColumn::make('type'),
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
            'index' => ListDocuments::route('/'),
            'create' => CreateDocument::route('/create'),
            'edit' => EditDocument::route('/{record}/edit'),
        ];
    }
}
