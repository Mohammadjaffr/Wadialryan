<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // تغيير إلى TextInput ليكون مناسباً للعناوين
                TextInput::make('title')->label('العنوان')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('slug')->label('الرابط')
                    ->required(),

                // تمييز التسميات لتجنب تكرار كلمة "الوصف"
                Textarea::make('short_description')->label('الوصف القصير')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('full_description')->label('الوصف الكامل')
                    ->default(null)
                    ->columnSpanFull(),



                // 🚨 إصلاح مشكلة [object Object] عبر استخدام TagsInput بدلاً من Textarea
                TagsInput::make('capabilities')->label('القدرات والمميزات')
                    ->placeholder('اكتب الميزة ثم اضغط Enter لإضافتها')
                    ->default(null)
                    ->columnSpanFull(),

                TagsInput::make('scope_of_work')->label('نطاق العمل')
                    ->placeholder('اكتب النطاق ثم اضغط Enter لإضافته')
                    ->default(null)
                    ->columnSpanFull(),

                TagsInput::make('applications')->label('التطبيقات')
                    ->placeholder('اكتب التطبيق ثم اضغط Enter لإضافته')
                    ->default(null)
                    ->columnSpanFull(),

                IconPicker::make('icon')
                    ->label('الأيقونة')
                    ->columns([
                        'default' => 1,
                        'lg' => 3,
                        '2xl' => 5,
                    ])
                    ->default(null),

                FileUpload::make('main_image')->label('الصورة الرئيسية')
                    ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),

                // 🚨 إصلاح حقل معرض الصور ليقبل رفع صور متعددة بدلاً من النص
                FileUpload::make('gallery')->label('معرض الصور')
                    ->multiple()
                    ->image()->disk('public')->directory('services/gallery')
                    ->columnSpanFull(),

                Toggle::make('is_featured')->label('مميز')
                    ->required(),

                Toggle::make('is_active')->label('مفعل')
                    ->required(),

                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),

                FileUpload::make('image_path')->label('الصورة الإضافية')
                    ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),

                TextInput::make('meta_title')->label('عنوان الـ SEO')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('meta_description')->label('وصف الـ SEO')
                    ->default(null)
                    ->columnSpanFull(),

                FileUpload::make('og_image')->label('صورة الـ SEO')
                    ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
