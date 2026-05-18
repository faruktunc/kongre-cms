<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    public function mount(int|string $record): void
    {
        $page = Page::query()->findOrFail($record);

        abort_if($page->isStaticPage(), 403);

        parent::mount($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->visible(fn (): bool => ! ($this->getRecord() instanceof Page && $this->getRecord()->isStaticPage())),
        ];
    }
}
