<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Forms\Components\TagsInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Icons\Heroicon;
use Hugomyb\FilamentMediaAction\Actions\MediaAction;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Number;
use Slimani\MediaManager\Models\File;
use Slimani\MediaManager\Models\Tag;

class MediaBrowser extends \Slimani\MediaManager\Livewire\MediaBrowser
{
    protected function fileDetailsSchema(File $file): array
    {
        return [
            ImageEntry::make('sel_preview')
                ->hiddenLabel()
                ->state(static function () use ($file) {
                    $url = $file->getUrl('preview');

                    return str($url)->replace('–', '%E2%80%93')->toString();
                })
                ->imageWidth('100%')
                ->imageHeight('auto')
                ->extraImgAttributes(['class' => 'object-contain w-full'])
                ->visible(static function () use ($file) {
                    $mimeType = $file->mime_type;

                    return str($mimeType)->startsWith('image/') || str($mimeType)->startsWith('video/');
                }),

            TextEntry::make('sel_thumb')
                ->hiddenLabel()
                ->state(new HtmlString(Blade::render('<div class="flex items-center justify-center bg-gray-100 dark:bg-gray-800 rounded-lg h-32"><x-heroicon-o-document-text class="w-12 h-12 text-gray-400" /></div>')))
                ->html()
                ->visible(! str($file->mime_type)->startsWith('image/') && ! str($file->mime_type)->startsWith('video/')),

            TextEntry::make('sel_name')
                ->hiddenLabel()
                ->state($file->name.($file->extension ? '.'.$file->extension : ''))
                ->weight(FontWeight::Bold),

            Flex::make([
                TextEntry::make('sel_size')
                    ->label(__('media-manager::media-manager.details.size'))
                    ->state(Number::fileSize($file->size ?? 0))
                    ->badge(),
                TextEntry::make('sel_type')
                    ->label(__('media-manager::media-manager.details.type'))
                    ->state($file->mime_type)
                    ->badge(),
            ]),

            TextEntry::make('sel_caption')
                ->state($file->caption)
                ->visible((bool) $file->caption),

            TextEntry::make('alt_text')
                ->state($file->alt_text)
                ->visible((bool) $file->alt_text),

            TextEntry::make('sel_path')
                ->label(__('media-manager::media-manager.details.public_url'))
                ->state($file->getUrl())
                ->copyable()
                ->copyableState(fn ($state) => $state)
                ->limit(30)
                ->hintActions([
                    Action::make('locate')
                        ->iconButton()
                        ->icon(Heroicon::OutlinedMagnifyingGlassCircle)
                        ->action(fn () => $this->locateItem("file-{$file->id}")),
                    MediaAction::make($file->name)
                        ->iconButton()
                        ->slideOver()
                        ->icon(Heroicon::OutlinedEye)
                        ->media($file->getUrl()),
                    Action::make('open_url')
                        ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                        ->iconButton()
                        ->url($file->getUrl(), true),
                ]),

            TextEntry::make('sel_created_at')
                ->label(__('media-manager::media-manager.details.uploaded'))
                ->state($file->created_at)
                ->since()
                ->color('gray'),

            TagsInput::make('activeTags')
                ->label(__('media-manager::media-manager.details.tags'))
                ->suggestions(Tag::pluck('name')->toArray())
                ->live()
                ->visible(fn () => $this->isEditingTags)
                ->hintAction(
                    Action::make('saveTags')
                        ->icon('heroicon-m-check')
                        ->color('success')
                        ->action(fn () => $this->saveTags())
                ),

            TextEntry::make('tags_display')
                ->label(__('media-manager::media-manager.details.tags'))
                ->state($file->tags->pluck('name')->isNotEmpty()
                    ? $file->tags->pluck('name')
                    : __('media-manager::media-manager.messages.no_tags'))
                ->visible(fn () => ! $this->isEditingTags)
                ->badge()
                ->hintAction(
                    Action::make('editTags')
                        ->icon('heroicon-m-pencil-square')
                        ->action(function () use ($file) {
                            $this->selectedFileId = $file->id;
                            $this->editingFolderId = null;
                            $this->activeTags = $file->tags->pluck('name')->toArray();
                            $this->isEditingTags = true;
                            $this->clearCachedSchemas();
                        })
                ),
        ];
    }
}
