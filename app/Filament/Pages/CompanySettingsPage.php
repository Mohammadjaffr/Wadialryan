<?php

namespace App\Filament\Pages;

use App\Settings\CompanySettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class CompanySettingsPage extends SettingsPage
{
    public function getTitle(): string
    {
        return 'إعدادات الشركة';
    }

    public static function getNavigationLabel(): string
    {
        return 'إعدادات الشركة';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'الإعدادات';
    }

    protected static string $settings = CompanySettings::class;
    protected static ?int $navigationSort = 2;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-cog-6-tooth';
    }

    
    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Tabs::make('Settings')
                    ->tabs([
                        \Filament\Schemas\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('company_name.ar')->label('Company Name AR (عربي)')->required(),
                                Forms\Components\TextInput::make('company_name.en')->label('Company Name EN (إنجليزي)')->required(),
                                Forms\Components\TextInput::make('legal_name.ar')->label('Legal Name AR (عربي)'),
                                Forms\Components\TextInput::make('legal_name.en')->label('Legal Name EN (إنجليزي)'),
                                Forms\Components\TextInput::make('short_name')->label('Short Name'),
                                Forms\Components\TextInput::make('established_year')->label('Established Year')->numeric(),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('Branding')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')->image()->directory('brand')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'brand'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                                Forms\Components\FileUpload::make('dark_logo')->image()->directory('brand')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'brand'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                                Forms\Components\FileUpload::make('light_logo')->image()->directory('brand')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'brand'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                                Forms\Components\FileUpload::make('favicon')->label('الأيقونة')->image()->directory('brand')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'brand'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                                Forms\Components\ColorPicker::make('primary_color'),
                                Forms\Components\ColorPicker::make('secondary_color'),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('Contact')
                            ->schema([
                                Forms\Components\TextInput::make('phone')->label('رقم الهاتف'),
                                Forms\Components\TextInput::make('secondary_phone')->label('Secondary Phone'),
                                Forms\Components\TextInput::make('whatsapp')->label('Whatsapp'),
                                Forms\Components\TextInput::make('general_email')->label('البريد الإلكتروني')->email(),
                                Forms\Components\TextInput::make('sales_email')->label('Sales Email')->email(),
                                Forms\Components\TextInput::make('hr_email')->label('Hr Email')->email(),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('Location')
                            ->schema([
                                Forms\Components\TextInput::make('address.ar')->label('Address AR (عربي)'),
                                Forms\Components\TextInput::make('address.en')->label('Address EN (إنجليزي)'),
                                Forms\Components\TextInput::make('google_maps_url')->url()->label('Google Maps Url'),
                                Forms\Components\TextInput::make('latitude')->label('Latitude'),
                                Forms\Components\TextInput::make('longitude')->label('Longitude'),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('Social Media')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')->url()->label('Facebook'),
                                Forms\Components\TextInput::make('linkedin')->url()->label('Linkedin'),
                                Forms\Components\TextInput::make('instagram')->url()->label('Instagram'),
                                Forms\Components\TextInput::make('x')->url()->label('X (Twitter)'),
                                Forms\Components\TextInput::make('youtube')->url()->label('Youtube'),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('Footer')
                            ->schema([
                                Forms\Components\Textarea::make('footer_text.ar')->label('Footer Text AR (عربي)'),
                                Forms\Components\Textarea::make('footer_text.en')->label('Footer Text EN (إنجليزي)'),
                                Forms\Components\TextInput::make('copyright')->label('Copyright'),
                            ]),
                        \Filament\Schemas\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title.ar')->label('SEO Title AR (عربي)'),
                                Forms\Components\TextInput::make('seo_title.en')->label('SEO Title EN (إنجليزي)'),
                                Forms\Components\Textarea::make('seo_description.ar')->label('SEO Description AR (عربي)'),
                                Forms\Components\Textarea::make('seo_description.en')->label('SEO Description EN (إنجليزي)'),
                                Forms\Components\FileUpload::make('og_image')->label('الصورة')->image()->directory('seo')
                                    ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'seo'))
                                    ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
