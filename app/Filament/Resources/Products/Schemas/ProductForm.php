<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('اسم المنتج')
                    ->required(),
                TextInput::make('slug')->label('الرابط اللطيف (Slug)')
                    ->required(),
                Textarea::make('description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('main_image')->label('الصورة الرئيسية')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->saveUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->saveImage($file, 'products'))
                    ->deleteUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->deleteImage($file))
                    ->default(null),
                \Filament\Forms\Components\FileUpload::make('gallery')->label('معرض الصور')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->directory('products/gallery')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->saveUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->saveImage($file, 'products/gallery'))
                    ->deleteUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->deleteImage($file))
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('featured')->label('مميز')
                    ->required(),
                Toggle::make('active')->label('مفعل')
                    ->default(true)
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('meta_title')->label('عنوان الميتا')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('meta_description')->label('وصف الميتا')
                    ->default(null)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('og_image')->label('صورة المشاركة (OG Image)')
                    ->image()
                    ->disk('public')
                    ->directory('products/og')
                    ->saveUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->saveImage($file, 'products/og'))
                    ->deleteUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
            ]);
    }
}
