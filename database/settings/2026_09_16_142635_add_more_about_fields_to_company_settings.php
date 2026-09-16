<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.about_story', [
            'ar' => '',
            'en' => '',
        ]);
        $this->migrator->add('company.vision', [
            'ar' => '',
            'en' => '',
        ]);
        $this->migrator->add('company.mission', [
            'ar' => '',
            'en' => '',
        ]);

        $this->migrator->add('company.about_subtitle', [
            'ar' => 'شريكك الموثوق في البناء والتشييد والخدمات الهندسية منذ أكثر من عقدين.',
            'en' => 'Your trusted partner in construction and engineering services for over two decades.'
        ]);
        $this->migrator->add('company.about_image', null);
        
        $this->migrator->add('company.hse_badge', [
            'ar' => 'السلامة أولاً',
            'en' => 'Safety First'
        ]);
        $this->migrator->add('company.hse_title', [
            'ar' => 'الصحة والسلامة المهنية والبيئة (HSE)',
            'en' => 'Health, Safety and Environment (HSE)'
        ]);
        $this->migrator->add('company.hse_text', [
            'ar' => 'نلتزم في وادي الريان بأعلى معايير الأمن والسلامة للحفاظ على سلامة أفرادنا والمجتمع والبيئة. نطبق أنظمة صارمة لإدارة المخاطر والتأكد من توافق كافة عملياتنا مع المعايير الدولية والمحلية لضمان بيئة عمل آمنة ومستدامة.',
            'en' => 'At Wadi Al Rayan, we are committed to the highest safety and security standards to maintain the safety of our personnel, society, and the environment.'
        ]);
        $this->migrator->add('company.hse_list', [
            ['ar' => 'تطبيق برامج تدريبية دورية لكافة الكوادر العاملة.', 'en' => 'Implementing regular training programs for all working staff.'],
            ['ar' => 'توفير معدات السلامة الشخصية الأحدث والمطابقة للمواصفات.', 'en' => 'Providing the latest personal safety equipment conforming to specifications.'],
            ['ar' => 'الالتزام بالاشتراطات البيئية لتقليل البصمة الكربونية وإدارة المخلفات.', 'en' => 'Commitment to environmental requirements to reduce the carbon footprint and manage waste.']
        ]);
        $this->migrator->add('company.hse_image', null);
    }
};