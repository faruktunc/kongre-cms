<?php

namespace App\Filament\Resources;

use App\Models\Event;
use BackedEnum;
use Filament\Resources\Resource;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static bool $shouldRegisterNavigation = false;
}
