<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class QualitySettings extends Settings
{
    public ?array $page_title;
    public ?array $page_subtitle;
    public ?string $banner_image;
    
    public ?array $content_title;
    public ?array $content_text;
    
    public ?array $features;

    public static function group(): string
    {
        return 'quality';
    }
}
