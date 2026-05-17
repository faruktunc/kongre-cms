<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Textarea;

trait HandlesJsonTextarea
{
    protected static function jsonTextarea(string $name, string $label, bool $emptyAsArray = true): Textarea
    {
        return Textarea::make($name)
            ->label($label)
            ->rows(8)
            ->nullable()
            ->rule('json')
            ->helperText('JSON formatinda veri girin. Bos birakirsaniz guvenli varsayilan kaydedilir.')
            ->formatStateUsing(function (mixed $state): string {
                if ($state === null || $state === '') {
                    return '';
                }

                $encoded = json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

                return $encoded === false ? '' : $encoded;
            })
            ->dehydrateStateUsing(function (?string $state) use ($emptyAsArray): mixed {
                $trimmedState = trim((string) $state);

                if ($trimmedState === '') {
                    return $emptyAsArray ? [] : null;
                }

                return json_decode($trimmedState, true);
            });
    }
}
