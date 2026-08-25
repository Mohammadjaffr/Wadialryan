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
                    ->required(),
                TextInput::make('slug')
                    
                    ->required(),
                TextInput::make('location')
                    ->default(null),
                DatePicker::make('completion_date'),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('images')
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
