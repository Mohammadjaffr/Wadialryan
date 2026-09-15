<?php

namespace App\Filament\Resources\Industries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class IndustryForm
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
                                TextInput::make('meta_title.ar')->label('عنوان الـ SEO بالعربية')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.ar')->label('وصف الـ SEO بالعربية')->default(null)->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')->label('Name in English')->required()->columnSpanFull(),
                                Textarea::make('description.en')->label('Description in English')->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.en')->label('SEO Title in English')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.en')->label('SEO Description in English')->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
                TextInput::make('slug')->label('الرابط')
                    ->required(),
                FileUpload::make('image')->label('الصورة')
                    ->image()->disk('public')->directory('industries')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                \Guava\IconPicker\Forms\Components\IconPicker::make('icon')
                    ->label('الأيقونة')
                    ->columns([
                        'default' => 1,
                        'lg' => 3,
                        '2xl' => 5,
                    ])
                    ->default(null),
                Toggle::make('featured')->label('مميز')
                    ->required(),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('og_image')->label('صورة الـ SEO')
                    ->image()->disk('public')->directory('industries')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
