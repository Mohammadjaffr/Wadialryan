<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('hse.page_title', ['ar' => 'الصحة والسلامة والبيئة (HSE)', 'en' => 'Health, Safety & Environment (HSE)']);
        $this->migrator->add('hse.page_subtitle', ['ar' => 'سلامتكم هي أولويتنا القصوى.', 'en' => 'Your safety is our top priority.']);
        $this->migrator->add('hse.banner_image', null);
        
        $this->migrator->add('hse.content_title', ['ar' => 'التزامنا بالسلامة', 'en' => 'Our Commitment to Safety']);
        $this->migrator->add('hse.content_text', ['ar' => '<p>في وادي الريان، نعتبر الصحة والسلامة المهنية وحماية البيئة جزءاً لا يتجزأ من جميع أعمالنا...</p>', 'en' => '<p>At Wadi Al Rayan, occupational health and safety and environmental protection are integral to all our operations...</p>']);
        
        $this->migrator->add('hse.policies', []);
    }
};
