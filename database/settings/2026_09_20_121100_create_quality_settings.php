<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('quality.page_title', ['ar' => 'إدارة الجودة', 'en' => 'Quality Management']);
        $this->migrator->add('quality.page_subtitle', ['ar' => 'نلتزم بتقديم أعلى المعايير.', 'en' => 'We are committed to delivering the highest standards.']);
        $this->migrator->add('quality.banner_image', null);
        
        $this->migrator->add('quality.content_title', ['ar' => 'التزامنا بالجودة', 'en' => 'Our Commitment to Quality']);
        $this->migrator->add('quality.content_text', ['ar' => '<p>نسعى دائماً لتقديم أعلى مستويات الجودة في كل المشاريع...</p>', 'en' => '<p>We always strive to provide the highest levels of quality in all projects...</p>']);
        
        $this->migrator->add('quality.features', []);
    }
};
