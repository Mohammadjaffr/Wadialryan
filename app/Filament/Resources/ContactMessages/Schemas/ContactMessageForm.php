<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactMessageForm
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
                    ->default(null),
                TextInput::make('subject')->label('الموضوع')
                    ->default(null),
                TextInput::make('service')->label('الخدمة')
                    ->default(null),
                TextInput::make('service_requested')
                    ->default(null),
                Textarea::make('message')->label('الرسالة')
                    ->required()
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
