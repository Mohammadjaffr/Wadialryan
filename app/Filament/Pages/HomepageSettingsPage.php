<?php

namespace App\Filament\Pages;

use App\Settings\HomepageSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class HomepageSettingsPage extends SettingsPage
{
    public function getTitle(): string
    {
        return 'إعدادات الرئيسية';
    }

    public static function getNavigationLabel(): string
    {
        return 'إعدادات الرئيسية';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'الإعدادات';
    }

    protected static string $settings = HomepageSettings::class;
    protected static ?int $navigationSort = 1;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-home';
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title.ar')->label('Hero Title AR (عربي)')->required(),
                        Forms\Components\TextInput::make('hero_title.en')->label('Hero Title EN (إنجليزي)')->required(),
                        Forms\Components\Textarea::make('hero_subtitle.ar')->label('Hero Subtitle AR (عربي)')->required(),
                        Forms\Components\Textarea::make('hero_subtitle.en')->label('Hero Subtitle EN (إنجليزي)')->required(),
                        Forms\Components\FileUpload::make('hero_image')->label('الصورة')->image()->directory('homepage')
                            ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'homepage'))
                            ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                            Forms\Components\FileUpload::make('about_section_image')->label('صورة من نحن')->image()->directory('homepage')
                            ->saveUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->saveImage($file, 'homepage'))
                            ->deleteUploadedFileUsing(fn ($file) => app(\App\Services\ImageService::class)->deleteImage($file)),
                    ]),
                    

                \Filament\Schemas\Components\Section::make('Calls to Action')
                    ->schema([
                        Forms\Components\TextInput::make('primary_cta_label.ar')->label('Primary CTA Label AR (عربي)'),
                        Forms\Components\TextInput::make('primary_cta_label.en')->label('Primary CTA Label EN (إنجليزي)'),
                        Forms\Components\TextInput::make('primary_cta_url')->label('Primary Cta Url'),
                        Forms\Components\TextInput::make('secondary_cta_label.ar')->label('Secondary CTA Label AR (عربي)'),
                        Forms\Components\TextInput::make('secondary_cta_label.en')->label('Secondary CTA Label EN (إنجليزي)'),
                        Forms\Components\TextInput::make('secondary_cta_url')->label('Secondary Cta Url'),
                    ]),

                \Filament\Schemas\Components\Section::make('About Section')
                    ->schema([
                        Forms\Components\TextInput::make('about_heading.ar')->label('About Heading AR (عربي)'),
                        Forms\Components\TextInput::make('about_heading.en')->label('About Heading EN (إنجليزي)'),
                        Forms\Components\Textarea::make('about_content.ar')->label('About Content AR (عربي)'),
                        Forms\Components\Textarea::make('about_content.en')->label('About Content EN (إنجليزي)'),
                    ]),

                \Filament\Schemas\Components\Section::make('Intros & Texts')
                    ->schema([
                        Forms\Components\TextInput::make('why_choose_us_intro.ar')->label('Why Choose Us AR (عربي)'),
                        Forms\Components\TextInput::make('why_choose_us_intro.en')->label('Why Choose Us EN (إنجليزي)'),
                        Forms\Components\TextInput::make('hse_intro.ar')->label('HSE Intro AR (عربي)'),
                        Forms\Components\TextInput::make('hse_intro.en')->label('HSE Intro EN (إنجليزي)'),
                        Forms\Components\TextInput::make('final_cta_content.ar')->label('Final CTA Text AR (عربي)'),
                        Forms\Components\TextInput::make('final_cta_content.en')->label('Final CTA Text EN (إنجليزي)'),
                    ]),

                \Filament\Schemas\Components\Section::make('Section Visibility')
                    ->schema([
                        Forms\Components\Toggle::make('show_services')->label('Show Services'),
                        Forms\Components\Toggle::make('show_projects')->label('Show Projects'),
                        Forms\Components\Toggle::make('show_equipment')->label('Show Equipment'),
                        Forms\Components\Toggle::make('show_industries')->label('Show Industries'),
                        Forms\Components\Toggle::make('show_clients')->label('Show Clients'),
                        Forms\Components\Toggle::make('show_certifications')->label('Show Certifications'),
                    ])->columns(3),
                    
                \Filament\Schemas\Components\Section::make('Statistics')
                    ->schema([
                        Forms\Components\Repeater::make('statistics')
                            ->label('الإحصائيات')
                            ->schema([
                                Forms\Components\TextInput::make('label_ar')->label('Label AR')->required(),
                                Forms\Components\TextInput::make('label_en')->label('Label EN')->required(),
                                Forms\Components\TextInput::make('value')->label('Value')->required(),
                                Forms\Components\TextInput::make('prefix')->label('Prefix'),
                                Forms\Components\TextInput::make('suffix')->label('Suffix'),
                                \Guava\IconPicker\Forms\Components\IconPicker::make('icon')
                                    ->label('Icon')
                                    ->columns([
                                        'default' => 1,
                                        'lg' => 3,
                                        '2xl' => 5,
                                    ]),
                                Forms\Components\Toggle::make('active')->label('Active')->default(true),
                            ])
                            ->columns(3)
                    ]),
            ]);
    }
}
