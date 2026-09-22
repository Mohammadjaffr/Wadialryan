<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Select;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('العربية')
                            ->schema([
                                TextInput::make('title.ar')->label('العنوان بالعربية')
                                    ->required()->columnSpanFull(),
                                TextInput::make('location.ar')->label('الموقع بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('short_description.ar')->label('الوصف القصير بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('full_description.ar')->label('الوصف الكامل بالعربية')
                                    ->default(null)->columnSpanFull(),

                                Textarea::make('scope_of_work.ar')->label('نطاق العمل بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('challenges.ar')->label('التحديات بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('solutions.ar')->label('الحلول بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('results.ar')->label('النتائج بالعربية')
                                    ->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.ar')->label('عنوان الـ SEO بالعربية')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.ar')->label('وصف الـ SEO بالعربية')
                                    ->default(null)->columnSpanFull(),
                            ]),
                        Tab::make('English')
                            ->schema([
                                TextInput::make('title.en')->label('Title in English')
                                    ->required()->columnSpanFull(),
                                TextInput::make('location.en')->label('Location in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('short_description.en')->label('Short Description in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('full_description.en')->label('Full Description in English')
                                    ->default(null)->columnSpanFull(),

                                Textarea::make('scope_of_work.en')->label('Scope of Work in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('challenges.en')->label('Challenges in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('solutions.en')->label('Solutions in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('results.en')->label('Results in English')
                                    ->default(null)->columnSpanFull(),
                                TextInput::make('meta_title.en')->label('SEO Title in English')
                                    ->default(null)->columnSpanFull(),
                                Textarea::make('meta_description.en')->label('SEO Description in English')
                                    ->default(null)->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),

                TextInput::make('slug')->label('الرابط')
                    ->required(),
                TextInput::make('category')->label('التصنيف')
                    ->default(null),
                Select::make('project_status')
                    ->label('الحالة')
                    ->options([
                        'under_study' => 'قيد الدراسة',
                        'approved'    => 'معتمد / تمت الترسية',
                        'in_progress' => 'قيد التنفيذ',
                        'suspended'   => 'متوقف مؤقتاً',
                        'completed'   => 'مكتمل',
                        'delivered'   => 'تم التسليم النهائي',
                    ])
                    ->default(null),
                DatePicker::make('start_date')->label('تاريخ البدء'),
                DatePicker::make('completion_date')->label('تاريخ الانتهاء'),

                \Filament\Forms\Components\Select::make('client_id')->label('العميل')
                    ->relationship('client', 'name')
                    ->searchable()
                    ->preload()
                    ->default(null),
                \Filament\Forms\Components\Select::make('industry_id')->label('القطاع')
                    ->relationship('industry', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->getTranslation('name', 'ar'))
                    ->searchable()
                    ->preload()
                    ->default(null),

                FileUpload::make('main_image')->label('الصورة الرئيسية')
                    ->image()->disk('public')->directory('projects')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),

                // Array fields
                FileUpload::make('gallery')->label('معرض الصور')
                    ->multiple()->maxFiles(8)->image()->disk('public')->directory('projects/gallery')->columnSpanFull(),
                FileUpload::make('before_gallery')->label('صور قبل')
                    ->multiple()->maxFiles(3)->image()->disk('public')->directory('projects/before')->columnSpanFull(),
                FileUpload::make('after_gallery')->label('صور بعد')
                    ->multiple()->maxFiles(3)->image()->disk('public')->directory('projects/after')->columnSpanFull(),
                FileUpload::make('images')->label('صور أخرى (إرث)')
                    ->multiple()->maxFiles(8)->image()->disk('public')->directory('projects/images')->columnSpanFull(),

                Toggle::make('is_featured')->label('مميز')
                    ->required(),
                Toggle::make('is_active')->label('مفعل')
                    ->required(),
                TextInput::make('sort_order')->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),

                FileUpload::make('og_image')->label('صورة الـ SEO')
                    ->image()->disk('public')->directory('projects')->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])->maxSize(5120),
            ]);
    }
}
