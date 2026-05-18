<?php

namespace App\Filament\Resources\ContactItemResource\Pages;

use App\Filament\Resources\ContactItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContactItem extends EditRecord
{
    protected static string $resource = ContactItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
