<?php

namespace App\Filament\Resources\QuoteRequests\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class QuoteRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('الاسم')
                    ->required(),
                TextInput::make('company')->label('الشركة')
                    ->default(null),
                TextInput::make('email')->label('البريد الإلكتروني')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')->label('رقم الهاتف')
                    ->tel()
                    ->required(),
                TextInput::make('location')->label('الموقع')
                    ->default(null),
                TextInput::make('requested_service')->label('الخدمة المطلوبة')
                    ->default(null),
                TextInput::make('project_location')->label('الموقع')
                    ->default(null),
                Textarea::make('project_description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('estimated_timeline')->label('المدة المتوقعة')
                    ->default(null),
                \Filament\Forms\Components\FileUpload::make('attachment')->label('المرفقات')
                    ->disk('local')
                    ->directory('rfq_attachments')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'image/jpeg', 'image/png'])
                    ->maxSize(10240),
                Textarea::make('message')->label('الرسالة')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')->label('الحالة')
                    ->required()
                    ->default('New'),
                Textarea::make('admin_notes')->label('ملاحظات')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
