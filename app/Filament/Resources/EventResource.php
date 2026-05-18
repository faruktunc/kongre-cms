<?php

namespace App\Filament\Resources;

use App\Models\Event;
use Filament\Resources\Resource;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static bool $shouldRegisterNavigation = false;
}
