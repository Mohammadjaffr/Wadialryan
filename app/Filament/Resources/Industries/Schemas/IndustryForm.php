<?php

namespace App\Filament\Resources\Industries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class IndustryForm
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
                Textarea::make('description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')->label('الصورة')
                    ->image()->disk('public')->directory('industries')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                TextInput::make('icon')->label('الأيقونة')
                    ->default(null),
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
                    ->image()->disk('public')->directory('industries')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
