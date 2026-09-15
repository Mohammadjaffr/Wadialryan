<?php

namespace App\Filament\Resources\EquipmentCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class EquipmentCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('العربية')
                            ->schema([
                                TextInput::make('name.ar')->label('الاسم بالعربية')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')->label('Name in English')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
                TextInput::make('slug')->label('الرابط')
                    ->required(),
            ]);
    }
}
