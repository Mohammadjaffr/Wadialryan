<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.company_name', ['ar' => 'وادي الريان للمقاولات العامة والخدمات النفطية', 'en' => 'Wadi Al Rayan General Contracting & Oilfield Services']);
        $this->migrator->add('company.legal_name', ['ar' => 'شركة وادي الريان', 'en' => 'Wadi Al Rayan Co.']);
        $this->migrator->add('company.short_name', 'Wadi Al Rayan');
        $this->migrator->add('company.established_year', '2010');

        $this->migrator->add('company.phone', null);
        $this->migrator->add('company.secondary_phone', null);
        $this->migrator->add('company.whatsapp', null);

        $this->migrator->add('company.general_email', null);
        $this->migrator->add('company.sales_email', null);
        $this->migrator->add('company.hr_email', null);

        $this->migrator->add('company.address', ['ar' => 'العراق', 'en' => 'Iraq']);
        $this->migrator->add('company.google_maps_url', null);
        $this->migrator->add('company.latitude', null);
        $this->migrator->add('company.longitude', null);

        $this->migrator->add('company.facebook', null);
        $this->migrator->add('company.linkedin', null);
        $this->migrator->add('company.instagram', null);
        $this->migrator->add('company.x', null);
        $this->migrator->add('company.youtube', null);

        $this->migrator->add('company.logo', null);
        $this->migrator->add('company.dark_logo', null);
        $this->migrator->add('company.light_logo', null);
        $this->migrator->add('company.favicon', null);

        $this->migrator->add('company.primary_color', '#13312A');
        $this->migrator->add('company.secondary_color', '#C69A72');

        $this->migrator->add('company.footer_text', ['ar' => 'نقدم حلولاً متكاملة لقطاعات النفط والغاز والبنية التحتية والمشاريع الإنشائية.', 'en' => 'Integrated Solutions for Contracting & Oilfield Services.']);
        $this->migrator->add('company.copyright', '© 2026 Wadi Al Rayan. All rights reserved.');

        $this->migrator->add('company.seo_title', ['ar' => 'وادي الريان | خدمات نفطية ومقاولات', 'en' => 'Wadi Al Rayan | Oilfield Services & Contracting']);
        $this->migrator->add('company.seo_description', ['ar' => 'وادي الريان للمقاولات العامة والخدمات النفطية', 'en' => 'Wadi Al Rayan General Contracting & Oilfield Services']);
        $this->migrator->add('company.og_image', null);
    }
};
