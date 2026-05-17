<?php

namespace App\Filament\Resources\ContactItemResource\Pages;

use App\Filament\Resources\ContactItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageContactItems extends ManageRecords
{
    protected static string $resource = ContactItemResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
