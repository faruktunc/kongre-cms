<?php

namespace App\Filament\Resources\HomePopups\Pages;

use App\Filament\Resources\HomePopups\HomePopupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomePopup extends EditRecord
{
    protected static string $resource = HomePopupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
