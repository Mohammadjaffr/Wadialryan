<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name')->label('الاسم')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('issuer')->label('جهة الإصدار')
                    ->default(null),
                TextInput::make('certificate_number')->label('رقم الشهادة')
                    ->default(null),
                DatePicker::make('issue_date')->label('تاريخ الإصدار'),
                DatePicker::make('expiry_date')->label('تاريخ الانتهاء'),
                Textarea::make('description')->label('الوصف')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')->label('الصورة')
                    ->image()->disk('public')->directory('certifications')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120)
                    ->disk('public')
                    ->directory('certifications')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048),
                FileUpload::make('pdf')->label('ملف PDF')
                    ->disk('public')
                    ->directory('certifications_pdf')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120)->disk('public')->directory('certifications_pdf')->acceptedFileTypes(['application/pdf']),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
