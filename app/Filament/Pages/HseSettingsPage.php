<?php

namespace App\Filament\Pages;

use App\Settings\HseSettings;
use Filament\Forms;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class HseSettingsPage extends SettingsPage
{
    public function getTitle(): string
    {
        return 'إعدادات الصحة والسلامة';
    }

    public static function getNavigationLabel(): string
    {
        return 'صفحة الصحة والسلامة (HSE)';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'إدارة الصفحات';
    }

    protected static string $settings = HseSettings::class;
    protected static ?int $navigationSort = 4;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-shield-check';
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
                                    ->image()->directory('hse')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'hse'))
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
                        Tab::make('Policies')
                            ->label('السياسات والإجراءات')
                            ->schema([
                                Forms\Components\Repeater::make('policies')
                                    ->label('النقاط والسياسات')
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
