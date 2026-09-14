<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('title')->label('العنوان')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('department')->label('القسم')
                    ->default(null),
                Textarea::make('location')->label('الموقع')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('employment_type')->label('النوع')
                    ->default(null),
                Textarea::make('description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('requirements')->label('المتطلبات')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('closing_date')->label('تاريخ الإغلاق'),
                Toggle::make('active')->label('مفعل')
                    ->required(),
            ]);
    }
}
