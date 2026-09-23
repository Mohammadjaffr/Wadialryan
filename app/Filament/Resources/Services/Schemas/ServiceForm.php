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
                \Filament\Schemas\Components\Tabs::make('Translations')
                    ->tabs([
                        \Filament\Schemas\Components\Tabs\Tab::make('العربية')
                            ->schema([
                                TextInput::make('title.ar')->label('العنوان (عربي)')->required()->columnSpanFull(),
                                Textarea::make('short_description.ar')->label('الوصف القصير (عربي)')->default(null)->columnSpanFull(),
                                Textarea::make('full_description.ar')->label('الوصف الكامل (عربي)')->default(null)->columnSpanFull(),
                                TagsInput::make('capabilities.ar')->label('القدرات (عربي)')->placeholder('اكتب الميزة ثم اضغط Enter لإضافتها')->default(null)->columnSpanFull(),
                                TagsInput::make('scope_of_work.ar')->label('نطاق العمل (عربي)')->placeholder('اكتب النطاق ثم اضغط Enter لإضافته')->default(null)->columnSpanFull(),
                                TagsInput::make('applications.ar')->label('التطبيقات (عربي)')->placeholder('اكتب التطبيق ثم اضغط Enter لإضافته')->default(null)->columnSpanFull(),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('English')
                            ->schema([
                                TextInput::make('title.en')->label('Title in English')->required()->columnSpanFull(),
                                Textarea::make('short_description.en')->label('Short Description in English')->default(null)->columnSpanFull(),
                                Textarea::make('full_description.en')->label('Full Description in English')->default(null)->columnSpanFull(),
                                TagsInput::make('capabilities.en')->label('Capabilities in English')->placeholder('Add capability and press Enter')->default(null)->columnSpanFull(),
                                TagsInput::make('scope_of_work.en')->label('Scope of Work in English')->placeholder('Add scope and press Enter')->default(null)->columnSpanFull(),
                                TagsInput::make('applications.en')->label('Applications in English')->placeholder('Add application and press Enter')->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),

                TextInput::make('slug')->label('الرابط')
                    ->required()
                    ->columnSpanFull(),

                IconPicker::make('icon')
                    ->label('الأيقونة')
                    ->columns([
                        'default' => 1,
                        'lg' => 3,
                        '2xl' => 5,
                    ])
                    ->default(null)
                    ->columnSpanFull(),

                FileUpload::make('main_image')->label('الصورة الرئيسية')
                    ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120)
                    ->columnSpanFull(),

                // 🚨 إصلاح حقل معرض الصور ليقبل رفع صور متعددة بدلاً من النص
                FileUpload::make('gallery')->label('معرض الصور')
                    ->multiple()
                    ->image()->disk('public')->directory('services/gallery')
                    ->columnSpanFull(),

                \Filament\Schemas\Components\Grid::make(3)
                    ->schema([
                        Toggle::make('is_featured')->label('مميز')->required(),
                        Toggle::make('is_active')->label('مفعل')->required(),
                        TextInput::make('sort_order')->label('الترتيب')->required()->numeric()->default(0),
                    ]),

                FileUpload::make('image_path')->label('الصورة الإضافية')
                    ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120)
                    ->columnSpanFull(),

                \Filament\Schemas\Components\Fieldset::make('إعدادات الـ SEO')
                    ->schema([
                        TextInput::make('meta_title.ar')->label('عنوان الـ SEO (عربي)')->default(null),
                        TextInput::make('meta_title.en')->label('عنوان الـ SEO (إنجليزي)')->default(null),
                        Textarea::make('meta_description.ar')->label('وصف الـ SEO (عربي)')->default(null)->columnSpanFull(),
                        Textarea::make('meta_description.en')->label('وصف الـ SEO (إنجليزي)')->default(null)->columnSpanFull(),
                        FileUpload::make('og_image')->label('صورة الـ SEO')
                            ->image()->disk('public')->directory('services')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
