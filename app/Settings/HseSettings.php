<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HseSettings extends Settings
{
    public ?array $page_title;
    public ?array $page_subtitle;
    public ?string $banner_image;
    
    public ?array $content_title;
    public ?array $content_text;
    
    public ?array $policies;

    public static function group(): string
    {
        return 'hse';
    }
}
