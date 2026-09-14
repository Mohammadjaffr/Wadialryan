<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('الاسم')
                    ->required(),
                TextInput::make('logo')
                    ->default(null),
                TextInput::make('website')->label('الموقع الإلكتروني')
                    ->url()
                    ->default(null),
                TextInput::make('type')->label('النوع')
                    ->default(null),
                Toggle::make('featured')->label('مميز')
                    ->required(),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
