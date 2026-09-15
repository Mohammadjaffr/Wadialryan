<?php

namespace App\Filament\Resources\Equipment\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Select;

class EquipmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('العربية')
                            ->schema([
                                TextInput::make('name.ar')->label('الاسم بالعربية')->required()->columnSpanFull(),
                                Textarea::make('description.ar')->label('الوصف بالعربية')->default(null)->columnSpanFull(),
                                Textarea::make('specifications.ar')->label('المواصفات بالعربية')->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.ar')->label('عنوان الـ SEO بالعربية')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.ar')->label('وصف الـ SEO بالعربية')->default(null)->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')->label('Name in English')->required()->columnSpanFull(),
                                Textarea::make('description.en')->label('Description in English')->default(null)->columnSpanFull(),
                                Textarea::make('specifications.en')->label('Specifications in English')->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.en')->label('SEO Title in English')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.en')->label('SEO Description in English')->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
                TextInput::make('slug')->label('الرابط')
                    ->required(),
                Select::make('category_id')->label('التصنيف')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('manufacturer')->label('الشركة المصنعة')
                    ->default(null),
                TextInput::make('model')->label('الموديل')
                    ->default(null),
                TextInput::make('year')->label('سنة الصنع')
                    ->default(null),
                TextInput::make('capacity')->label('السعة')
                    ->default(null),
                TextInput::make('availability_status')->label('حالة التوفر')
                    ->required()
                    ->default('available'),
                FileUpload::make('main_image')->label('الصورة')
                    ->image()->disk('public')->directory('equipment')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                
                // Array field
                FileUpload::make('gallery')->label('معرض الصور')
                    ->multiple()->image()->disk('public')->directory('equipment/gallery')->columnSpanFull(),

                Toggle::make('featured')->label('مميز')
                    ->required(),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('og_image')->label('الصورة')
                    ->image()->disk('public')->directory('equipment')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
