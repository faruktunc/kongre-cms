<?php

namespace App\Filament\Resources\Announcements\Schemas;

use App\Models\Announcement;
use Awcodes\RicherEditor\Plugins\EmbedPlugin;
use Awcodes\RicherEditor\Plugins\EmojiPlugin;
use Awcodes\RicherEditor\Plugins\FullScreenPlugin;
use Awcodes\RicherEditor\Plugins\IdPlugin;
use Awcodes\RicherEditor\Plugins\LinkPlugin;
use Awcodes\RicherEditor\Plugins\SourceCodePlugin;
use Awcodes\RicherEditor\Tools\HeadingFiveTool;
use Awcodes\RicherEditor\Tools\HeadingFourTool;
use Awcodes\RicherEditor\Tools\HeadingSixTool;
use Awcodes\RicherEditor\Tools\ToolGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Duyuru Ayarları')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Duyuru Başlığı')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, Get $get, ?string $state, ?Model $record): void {
                                    if (! $get('slug') && $state) {
                                        $set('slug', Announcement::generateUniqueSlug($state, $record?->id));
                                    }
                                }),
                            TextInput::make('slug')
                                ->label('Kısa Bağlantı (Slug)')
                                ->required()
                                ->unique(
                                    table: 'announcements',
                                    column: 'slug',
                                    ignorable: fn (?Model $record) => $record,
                                )
                                ->helperText('Başlıktan otomatik oluşturulur, düzenlenebilir.'),
                        ]),
                        Grid::make(1)->schema([
                            TextInput::make('subtitle')
                                ->label('Alt Başlık')
                                ->maxLength(255),
                        ]),
                        Grid::make(1)->schema([
                            Toggle::make('is_active')
                                ->label('Aktif')
                                ->default(true),
                        ]),
                    ])
                    ->columnSpanFull(),
                Section::make('Duyuru İçeriği')
                    ->schema([
                        RichEditor::make('content')
                            ->label('İçerik')
                            ->json()
                            ->plugins([
                                EmbedPlugin::make(),
                                EmojiPlugin::make(),
                                FullScreenPlugin::make(),
                                IdPlugin::make(),
                                LinkPlugin::make(),
                                SourceCodePlugin::make(),
                            ])
                            ->tools([
                                ToolGroup::make('headingTools')
                                    ->label('Başlıklar')
                                    ->icon(Heroicon::H1)
                                    ->displayAsLabel()
                                    ->items([
                                        'h1',
                                        'h2',
                                        'h3',
                                        HeadingFourTool::make(),
                                        HeadingFiveTool::make(),
                                        HeadingSixTool::make(),
                                    ]),
                            ])
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['headingTools'],
                                ['alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table', 'attachFiles', 'embed'],
                                ['sourceCode', 'fullscreen'],
                                ['undo', 'redo'],
                            ])
                            ->extraInputAttributes(['style' => 'min-height: 420px']),
                        FileUpload::make('gallery')
                            ->label('Galeri')
                            ->disk('public')
                            ->multiple()
                            ->image()
                            ->directory('announcements/gallery')
                            ->visibility('public')
                            ->reorderable(),
                        Repeater::make('documents')
                            ->label('Dokümanlar')
                            ->schema([
                                TextInput::make('display_name')
                                    ->label('Görünen Ad')
                                    ->required()
                                    ->maxLength(255),
                                FileUpload::make('file')
                                    ->label('Dosya')
                                    ->disk('public')
                                    ->directory('announcements/documents')
                                    ->visibility('public')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->columns(2)
                            ->reorderable(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
