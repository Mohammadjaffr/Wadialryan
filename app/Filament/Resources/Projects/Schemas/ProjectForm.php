<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('العنوان'))
                    ->required(),
                TextInput::make('slug')
                    ->label(__('الرابط (Slug)'))
                    ->required(),
                TextInput::make('location')
                    ->label(__('الموقع'))
                    ->default(null),
                \Filament\Forms\Components\Select::make('category')
                    ->label(__('التصنيف'))
                    ->options([
                        'تجاري' => __('تجاري'),
                        'سكني' => __('سكني'),
                        'بنية تحتية' => __('بنية تحتية'),
                    ])
                    ->required(),
                DatePicker::make('completion_date')
                    ->label(__('تاريخ الانتهاء')),
                RichEditor::make('description')
                    ->label(__('الوصف'))
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->label(__('الصور'))
                    ->image()
                    ->multiple()
                    ->maxFiles(4)
                    ->saveUploadedFileUsing(function ($file) {
                        return app(\App\Services\ImageService::class)->saveImage($file, 'projects');
                    })
                    ->deleteUploadedFileUsing(function ($file) {
                        app(\App\Services\ImageService::class)->deleteImage($file);
                    })
                    ->columnSpanFull(),
            ]);
    }
}
