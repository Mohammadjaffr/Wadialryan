<?php

namespace App\Filament\Pages;

use App\Settings\QualitySettings;
use Filament\Forms;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class QualitySettingsPage extends SettingsPage
{
    public function getTitle(): string
    {
        return 'إعدادات الجودة';
    }

    public static function getNavigationLabel(): string
    {
        return 'صفحة الجودة';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'إدارة الصفحات';
    }

    protected static string $settings = QualitySettings::class;
    protected static ?int $navigationSort = 3;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-check-badge';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tab::make('Header Section')
                            ->label('القسم العلوي (Hero)')
                            ->schema([
                                Forms\Components\TextInput::make('page_title.ar')->label('العنوان الرئيسي (عربي)')->required(),
                                Forms\Components\TextInput::make('page_title.en')->label('العنوان الرئيسي (إنجليزي)')->required(),
                                Forms\Components\TextInput::make('page_subtitle.ar')->label('العنوان الفرعي (عربي)'),
                                Forms\Components\TextInput::make('page_subtitle.en')->label('العنوان الفرعي (إنجليزي)'),
                                Forms\Components\FileUpload::make('banner_image')->label('صورة الغلاف')
                                    ->image()->directory('quality')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'quality'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                            ]),
                        Tab::make('Content Section')
                            ->label('المحتوى التفصيلي')
                            ->schema([
                                Forms\Components\TextInput::make('content_title.ar')->label('عنوان المحتوى (عربي)')->required(),
                                Forms\Components\TextInput::make('content_title.en')->label('عنوان المحتوى (إنجليزي)')->required(),
                                Forms\Components\RichEditor::make('content_text.ar')->label('المحتوى (عربي)')->required(),
                                Forms\Components\RichEditor::make('content_text.en')->label('المحتوى (إنجليزي)')->required(),
                            ]),
                        Tab::make('Features')
                            ->label('النقاط والمميزات')
                            ->schema([
                                Forms\Components\Repeater::make('features')
                                    ->label('مبادئ/مميزات الجودة')
                                    ->schema([
                                        Forms\Components\TextInput::make('title.ar')->label('العنوان (عربي)')->required(),
                                        Forms\Components\TextInput::make('title.en')->label('العنوان (إنجليزي)')->required(),
                                        Forms\Components\Textarea::make('description.ar')->label('الوصف (عربي)'),
                                        Forms\Components\Textarea::make('description.en')->label('الوصف (إنجليزي)'),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
