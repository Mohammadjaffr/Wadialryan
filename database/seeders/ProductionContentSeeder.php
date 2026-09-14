<?php

namespace Database\Seeders;

use App\Models\EquipmentCategory;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use ReflectionProperty;
use Throwable;

class ProductionContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->command?->info('Seeding Wadi Al Rayan corporate content...');

        $this->seedCompanySettings();
        $this->seedHomepageSettings();

        $industries = $this->seedIndustries();
        $this->seedEquipmentCategories();
        $this->seedServices($industries);

        $this->command?->newLine();
        $this->command?->info('Wadi Al Rayan corporate content seeded successfully.');
        $this->command?->warn(
            'Projects, real equipment, clients, certifications and statistics were intentionally NOT faked.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Company Settings
    |--------------------------------------------------------------------------
    */

    private function seedCompanySettings(): void
    {
        if (! class_exists(\App\Settings\CompanySettings::class)) {
            $this->command?->warn('CompanySettings class not found - skipped.');
            return;
        }

        try {
            /** @var object $settings */
            $settings = app(\App\Settings\CompanySettings::class);

            $values = [
                [
                    ['company_name_ar', 'name_ar'],
                    'وادي الريان للمقاولات العامة والخدمات النفطية',
                ],
                [
                    ['company_name_en', 'name_en'],
                    'Wadi Al Rayan General Contracting & Oilfield Services',
                ],
                [
                    ['short_name_ar'],
                    'وادي الريان',
                ],
                [
                    ['short_name_en'],
                    'Wadi Al Rayan',
                ],

                [
                    ['company_description_ar', 'description_ar', 'about_ar'],
                    'شركة وادي الريان للمقاولات العامة والخدمات النفطية شركة متخصصة في تقديم الحلول المتكاملة لقطاعات النفط والغاز والبنية التحتية والمشاريع الإنشائية والصناعية. تجمع الشركة بين الخبرة الفنية والكفاءة التشغيلية لتوفير خدمات موثوقة وعالية الجودة تلبي احتياجات المشاريع المختلفة، وتشمل أعمالها المقاولات العامة والخدمات النفطية والأعمال الهندسية والبنية التحتية والطرق وخطوط الأنابيب وتأجير المعدات والآليات وتوفير القوى العاملة الفنية والتوريد والدعم اللوجستي.',
                ],
                [
                    ['company_description_en', 'description_en', 'about_en'],
                    'Wadi Al Rayan General Contracting & Oilfield Services provides integrated solutions for the oil and gas, infrastructure, construction and industrial sectors. Our capabilities cover general contracting, oilfield support, engineering, infrastructure and road works, pipeline support, equipment rental, technical manpower supply, procurement and logistics support.',
                ],

                [
                    ['vision_ar'],
                    'أن نكون من الشركات الموثوقة والرائدة في مجال المقاولات العامة والخدمات النفطية والبنية التحتية، وأن نساهم في تنفيذ مشاريع ذات قيمة مستدامة من خلال حلول عملية ومهنية ترتكز على الجودة والسلامة والكفاءة التشغيلية.',
                ],
                [
                    ['vision_en'],
                    'To be a trusted and leading provider of general contracting, oilfield services and infrastructure solutions, contributing to sustainable projects through professional execution, quality, safety and operational efficiency.',
                ],

                [
                    ['mission_ar'],
                    'تقديم خدمات وحلول متكاملة لقطاعات النفط والغاز والمقاولات والبنية التحتية من خلال الجمع بين الخبرة الفنية والموارد المؤهلة والإدارة الفعالة للمشاريع والالتزام بالجودة والسلامة.',
                ],
                [
                    ['mission_en'],
                    'To provide integrated services for oil and gas, construction and infrastructure projects by combining technical expertise, qualified resources, effective project management, quality and safety.',
                ],

                [
                    ['primary_color'],
                    '#13312A',
                ],
                [
                    ['secondary_color', 'accent_color'],
                    '#C69A72',
                ],

                [
                    ['footer_text_ar', 'footer_description_ar'],
                    'وادي الريان للمقاولات العامة والخدمات النفطية تقدم حلولاً متكاملة للمشاريع النفطية والإنشائية والبنية التحتية من خلال خدمات هندسية وتشغيلية موثوقة.',
                ],
                [
                    ['footer_text_en', 'footer_description_en'],
                    'Wadi Al Rayan General Contracting & Oilfield Services provides integrated solutions for oilfield, construction and infrastructure projects through reliable engineering and operational services.',
                ],

                [
                    ['default_seo_title_ar', 'seo_title_ar'],
                    'وادي الريان للمقاولات العامة والخدمات النفطية',
                ],
                [
                    ['default_seo_title_en', 'seo_title_en'],
                    'Wadi Al Rayan General Contracting & Oilfield Services',
                ],
                [
                    ['default_seo_description_ar', 'seo_description_ar'],
                    'حلول متكاملة في المقاولات العامة والخدمات النفطية والبنية التحتية والطرق وخطوط الأنابيب والمعدات والتوريد والخدمات الهندسية.',
                ],
                [
                    ['default_seo_description_en', 'seo_description_en'],
                    'Integrated general contracting, oilfield services, infrastructure, road works, pipeline support, equipment, procurement and engineering solutions.',
                ],
            ];

            $changed = false;

            foreach ($values as [$properties, $value]) {
                if ($this->seedFirstEmptySetting($settings, $properties, $value)) {
                    $changed = true;
                }
            }

            if ($changed && method_exists($settings, 'save')) {
                $settings->save();
            }

            $this->command?->info('Company settings seeded.');
        } catch (Throwable $e) {
            $this->command?->warn(
                'Company settings skipped: ' . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Homepage Settings
    |--------------------------------------------------------------------------
    */

    private function seedHomepageSettings(): void
    {
        if (! class_exists(\App\Settings\HomepageSettings::class)) {
            $this->command?->warn('HomepageSettings class not found - skipped.');
            return;
        }

        try {
            /** @var object $settings */
            $settings = app(\App\Settings\HomepageSettings::class);

            /*
            |------------------------------------------------------------------
            | Important
            |------------------------------------------------------------------
            |
            | These property names match the actual HomepageSettings structure
            | used by the project (hero_title, hero_subtitle, CTA labels, etc.).
            | Values are only written when the current setting is empty so later
            | edits made by the site administrator are preserved.
            |
            */
            $values = [
                [
                    ['hero_title'],
                    [
                        'ar' => 'حلول متكاملة للمقاولات والخدمات النفطية',
                        'en' => 'Integrated Solutions for Contracting & Oilfield Services',
                    ],
                ],
                [
                    ['hero_subtitle'],
                    [
                        'ar' => 'نقدم حلولاً متكاملة لقطاعات النفط والغاز والبنية التحتية والمشاريع الإنشائية، من التخطيط والدراسات الهندسية إلى التنفيذ والتوريد والدعم التشغيلي.',
                        'en' => 'Supporting oil and gas, infrastructure and construction projects through engineering, execution, procurement and operational support.',
                    ],
                ],
                [
                    ['primary_cta_label'],
                    [
                        'ar' => 'اطلب عرض سعر',
                        'en' => 'Request a Quote',
                    ],
                ],
                [
                    ['primary_cta_url'],
                    '/rfq',
                ],
                [
                    ['secondary_cta_label'],
                    [
                        'ar' => 'استكشف خدماتنا',
                        'en' => 'Explore Our Services',
                    ],
                ],
                [
                    ['secondary_cta_url'],
                    '/services',
                ],
                [
                    ['about_heading'],
                    [
                        'ar' => 'شريك موثوق للمشاريع الطموحة',
                        'en' => 'A Trusted Partner for Ambitious Projects',
                    ],
                ],
                [
                    ['about_content'],
                    [
                        'ar' => 'في وادي الريان نعمل على توفير منظومة متكاملة من الخدمات التي تساعد عملاءنا على تنفيذ مشاريعهم بكفاءة، بداية من الدراسات والتخطيط وحتى توفير الموارد والمعدات والتنفيذ والدعم التشغيلي. نعتمد على فهم متطلبات كل مشروع واختيار الحلول المناسبة لطبيعة الموقع ونطاق الأعمال، مع التركيز على الجودة والسلامة والالتزام.',
                        'en' => 'At Wadi Al Rayan, we provide integrated services that support our clients throughout the project lifecycle — from engineering and planning to resource mobilization, execution, supply and operational support. We focus on understanding each project requirement and delivering practical solutions with a strong commitment to quality, safety and reliability.',
                    ],
                ],
                [
                    ['why_choose_us_intro'],
                    [
                        'ar' => 'حلول متكاملة تجمع بين الخبرة الفنية والموثوقية والمرونة التشغيلية والالتزام بالجودة والسلامة.',
                        'en' => 'Integrated solutions built around technical expertise, reliability, operational flexibility, quality and safety.',
                    ],
                ],
                [
                    ['hse_intro'],
                    [
                        'ar' => 'نضع الصحة والسلامة والبيئة في صميم عملياتنا، ونعمل على تعزيز الممارسات المسؤولة وتقييم المخاطر وحماية الأفراد والمعدات والمواقع.',
                        'en' => 'We place health, safety and environmental responsibility at the center of our operations through responsible practices, risk awareness and protection of people, equipment and sites.',
                    ],
                ],
                [
                    ['final_cta_content'],
                    [
                        'ar' => 'هل تبحث عن شريك موثوق لمشروعك القادم؟ تواصل معنا لدراسة متطلبات مشروعك وتقديم الحل المناسب.',
                        'en' => 'Looking for a reliable partner for your next project? Contact us to review your requirements and identify the right solution.',
                    ],
                ],
            ];

            foreach ($values as [$properties, $value]) {
                $this->seedFirstEmptySetting($settings, $properties, $value);
            }

            // The statistics setting now exists through its dedicated settings migration.
            // Keep it empty until real company figures are provided.
            $this->seedFirstEmptySetting(
                $settings,
                ['statistics'],
                []
            );

            if (method_exists($settings, 'save')) {
                $settings->save();
            }

            $this->command?->info('Homepage settings seeded.');
        } catch (Throwable $e) {
            $this->command?->warn(
                'Homepage settings skipped: ' . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Industries
    |--------------------------------------------------------------------------
    */

    private function seedIndustries(): array
    {
        if (! class_exists(Industry::class)) {
            $this->command?->warn('Industry model not found - skipped.');
            return [];
        }

        $items = [
            [
                'slug' => 'oil-gas',
                'name' => [
                    'ar' => 'النفط والغاز',
                    'en' => 'Oil & Gas',
                ],
                'description' => [
                    'ar' => 'حلول وخدمات مساندة للمشاريع والعمليات النفطية والغازية تشمل الدعم الفني والتشغيلي والمعدات والتوريد والخدمات المدنية والهندسية.',
                    'en' => 'Integrated technical, operational, equipment, procurement, civil and engineering support for oil and gas projects and field operations.',
                ],
                'featured' => true,
                'order' => 1,
            ],
            [
                'slug' => 'infrastructure',
                'name' => [
                    'ar' => 'البنية التحتية',
                    'en' => 'Infrastructure',
                ],
                'description' => [
                    'ar' => 'تنفيذ ودعم مشاريع البنية التحتية من تجهيز المواقع والتسوية والردم والدك إلى الطرق والأعمال المدنية والحمايات.',
                    'en' => 'Infrastructure solutions covering site preparation, grading, filling, compaction, roads, civil works and protection systems.',
                ],
                'featured' => true,
                'order' => 2,
            ],
            [
                'slug' => 'construction-contracting',
                'name' => [
                    'ar' => 'الإنشاءات والمقاولات',
                    'en' => 'Construction & Contracting',
                ],
                'description' => [
                    'ar' => 'خدمات مقاولات وأعمال مدنية وإنشائية تبدأ بالتخطيط وتجهيز الموقع وتمتد إلى التنفيذ والإشراف ودعم إنجاز المشروع.',
                    'en' => 'Civil and construction contracting services from planning and site preparation through execution, supervision and project support.',
                ],
                'featured' => true,
                'order' => 3,
            ],
            [
                'slug' => 'industrial-projects',
                'name' => [
                    'ar' => 'المشاريع الصناعية',
                    'en' => 'Industrial Projects',
                ],
                'description' => [
                    'ar' => 'خدمات هندسية وتشغيلية وتوريدية لدعم احتياجات المشاريع والمنشآت الصناعية المختلفة.',
                    'en' => 'Engineering, operational and procurement support for industrial facilities and project environments.',
                ],
                'featured' => true,
                'order' => 4,
            ],
            [
                'slug' => 'roads-transportation',
                'name' => [
                    'ar' => 'الطرق والنقل',
                    'en' => 'Roads & Transportation',
                ],
                'description' => [
                    'ar' => 'إنشاء وتأهيل الطرق والمسارات وأعمال الأسفلت والتسوية والدك وطرق الوصول في المواقع المختلفة بما فيها المناطق الوعرة.',
                    'en' => 'Construction and development of roads and access routes, including asphalt, grading, compaction and works in challenging terrain.',
                ],
                'featured' => true,
                'order' => 5,
            ],
            [
                'slug' => 'pipeline-projects',
                'name' => [
                    'ar' => 'مشاريع خطوط الأنابيب',
                    'en' => 'Pipeline Projects',
                ],
                'description' => [
                    'ar' => 'خدمات مدنية وهندسية لدعم مسارات وخطوط الأنابيب وأعمال التثبيت والحفر والردم والحماية وتجهيز المواقع.',
                    'en' => 'Civil and engineering support for pipeline routes, anchors, excavation, backfilling, protection and site preparation.',
                ],
                'featured' => false,
                'order' => 6,
            ],
            [
                'slug' => 'civil-projects',
                'name' => [
                    'ar' => 'المشاريع المدنية',
                    'en' => 'Civil Projects',
                ],
                'description' => [
                    'ar' => 'أعمال مدنية وإنشائية وحلول ميدانية للمواقع والمرافق والمشاريع التنموية.',
                    'en' => 'Civil, structural and site solutions supporting facilities, infrastructure and development projects.',
                ],
                'featured' => false,
                'order' => 7,
            ],
        ];

        $created = [];

        foreach ($items as $item) {
            $table = (new Industry())->getTable();

            $attributes = [
                'slug' => $item['slug'],
            ];

            $this->putColumn(
                $attributes,
                $table,
                ['name', 'title'],
                $item['name']
            );

            $this->putColumn(
                $attributes,
                $table,
                ['description', 'short_description'],
                $item['description']
            );

            $this->putColumn(
                $attributes,
                $table,
                ['is_active', 'active'],
                true
            );

            $this->putColumn(
                $attributes,
                $table,
                ['is_featured', 'featured'],
                $item['featured']
            );

            $this->putColumn(
                $attributes,
                $table,
                ['sort_order', 'order'],
                $item['order']
            );

            // firstOrCreate يحافظ على تعديلات الإدارة إذا شغلت Seeder مرة أخرى.
            $industry = Industry::query()->firstOrCreate(
                ['slug' => $item['slug']],
                $attributes
            );

            $created[$item['slug']] = $industry;
        }

        $this->command?->info(
            count($items) . ' industries ensured.'
        );

        return $created;
    }

    /*
    |--------------------------------------------------------------------------
    | Equipment Categories
    |--------------------------------------------------------------------------
    */

    private function seedEquipmentCategories(): void
    {
        if (! class_exists(EquipmentCategory::class)) {
            $this->command?->warn(
                'EquipmentCategory model not found - skipped.'
            );
            return;
        }

        $items = [
            [
                'slug' => 'excavators',
                'ar' => 'الحفارات',
                'en' => 'Excavators',
            ],
            [
                'slug' => 'cranes',
                'ar' => 'الرافعات',
                'en' => 'Cranes',
            ],
            [
                'slug' => 'wheel-loaders',
                'ar' => 'الشيولات',
                'en' => 'Wheel Loaders',
            ],
            [
                'slug' => 'bulldozers',
                'ar' => 'الجرافات',
                'en' => 'Bulldozers',
            ],
            [
                'slug' => 'road-equipment',
                'ar' => 'معدات الطرق',
                'en' => 'Road Equipment',
            ],
            [
                'slug' => 'trucks-transport',
                'ar' => 'الشاحنات ومركبات النقل',
                'en' => 'Trucks & Transport Vehicles',
            ],
            [
                'slug' => '4x4-vehicles',
                'ar' => 'مركبات الدفع الرباعي',
                'en' => '4x4 Vehicles',
            ],
            [
                'slug' => 'compaction-grading',
                'ar' => 'معدات الدك والتسوية',
                'en' => 'Compaction & Grading Equipment',
            ],
        ];

        $model = new EquipmentCategory();
        $table = $model->getTable();

        foreach ($items as $index => $item) {
            $where = [];

            if (Schema::hasColumn($table, 'slug')) {
                $where['slug'] = $item['slug'];
            } else {
                // إذا جدولك ليس فيه slug، نبحث بالاسم.
                $where['name'] = [
                    'ar' => $item['ar'],
                    'en' => $item['en'],
                ];
            }

            $attributes = [];

            $this->putColumn(
                $attributes,
                $table,
                ['slug'],
                $item['slug']
            );

            $this->putColumn(
                $attributes,
                $table,
                ['name', 'title'],
                [
                    'ar' => $item['ar'],
                    'en' => $item['en'],
                ]
            );

            $this->putColumn(
                $attributes,
                $table,
                ['is_active', 'active'],
                true
            );

            $this->putColumn(
                $attributes,
                $table,
                ['sort_order', 'order'],
                $index + 1
            );

            EquipmentCategory::query()->firstOrCreate(
                $where,
                $attributes
            );
        }

        $this->command?->info(
            count($items) . ' equipment categories ensured.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    private function seedServices(array $industries): void
    {
        if (! class_exists(Service::class)) {
            $this->command?->warn('Service model not found - skipped.');
            return;
        }

        $services = $this->servicesData();

        foreach ($services as $serviceData) {
            $service = $this->createService($serviceData);

            if (! $service) {
                continue;
            }

            // اربط الخدمات بالقطاعات فقط إذا كانت Relation موجودة بالفعل.
            if (
                method_exists($service, 'industries')
                && ! empty($serviceData['industries'])
            ) {
                $ids = collect($serviceData['industries'])
                    ->map(fn (string $slug) => ($industries[$slug] ?? null)?->getKey())
                    ->filter()
                    ->values()
                    ->all();

                if ($ids !== []) {
                    try {
                        $service->industries()->syncWithoutDetaching($ids);
                    } catch (Throwable $e) {
                        $this->command?->warn(
                            "Could not link industries to {$serviceData['slug']}: {$e->getMessage()}"
                        );
                    }
                }
            }
        }

        $this->command?->info(
            count($services) . ' services ensured.'
        );
    }

    private function createService(array $item): ?Service
    {
        $model = new Service();
        $table = $model->getTable();

        if (! Schema::hasColumn($table, 'slug')) {
            $this->command?->warn(
                'services.slug column not found - services seeding stopped.'
            );

            return null;
        }

        $attributes = [
            'slug' => $item['slug'],
        ];

        $this->putColumn(
            $attributes,
            $table,
            ['title', 'name'],
            $item['title']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['short_description', 'description_short'],
            $item['short']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['full_description', 'description_full'],
            $item['full']
        );

        /*
        |------------------------------------------------------------------
        | Legacy required description column
        |------------------------------------------------------------------
        |
        | The original services table still contains a NOT NULL description
        | column. It is populated in addition to full_description so MySQL
        | can insert the row safely without changing the existing schema.
        |
        */
        if (Schema::hasColumn($table, 'description')) {
            $legacyDescription = $item['full']['ar'];

            if (
                method_exists($model, 'getTranslatableAttributes')
                && in_array('description', $model->getTranslatableAttributes(), true)
            ) {
                $legacyDescription = $item['full'];
            }

            $attributes['description'] = $legacyDescription;
        }

        $this->putColumn(
            $attributes,
            $table,
            ['capabilities'],
            $item['capabilities']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['scope_of_work', 'scope'],
            $item['scope']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['applications'],
            $item['applications']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['is_featured', 'featured'],
            $item['featured']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['is_active', 'active'],
            true
        );

        $this->putColumn(
            $attributes,
            $table,
            ['sort_order', 'order'],
            $item['order']
        );

        $this->putColumn(
            $attributes,
            $table,
            ['meta_title'],
            [
                'ar' => $item['title']['ar'] . ' | وادي الريان',
                'en' => $item['title']['en'] . ' | Wadi Al Rayan',
            ]
        );

        $this->putColumn(
            $attributes,
            $table,
            ['meta_description'],
            $item['short']
        );

        /*
        |------------------------------------------------------------------
        | Preserve existing administrator edits
        |------------------------------------------------------------------
        |
        | If this service already exists, return it without overwriting any
        | content that may have been edited later from Filament.
        |
        */
        $existing = Service::query()
            ->where('slug', $item['slug'])
            ->first();

        if ($existing) {
            return $existing;
        }

        /*
        |------------------------------------------------------------------
        | Create without mass-assignment restrictions
        |------------------------------------------------------------------
        |
        | forceFill is deliberately limited to this trusted seeder so legacy
        | columns not present in $fillable (such as description) are inserted.
        | This does not weaken mass-assignment protection elsewhere.
        |
        */
        $service = new Service();
        $service->forceFill($attributes);
        $service->save();

        return $service;
    }

    private function servicesData(): array
    {
        return [
            [
                'order' => 1,
                'slug' => 'oilfield-services',
                'featured' => true,
                'title' => [
                    'ar' => 'الخدمات النفطية',
                    'en' => 'Oilfield Services',
                ],
                'short' => [
                    'ar' => 'حلول وخدمات متكاملة لدعم عمليات ومشاريع النفط والغاز وتلبية الاحتياجات التشغيلية والفنية للمواقع.',
                    'en' => 'Integrated support services for oil and gas operations, projects and field requirements.',
                ],
                'full' => [
                    'ar' => 'تقدم وادي الريان مجموعة متكاملة من الخدمات المساندة لقطاع النفط والغاز، بهدف دعم المشاريع والمواقع التشغيلية وتوفير الموارد والمعدات والخدمات الفنية واللوجستية اللازمة لتنفيذ الأعمال بكفاءة. ويقوم نهجنا على فهم متطلبات المشروع وتوفير الحلول المناسبة لطبيعة الموقع ونطاق الأعمال.',
                    'en' => 'Wadi Al Rayan provides integrated support services for the oil and gas sector, helping projects and field operations access the technical resources, equipment, logistics and operational support required for efficient execution.',
                ],
                'capabilities' => [
                    'ar' => 'توفير القوى العاملة الفنية، المعدات والمركبات، الدعم اللوجستي، التوريد، تجهيز المواقع والخدمات الهندسية المساندة.',
                    'en' => 'Technical manpower, equipment and vehicles, logistics support, procurement, site support and engineering services.',
                ],
                'scope' => [
                    'ar' => 'دعم المواقع النفطية، توفير الموارد، توريد المستلزمات، الأعمال المدنية المساندة، وتجهيز احتياجات التشغيل وفق نطاق المشروع.',
                    'en' => 'Oilfield site support, resource mobilization, procurement, supporting civil works and operational requirements according to project scope.',
                ],
                'applications' => [
                    'ar' => 'المواقع النفطية، المشاريع الصناعية، خطوط الأنابيب، مواقع التشغيل والدعم الميداني.',
                    'en' => 'Oilfield sites, industrial projects, pipeline projects, field operations and site support.',
                ],
                'industries' => [
                    'oil-gas',
                    'pipeline-projects',
                    'industrial-projects',
                ],
            ],

            [
                'order' => 2,
                'slug' => 'general-contracting',
                'featured' => true,
                'title' => [
                    'ar' => 'المقاولات العامة',
                    'en' => 'General Contracting',
                ],
                'short' => [
                    'ar' => 'تنفيذ الأعمال المدنية والإنشائية والبنية التحتية وفق متطلبات المشروع والمواصفات الفنية.',
                    'en' => 'Civil, construction and infrastructure works delivered according to project requirements and technical specifications.',
                ],
                'full' => [
                    'ar' => 'تقدم وادي الريان خدمات المقاولات العامة للمشاريع الإنشائية والمدنية، بداية من التخطيط وتجهيز الموقع وحتى التنفيذ والإشراف وإنجاز الأعمال المطلوبة وفق نطاق المشروع. وتركز الشركة على تنظيم مراحل التنفيذ وتوفير الموارد المناسبة ومتابعة الأعمال بما يدعم الجودة والدقة والالتزام.',
                    'en' => 'Wadi Al Rayan provides general contracting services for civil and construction projects, covering planning, site preparation, execution and project support in accordance with the required scope and specifications.',
                ],
                'capabilities' => [
                    'ar' => 'أعمال مدنية، إنشاءات، تجهيز المواقع، تنفيذ البنية التحتية، الإشراف والتنسيق الميداني.',
                    'en' => 'Civil works, construction, site preparation, infrastructure execution, supervision and field coordination.',
                ],
                'scope' => [
                    'ar' => 'من التخطيط وتجهيز الموقع إلى التنفيذ والإشراف ومعالجة متطلبات الأعمال المدنية والإنشائية.',
                    'en' => 'From planning and site preparation through execution, supervision and civil construction requirements.',
                ],
                'applications' => [
                    'ar' => 'المشاريع الإنشائية، المنشآت، مشاريع البنية التحتية والمرافق المدنية.',
                    'en' => 'Construction projects, facilities, infrastructure and civil development works.',
                ],
                'industries' => [
                    'construction-contracting',
                    'infrastructure',
                    'civil-projects',
                ],
            ],

            [
                'order' => 3,
                'slug' => 'infrastructure-works',
                'featured' => true,
                'title' => [
                    'ar' => 'أعمال البنية التحتية',
                    'en' => 'Infrastructure Works',
                ],
                'short' => [
                    'ar' => 'تنفيذ وتجهيز مشاريع البنية التحتية والأعمال المدنية للمواقع والمرافق المختلفة.',
                    'en' => 'Infrastructure and civil works supporting project sites, facilities and development projects.',
                ],
                'full' => [
                    'ar' => 'تشمل خدمات البنية التحتية تجهيز المواقع والتسوية والردم والدك والطرق والأعمال الخرسانية والحمايات والأعمال المدنية المساندة للمشاريع. ويتم التعامل مع كل موقع وفق طبيعته ومتطلبات التنفيذ والمواصفات المعتمدة.',
                    'en' => 'Our infrastructure capabilities include site preparation, grading, filling, compaction, road works, concrete works, protection systems and supporting civil works.',
                ],
                'capabilities' => [
                    'ar' => 'تجهيز المواقع، التسوية، الردم، الدك، الطرق، الأعمال الخرسانية والحمايات.',
                    'en' => 'Site preparation, grading, filling, compaction, roads, concrete works and protection systems.',
                ],
                'scope' => [
                    'ar' => 'أعمال الموقع والأعمال الترابية والمدنية والبنية التحتية المرتبطة بالمشروع.',
                    'en' => 'Site, earthworks, civil and infrastructure activities associated with project execution.',
                ],
                'applications' => [
                    'ar' => 'مواقع المشاريع، الطرق، المرافق، المشاريع المدنية والتنموية.',
                    'en' => 'Project sites, roads, facilities and civil development projects.',
                ],
                'industries' => [
                    'infrastructure',
                    'roads-transportation',
                    'civil-projects',
                ],
            ],

            [
                'order' => 4,
                'slug' => 'road-construction',
                'featured' => true,
                'title' => [
                    'ar' => 'إنشاء وتأهيل الطرق',
                    'en' => 'Road Construction & Development',
                ],
                'short' => [
                    'ar' => 'تنفيذ وتأهيل الطرق والشوارع والمسارات في المناطق المختلفة بما فيها المواقع الجبلية والوعرة.',
                    'en' => 'Construction and development of roads and access routes, including challenging and mountainous terrain.',
                ],
                'full' => [
                    'ar' => 'تقدم وادي الريان خدمات إنشاء وتأهيل الطرق وطرق الوصول، بما يشمل أعمال الرصف والأسفلت والطرق الخرسانية والتسوية والردم والدك وفتح المسارات وتجهيزها، مع القدرة على التعامل مع المواقع الجبلية والمرتفعات والمناطق الوعرة بحسب متطلبات المشروع.',
                    'en' => 'Wadi Al Rayan supports road construction and access-route development through paving, asphalt works, concrete roads, grading, filling, compaction and route preparation, including demanding terrain where project requirements call for specialized site works.',
                ],
                'capabilities' => [
                    'ar' => 'الرصف، الأسفلت، صبيات الطرق، التسوية، الردم، الدك وفتح وتجهيز طرق الوصول.',
                    'en' => 'Paving, asphalt works, concrete roads, grading, filling, compaction and access-road preparation.',
                ],
                'scope' => [
                    'ar' => 'إنشاء وتأهيل الطرق والمسارات وتجهيز طرق الوصول المرتبطة بالمواقع والمشاريع.',
                    'en' => 'Construction, rehabilitation and preparation of roads and access routes supporting project sites.',
                ],
                'applications' => [
                    'ar' => 'طرق المشاريع، الطرق الجبلية، الطرق الترابية، الشوارع ومسارات الوصول.',
                    'en' => 'Project roads, mountain roads, unpaved roads, streets and access routes.',
                ],
                'industries' => [
                    'roads-transportation',
                    'infrastructure',
                ],
            ],

            [
                'order' => 5,
                'slug' => 'pipeline-support-services',
                'featured' => true,
                'title' => [
                    'ar' => 'خدمات خطوط الأنابيب',
                    'en' => 'Pipeline Support Services',
                ],
                'short' => [
                    'ar' => 'أعمال مدنية وهندسية مساندة لمشاريع ومسارات خطوط الأنابيب.',
                    'en' => 'Civil and engineering support for pipeline projects and pipeline routes.',
                ],
                'full' => [
                    'ar' => 'تقدم الشركة أعمالاً مساندة لمشاريع خطوط الأنابيب تشمل الأعمال المدنية المرتبطة بالمسارات وتجهيز المواقع والحفر والردم والحمايات وتنفيذ الأنكرات الخاصة بخطوط الأنابيب وفق متطلبات التصميم ونطاق العمل.',
                    'en' => 'The company provides supporting civil and engineering works for pipeline projects, including route preparation, excavation, backfilling, protection works and pipeline anchors according to project design and scope requirements.',
                ],
                'capabilities' => [
                    'ar' => 'أنكرات خطوط الأنابيب، تجهيز المسارات، الحفر، الردم، الحمايات والأعمال المدنية.',
                    'en' => 'Pipeline anchors, route preparation, excavation, backfilling, protection works and civil support.',
                ],
                'scope' => [
                    'ar' => 'أعمال دعم مسارات الأنابيب وتجهيزها وحمايتها وتنفيذ المتطلبات المدنية المرتبطة بها.',
                    'en' => 'Pipeline route support, preparation, protection and associated civil requirements.',
                ],
                'applications' => [
                    'ar' => 'مشاريع خطوط الأنابيب النفطية والصناعية ومسارات الربط بين المواقع.',
                    'en' => 'Oilfield and industrial pipeline projects and inter-site pipeline routes.',
                ],
                'industries' => [
                    'oil-gas',
                    'pipeline-projects',
                ],
            ],

            [
                'order' => 6,
                'slug' => 'equipment-rental',
                'featured' => true,
                'title' => [
                    'ar' => 'تأجير المعدات والآليات الثقيلة',
                    'en' => 'Equipment & Heavy Machinery Rental',
                ],
                'short' => [
                    'ar' => 'توفير معدات وآليات ومركبات مناسبة لدعم الأعمال النفطية والإنشائية ومشاريع البنية التحتية.',
                    'en' => 'Equipment, heavy machinery and vehicles supporting oilfield, construction and infrastructure operations.',
                ],
                'full' => [
                    'ar' => 'توفر وادي الريان حلول تأجير المعدات والآليات والمركبات وفق احتياجات المشروع وطبيعة الموقع، بما يساعد فرق التنفيذ على الوصول إلى الموارد التشغيلية المناسبة للأعمال المدنية والإنشائية والنفطية.',
                    'en' => 'Wadi Al Rayan provides equipment, heavy machinery and vehicle rental solutions aligned with project requirements and site conditions, supporting civil, construction and oilfield operations.',
                ],
                'capabilities' => [
                    'ar' => 'الحفارات، الرافعات، الشيولات، الجرافات، معدات الطرق، الشاحنات والمركبات حسب الأسطول الفعلي المتاح.',
                    'en' => 'Excavators, cranes, loaders, bulldozers, road equipment, trucks and vehicles subject to the company actual available fleet.',
                ],
                'scope' => [
                    'ar' => 'توفير المعدات المناسبة للمشروع وفق مدة ونطاق ومتطلبات التشغيل.',
                    'en' => 'Provision of suitable equipment according to project duration, scope and operational requirements.',
                ],
                'applications' => [
                    'ar' => 'النفط والغاز، المقاولات، الطرق، البنية التحتية والأعمال الميدانية.',
                    'en' => 'Oil and gas, contracting, roads, infrastructure and field operations.',
                ],
                'industries' => [
                    'oil-gas',
                    'infrastructure',
                    'construction-contracting',
                    'roads-transportation',
                ],
            ],

            [
                'order' => 7,
                'slug' => 'technical-manpower-supply',
                'featured' => false,
                'title' => [
                    'ar' => 'توفير القوى العاملة الفنية',
                    'en' => 'Technical Manpower Supply',
                ],
                'short' => [
                    'ar' => 'توفير كوادر فنية ومهنية متخصصة حسب احتياجات المشاريع والمواقع التشغيلية.',
                    'en' => 'Qualified technical and professional manpower supplied according to project and operational requirements.',
                ],
                'full' => [
                    'ar' => 'تعمل وادي الريان على توفير القوى العاملة الفنية والمهنية المناسبة لطبيعة المشاريع، بما يدعم احتياجات المواقع النفطية والإنشائية والصناعية وفق نطاق العمل والمتطلبات التشغيلية.',
                    'en' => 'Wadi Al Rayan supports projects with technical and professional manpower aligned with operational requirements across oilfield, construction and industrial environments.',
                ],
                'capabilities' => [
                    'ar' => 'كوادر هندسية وفنية وتشغيلية ومساندة وفق احتياجات المشروع والتخصصات المتاحة.',
                    'en' => 'Engineering, technical, operational and support personnel according to project requirements and available specializations.',
                ],
                'scope' => [
                    'ar' => 'توفير الموارد البشرية الفنية للمشروعات والمواقع وفق الاحتياجات التشغيلية.',
                    'en' => 'Provision of technical manpower for projects and operational sites.',
                ],
                'applications' => [
                    'ar' => 'المشاريع النفطية، الإنشائية، الصناعية ومواقع التشغيل.',
                    'en' => 'Oilfield, construction, industrial and operational project sites.',
                ],
                'industries' => [
                    'oil-gas',
                    'construction-contracting',
                    'industrial-projects',
                ],
            ],

            [
                'order' => 8,
                'slug' => 'engineering-consultancy',
                'featured' => true,
                'title' => [
                    'ar' => 'الدراسات والاستشارات الهندسية',
                    'en' => 'Engineering Studies & Consultancy',
                ],
                'short' => [
                    'ar' => 'إعداد الدراسات والخطط والمخططات والتصاميم الهندسية التي تساعد على نجاح المشاريع.',
                    'en' => 'Engineering studies, plans and designs supporting informed project planning and execution.',
                ],
                'full' => [
                    'ar' => 'نؤمن بأن نجاح المشروع يبدأ من التخطيط السليم، ولذلك تشمل خدماتنا إعداد الدراسات الفنية والخطط التنفيذية والمخططات والتصاميم الهندسية ودعم اتخاذ القرارات الفنية بما يتوافق مع احتياجات المشروع.',
                    'en' => 'We believe successful projects begin with sound planning. Our engineering support includes technical studies, execution planning, drawings and design support aligned with project requirements.',
                ],
                'capabilities' => [
                    'ar' => 'الدراسات الفنية، التخطيط التنفيذي، المخططات، التصاميم، المراجعات والدعم الهندسي.',
                    'en' => 'Technical studies, execution planning, drawings, design, technical reviews and engineering support.',
                ],
                'scope' => [
                    'ar' => 'الدراسة والتخطيط والتصميم والدعم الفني قبل وأثناء مراحل التنفيذ.',
                    'en' => 'Studies, planning, design and technical support before and during project execution.',
                ],
                'applications' => [
                    'ar' => 'مشاريع النفط والغاز والبنية التحتية والإنشاءات والمشاريع الصناعية.',
                    'en' => 'Oil and gas, infrastructure, construction and industrial projects.',
                ],
                'industries' => [
                    'oil-gas',
                    'infrastructure',
                    'construction-contracting',
                    'industrial-projects',
                ],
            ],

            [
                'order' => 9,
                'slug' => 'procurement-supply',
                'featured' => false,
                'title' => [
                    'ar' => 'التوريد',
                    'en' => 'Procurement & Supply',
                ],
                'short' => [
                    'ar' => 'توفير المواد والمستلزمات والمعدات اللازمة للمشاريع النفطية والإنشائية والصناعية.',
                    'en' => 'Procurement and supply of materials, equipment and operational requirements for oilfield, construction and industrial projects.',
                ],
                'full' => [
                    'ar' => 'تقدم الشركة خدمات توريد المواد والمستلزمات والمعدات اللازمة للمشاريع، مع التركيز على مطابقة الاحتياجات الفنية والتنظيم الجيد لعملية التوريد بما يدعم استمرارية التنفيذ.',
                    'en' => 'The company supports projects with procurement and supply of materials, equipment and operational requirements, focusing on technical suitability and organized delivery.',
                ],
                'capabilities' => [
                    'ar' => 'مواد ومستلزمات تشغيلية، معدات سلامة، أدوات فنية واحتياجات المواقع وفق طلب المشروع.',
                    'en' => 'Operational materials, safety equipment, technical tools and site requirements according to project needs.',
                ],
                'scope' => [
                    'ar' => 'تحديد الاحتياج وتوفير المواد والمستلزمات المطلوبة وفق متطلبات المشروع.',
                    'en' => 'Identification and supply of materials and operational requirements based on project needs.',
                ],
                'applications' => [
                    'ar' => 'المشاريع النفطية والصناعية والإنشائية ومواقع التشغيل.',
                    'en' => 'Oilfield, industrial, construction and operational sites.',
                ],
                'industries' => [
                    'oil-gas',
                    'industrial-projects',
                    'construction-contracting',
                ],
            ],

            [
                'order' => 10,
                'slug' => 'logistics-support',
                'featured' => false,
                'title' => [
                    'ar' => 'الدعم اللوجستي',
                    'en' => 'Logistics Support',
                ],
                'short' => [
                    'ar' => 'حلول لوجستية لدعم نقل وتوفير الموارد والمعدات والمواد اللازمة لتنفيذ المشاريع.',
                    'en' => 'Logistics solutions supporting the movement and availability of project resources, equipment and materials.',
                ],
                'full' => [
                    'ar' => 'نوفر الدعم اللوجستي الذي يساعد على تنظيم حركة الموارد والمعدات والمواد إلى مواقع المشاريع بما يتناسب مع خطة التنفيذ ومتطلبات العمل.',
                    'en' => 'We provide logistics support to coordinate the movement and availability of resources, equipment and materials in line with project execution requirements.',
                ],
                'capabilities' => [
                    'ar' => 'دعم حركة الموارد والمعدات والمواد وتنظيم احتياجات المواقع.',
                    'en' => 'Support for the movement of project resources, equipment, materials and site requirements.',
                ],
                'scope' => [
                    'ar' => 'المساندة اللوجستية المرتبطة بتنفيذ وتشغيل المشاريع.',
                    'en' => 'Logistics support associated with project execution and operations.',
                ],
                'applications' => [
                    'ar' => 'المواقع النفطية والإنشائية والبنية التحتية والمشاريع الصناعية.',
                    'en' => 'Oilfield, construction, infrastructure and industrial project sites.',
                ],
                'industries' => [
                    'oil-gas',
                    'infrastructure',
                    'construction-contracting',
                ],
            ],

            [
                'order' => 11,
                'slug' => 'hesco-protection',
                'featured' => false,
                'title' => [
                    'ar' => 'أعمال حمايات الهيسكو',
                    'en' => 'HESCO Protection Works',
                ],
                'short' => [
                    'ar' => 'تنفيذ أنظمة وحمايات HESCO للمواقع والمنشآت وفق متطلبات الحماية وطبيعة الموقع.',
                    'en' => 'HESCO protection solutions for project sites and facilities based on site and protection requirements.',
                ],
                'full' => [
                    'ar' => 'تقدم وادي الريان أعمال حمايات HESCO للمواقع والمنشآت ضمن نطاق الأعمال المدنية والحماية الميدانية، ويتم تنفيذها وفق طبيعة الموقع ومتطلبات المشروع.',
                    'en' => 'Wadi Al Rayan provides HESCO protection works for project sites and facilities as part of civil and site-protection requirements.',
                ],
                'capabilities' => [
                    'ar' => 'تجهيز وتنفيذ حمايات HESCO للمواقع والمرافق حسب نطاق المشروع.',
                    'en' => 'Preparation and installation of HESCO protection systems according to project scope.',
                ],
                'scope' => [
                    'ar' => 'أعمال الحماية الميدانية للمواقع والمنشآت والمرافق.',
                    'en' => 'Site and facility protection works.',
                ],
                'applications' => [
                    'ar' => 'مواقع المشاريع والمنشآت والبنية التحتية والمواقع التشغيلية.',
                    'en' => 'Project sites, facilities, infrastructure and operational locations.',
                ],
                'industries' => [
                    'oil-gas',
                    'infrastructure',
                    'civil-projects',
                ],
            ],

            [
                'order' => 12,
                'slug' => 'bridges-civil-structures',
                'featured' => false,
                'title' => [
                    'ar' => 'الجسور والمنشآت المدنية',
                    'en' => 'Bridges & Civil Structures',
                ],
                'short' => [
                    'ar' => 'تنفيذ الأعمال المدنية والإنشائية المتعلقة بالجسور والمنشآت وفق التصاميم والمواصفات الفنية.',
                    'en' => 'Civil and structural works for bridges and related infrastructure according to approved engineering requirements.',
                ],
                'full' => [
                    'ar' => 'تشمل قدرات الشركة تنفيذ الأعمال المدنية والإنشائية المتعلقة بالجسور الأرضية والمعلقة والمنشآت المرتبطة بها، وفق نطاق العمل والدراسات والمخططات والمواصفات الفنية المعتمدة للمشروع.',
                    'en' => 'The company supports civil and structural works associated with ground and suspended bridges and related structures according to project scope, engineering design and approved technical specifications.',
                ],
                'capabilities' => [
                    'ar' => 'الجسور الأرضية والمعلقة والأعمال المدنية والخرسانية والإنشائية المرتبطة بها.',
                    'en' => 'Ground and suspended bridges and associated civil, concrete and structural works.',
                ],
                'scope' => [
                    'ar' => 'تنفيذ الأعمال المدنية والإنشائية المرتبطة بالجسور والمنشآت.',
                    'en' => 'Execution of civil and structural works associated with bridges and related structures.',
                ],
                'applications' => [
                    'ar' => 'مشاريع الطرق والبنية التحتية والمشاريع المدنية.',
                    'en' => 'Road, infrastructure and civil development projects.',
                ],
                'industries' => [
                    'infrastructure',
                    'roads-transportation',
                    'civil-projects',
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * ضع القيمة في أول عمود موجود من الأسماء المقترحة.
     */
    private function putColumn(
        array &$attributes,
        string $table,
        array $columns,
        mixed $value
    ): void {
        foreach ($columns as $column) {
            if (Schema::hasColumn($table, $column)) {
                $attributes[$column] = $value;
                return;
            }
        }
    }

    /**
     * املأ أول خاصية موجودة وفارغة فقط.
     * هذا يمنع Seeder من مسح تعديلات المدير لاحقاً.
     */
    private function seedFirstEmptySetting(
        object $settings,
        array $properties,
        mixed $value
    ): bool {
        foreach ($properties as $property) {
            if (! property_exists($settings, $property)) {
                continue;
            }

            try {
                $reflection = new ReflectionProperty(
                    $settings,
                    $property
                );

                $initialized = $reflection->isInitialized($settings);

                if ($initialized) {
                    $current = $settings->{$property};

                    if (! $this->isEmptyValue($current)) {
                        return false;
                    }
                }

                $settings->{$property} = $value;

                return true;
            } catch (Throwable $e) {
                $this->command?->warn(
                    "Could not seed setting {$property}: {$e->getMessage()}"
                );

                return false;
            }
        }

        return false;
    }

    private function setBooleanSettingIfExists(
        object $settings,
        array $properties,
        bool $value
    ): bool {
        foreach ($properties as $property) {
            if (! property_exists($settings, $property)) {
                continue;
            }

            try {
                $reflection = new ReflectionProperty(
                    $settings,
                    $property
                );

                if (! $reflection->isInitialized($settings)) {
                    $settings->{$property} = $value;
                    return true;
                }

                return false;
            } catch (Throwable $e) {
                $this->command?->warn(
                    "Could not seed boolean setting {$property}: {$e->getMessage()}"
                );

                return false;
            }
        }

        return false;
    }

    private function isEmptyValue(mixed $value): bool
    {
        if ($value === null) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_array($value)) {
            return $value === [];
        }

        return false;
    }
}