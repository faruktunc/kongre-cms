<?php

namespace App\Filament\Resources\ConferenceSessionResource\Pages;

use App\Filament\Resources\ConferenceSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConferenceSessions extends ListRecords
{
    protected static string $resource = ConferenceSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
