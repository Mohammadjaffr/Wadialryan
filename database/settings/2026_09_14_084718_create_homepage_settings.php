<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('homepage.hero_title', ['ar' => 'حلول متكاملة<br>للمقاولات والخدمات النفطية', 'en' => 'Integrated Solutions for<br>Contracting & Oilfield Services']);
        $this->migrator->add('homepage.hero_subtitle', ['ar' => 'نقدم حلولاً متكاملة لقطاعات النفط والغاز والبنية التحتية والمشاريع الإنشائية، من التخطيط والدراسات الهندسية إلى التنفيذ والتوريد والدعم التشغيلي.', 'en' => 'Supporting oil & gas, infrastructure and construction projects through engineering, execution, procurement and operational support.']);
        $this->migrator->add('homepage.hero_image', null);

        $this->migrator->add('homepage.primary_cta_label', ['ar' => 'اطلب عرض سعر', 'en' => 'Request a Quote']);
        $this->migrator->add('homepage.primary_cta_url', '/rfq');

        $this->migrator->add('homepage.secondary_cta_label', ['ar' => 'استكشف خدماتنا', 'en' => 'Explore Our Services']);
        $this->migrator->add('homepage.secondary_cta_url', '/services');

        $this->migrator->add('homepage.about_heading', ['ar' => 'من نحن', 'en' => 'About Us']);
        $this->migrator->add('homepage.about_content', ['ar' => 'تجمع الشركة بين الخبرة الفنية والكفاءة التشغيلية لتوفير خدمات عالية الجودة تلبي احتياجات العملاء والمشاريع المختلفة.', 'en' => 'Wadi Al Rayan combines technical expertise and operational efficiency to provide high-quality services.']);
        $this->migrator->add('homepage.about_section_image', null);

        $this->migrator->add('homepage.why_choose_us_intro', ['ar' => 'لماذا تختارنا', 'en' => 'Why Choose Us']);
        $this->migrator->add('homepage.hse_intro', ['ar' => 'الصحة والسلامة', 'en' => 'HSE & Quality']);
        $this->migrator->add('homepage.final_cta_content', ['ar' => 'هل أنت مستعد لبدء مشروعك القادم؟', 'en' => 'Ready to start your next project?']);

        $this->migrator->add('homepage.show_services', true);
        $this->migrator->add('homepage.show_projects', true);
        $this->migrator->add('homepage.show_equipment', true);
        $this->migrator->add('homepage.show_industries', true);
        $this->migrator->add('homepage.show_clients', true);
        $this->migrator->add('homepage.show_certifications', true);
    }
};
