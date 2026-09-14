<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class JobApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('career_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')->label('الاسم')
                    ->required(),
                TextInput::make('email')->label('البريد الإلكتروني')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')->label('رقم الهاتف')
                    ->tel()
                    ->default(null),
                \Filament\Forms\Components\FileUpload::make('cv_path')->label('السيرة الذاتية')
                    ->disk('local')
                    ->directory('cvs')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(5120),
                Textarea::make('message')->label('الرسالة')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')->label('الحالة')
                    ->required()
                    ->default('New'),
                Textarea::make('notes')->label('ملاحظات')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
