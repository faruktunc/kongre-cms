<?php

namespace App\Filament\Resources\ContactItemResource\Pages;

use App\Filament\Resources\ContactItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContactItems extends ListRecords
{
    protected static string $resource = ContactItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
