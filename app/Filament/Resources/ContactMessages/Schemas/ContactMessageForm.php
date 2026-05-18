<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Mesaj Detayı')
                    ->schema([
                        TextInput::make('name')
                            ->label('Ad Soyad')
                            ->disabled(),
                        TextInput::make('email')
                            ->label('E-posta')
                            ->disabled(),
                        TextInput::make('subject')
                            ->label('Konu')
                            ->disabled()
                            ->columnSpanFull(),
                        Textarea::make('message')
                            ->label('Mesaj')
                            ->rows(8)
                            ->disabled()
                            ->columnSpanFull(),
                        TextInput::make('ip_address')
                            ->label('IP Adresi')
                            ->disabled(),
                        TextInput::make('created_at')
                            ->label('Gönderim Tarihi')
                            ->disabled(),
                        Toggle::make('is_read')
                            ->label('Okundu')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }
}
