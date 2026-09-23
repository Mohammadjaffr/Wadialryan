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
                \Filament\Schemas\Components\Tabs::make('Translations')
                    ->tabs([
                        \Filament\Schemas\Components\Tabs\Tab::make('العربية')
                            ->schema([
                                TextInput::make('name.ar')->label('اسم المنتج (عربي)')->required()->columnSpanFull(),
                                Textarea::make('description.ar')->label('الوصف (عربي)')->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.ar')->label('عنوان الميتا (عربي)')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.ar')->label('وصف الميتا (عربي)')->default(null)->columnSpanFull(),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')->label('Product Name (English)')->required()->columnSpanFull(),
                                Textarea::make('description.en')->label('Description (English)')->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.en')->label('Meta Title (English)')->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.en')->label('Meta Description (English)')->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
                TextInput::make('slug')->label('الرابط اللطيف (Slug)')
                    ->required()
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

                \Filament\Forms\Components\FileUpload::make('og_image')->label('صورة المشاركة (OG Image)')
                    ->image()
                    ->disk('public')
                    ->directory('products/og')
                    ->saveUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->saveImage($file, 'products/og'))
                    ->deleteUploadedFileUsing(fn($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
            ]);
    }
}
