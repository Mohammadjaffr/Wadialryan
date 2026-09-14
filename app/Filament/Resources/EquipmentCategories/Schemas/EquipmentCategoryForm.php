<?php

namespace App\Filament\Resources\EquipmentCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EquipmentCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name')->label('الاسم')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('slug')->label('الرابط')
                    ->required(),
            ]);
    }
}
