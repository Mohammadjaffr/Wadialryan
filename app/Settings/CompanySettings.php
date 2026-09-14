<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CompanySettings extends Settings
{
    public array $company_name;
    public array $legal_name;
    public ?string $short_name;
    public ?string $established_year;

    public ?string $phone;
    public ?string $secondary_phone;
    public ?string $whatsapp;

    public ?string $general_email;
    public ?string $sales_email;
    public ?string $hr_email;

    public array $address;
    public ?string $google_maps_url;
    public ?string $latitude;
    public ?string $longitude;

    public ?string $facebook;
    public ?string $linkedin;
    public ?string $instagram;
    public ?string $x;
    public ?string $youtube;

    public ?string $logo;
    public ?string $dark_logo;
    public ?string $light_logo;
    public ?string $favicon;

    public ?string $primary_color;
    public ?string $secondary_color;

    public array $footer_text;
    public ?string $copyright;

    public array $seo_title;
    public array $seo_description;
    public ?string $og_image;

    public static function group(): string
    {
        return 'company';
    }
}
