<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->default(null),
                FileUpload::make('image_path')
                    ->image()
                    ->saveUploadedFileUsing(function ($file) {
                        return app(\App\Services\ImageService::class)->saveImage($file, 'services');
                    })
                    ->deleteUploadedFileUsing(function ($file) {
                        app(\App\Services\ImageService::class)->deleteImage($file);
                    }),
            ]);
    }
}
