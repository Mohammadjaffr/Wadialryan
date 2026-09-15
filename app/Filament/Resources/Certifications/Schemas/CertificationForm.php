<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('العربية')
                            ->schema([
                                TextInput::make('name.ar')->label('الاسم بالعربية')->required()->columnSpanFull(),
                                Textarea::make('description.ar')->label('الوصف بالعربية')->default(null)->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')->label('Name in English')->required()->columnSpanFull(),
                                Textarea::make('description.en')->label('Description in English')->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),
                TextInput::make('issuer')->label('جهة الإصدار')
                    ->default(null),
                TextInput::make('certificate_number')->label('رقم الشهادة')
                    ->default(null),
                DatePicker::make('issue_date')->label('تاريخ الإصدار'),
                DatePicker::make('expiry_date')->label('تاريخ الانتهاء'),
                FileUpload::make('image')->label('الصورة')
                    ->image()->disk('public')->directory('certifications')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
                FileUpload::make('pdf')->label('ملف PDF')
                    ->disk('public')
                    ->directory('certifications_pdf')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120),
                Toggle::make('active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
