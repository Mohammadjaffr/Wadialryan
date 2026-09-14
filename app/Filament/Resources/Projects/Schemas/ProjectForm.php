<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('title')->label('العنوان')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('slug')->label('الرابط')
                    ->required(),
                TextInput::make('category')
                    ->default(null),
                Textarea::make('location')->label('الموقع')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('project_status')->label('الحالة')
                    ->default(null),
                DatePicker::make('start_date')->label('تاريخ البدء'),
                DatePicker::make('completion_date')->label('تاريخ الانتهاء'),
                Textarea::make('description')->label('الوصف')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('short_description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('full_description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('scope_of_work')->label('نطاق العمل')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('challenges')->label('التحديات')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('solutions')->label('الحلول')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('results')->label('النتائج')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('images')->label('الصور')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('main_image')->label('الصورة')
                    ->image()->disk('public')->directory('projects')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                Textarea::make('gallery')->label('معرض الصور')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('before_gallery')->label('معرض الصور')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('after_gallery')->label('معرض الصور')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_featured')->label('مميز')
                    ->required(),
                Toggle::make('is_active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('client_id')->label('العميل')
                    ->numeric()
                    ->default(null),
                TextInput::make('industry_id')->label('القطاع')
                    ->numeric()
                    ->default(null),
                Textarea::make('meta_title')->label('العنوان')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('meta_description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('og_image')->label('الصورة')
                    ->image()->disk('public')->directory('projects')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
