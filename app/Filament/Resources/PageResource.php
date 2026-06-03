<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages\CreatePage;
use App\Filament\Resources\PageResource\Pages\EditPage;
use App\Filament\Resources\PageResource\Pages\PageTree;
use App\Models\Page;
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
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Sayfalar';

    protected static ?string $modelLabel = 'Sayfa';

    protected static ?string $pluralModelLabel = 'Sayfalar';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Sayfa Ayarları')
                ->schema([
                    TextInput::make('title')
                        ->label('Sayfa Başlığı')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, Get $get, ?string $state, ?Model $record) {
                            if (! $get('slug') && $state) {
                                $set('slug', Page::generateUniqueSlug($state, $record?->id));
                            }
                        }),
                    TextInput::make('slug')
                        ->label('Kısa Bağlantı (Slug)')
                        ->required()
                        ->unique(
                            table: 'menus',
                            column: 'slug',
                            ignorable: fn (?Model $record) => $record,
                        )
                        ->rule(fn () => 'not_in:'.implode(',', Page::staticSlugs()))
                        ->helperText('Başlıktan otomatik oluşturulur, düzenlenebilir.'),
                    //                    Select::make('parent_id')
                    //                        ->label('Üst Sayfa')
                    //                        ->relationship(
                    //                            name: 'parent',
                    //                            titleAttribute: 'title',
                    //                            modifyQueryUsing: fn (Builder $query) => $query->whereNotIn('id', Page::staticIds()),
                    //                            ignoreRecord: true,
                    //                        )
                    //                        ->searchable()
                    //                        ->preload()
                    //                        ->native(false)
                    //                        ->placeholder('Yok'),
                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(1)
                ->columnSpanFull(),
            Section::make('Sayfa İçeriği')
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Alt Başlık')
                        ->maxLength(255),
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
                        ->extraInputAttributes(['style' => 'min-height: 480px']),
                    FileUpload::make('gallery')
                        ->label('Galeri')
                        ->disk('public')
                        ->multiple()
                        ->image()
                        ->directory('pages/gallery')
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
                                ->directory('pages/documents')
                                ->visibility('public')
                                ->required(),
                        ])
                        ->defaultItems(0)
                        ->columns(2)
                        ->reorderable(),
                ])
                ->columns(1)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->label('Sayfa Başlığı')->searchable()->grow(),
                TextColumn::make('slug')->label('Kısa Bağlantı')->color('gray'),
                TextColumn::make('parent.title')->label('Üst Sayfa')->placeholder('—'),
                TextColumn::make('order')->label('Sıra')->sortable(),
                ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->recordActions([
                EditAction::make()->visible(fn (Page $record): bool => ! $record->isStaticPage()),
                DeleteAction::make()->visible(fn (Page $record): bool => ! $record->isStaticPage()),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => PageTree::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }

    public static function canEdit(Model $record): bool
    {
        return $record instanceof Page && ! $record->isStaticPage();
    }

    public static function canDelete(Model $record): bool
    {
        return $record instanceof Page && ! $record->isStaticPage();
    }
}
