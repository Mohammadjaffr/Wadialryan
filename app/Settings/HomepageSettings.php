<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomepageSettings extends Settings
{
    public array $hero_title;
    public array $hero_subtitle;
    public ?string $hero_image;

    public array $primary_cta_label;
    public ?string $primary_cta_url;

    public array $secondary_cta_label;
    public ?string $secondary_cta_url;

    public array $about_heading;
    public array $about_content;
    public ?string $about_section_image;

    public array $why_choose_us_intro;
    public array $hse_intro;
    public array $final_cta_content;

    public bool $show_products;
    public bool $show_hse;
    public bool $show_services;
    public bool $show_projects;
    public bool $show_equipment;
    public bool $show_industries;
    public bool $show_clients;
    public bool $show_certifications;

    public array $statistics;

    public static function group(): string
    {
        return 'homepage';
    }
}
