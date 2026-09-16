<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;


class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الوظيفة')
                    ->schema([
                        Tabs::make('CareerLocales')
                            ->tabs([
                                Tab::make('العربية (Arabic)')
                                    ->schema([
                                        TextInput::make('title.ar')
                                            ->label('المسمى الوظيفي')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('location.ar')
                                            ->label('الموقع')
                                            ->placeholder('مثال: البصرة، العراق')
                                            ->maxLength(255),
                                        Textarea::make('description.ar')
                                            ->label('الوصف الوظيفي')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                        Textarea::make('requirements.ar')
                                            ->label('المتطلبات والشروط')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ]),
                                Tab::make('English (الإنجليزية)')
                                    ->schema([
                                        TextInput::make('title.en')
                                            ->label('Job Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('location.en')
                                            ->label('Location')
                                            ->placeholder('e.g., Basra, Iraq')
                                            ->maxLength(255),
                                        Textarea::make('description.en')
                                            ->label('Job Description')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                        Textarea::make('requirements.en')
                                            ->label('Requirements')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpanFull(),

                        TextInput::make('department')
                            ->label('القسم')
                            ->maxLength(100),

                        Select::make('employment_type')
                            ->label('نوع الدوام')
                            ->options([
                                'Full-time' => 'دوام كامل (Full-time)',
                                'Part-time' => 'دوام جزئي (Part-time)',
                                'Contract' => 'عقد محدد (Contract)',
                                'Temporary' => 'مؤقت (Temporary)',
                            ])
                            ->native(false),

                        DatePicker::make('closing_date')
                            ->label('تاريخ الإغلاق')
                            ->native(false),

                        Toggle::make('active')
                            ->label('مفعل لاستقبال الطلبات')
                            ->default(true)
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
    }