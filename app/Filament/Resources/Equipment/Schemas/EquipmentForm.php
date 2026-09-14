<?php

namespace App\Filament\Resources\Equipment\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EquipmentForm
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
                TextInput::make('category_id')->label('التصنيف')
                    ->numeric()
                    ->default(null),
                TextInput::make('manufacturer')->label('الشركة المصنعة')
                    ->default(null),
                TextInput::make('model')->label('الموديل')
                    ->default(null),
                TextInput::make('year')->label('سنة الصنع')
                    ->default(null),
                TextInput::make('capacity')->label('السعة')
                    ->default(null),
                Textarea::make('specifications')->label('المواصفات')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('availability_status')->label('حالة التوفر')
                    ->required()
                    ->default('available'),
                FileUpload::make('main_image')->label('الصورة')
                    ->image()->disk('public')->directory('equipment')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                Textarea::make('gallery')->label('معرض الصور')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('featured')->label('مميز')
                    ->required(),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('meta_title')->label('العنوان')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('meta_description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('og_image')->label('الصورة')
                    ->image()->disk('public')->directory('equipment')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
