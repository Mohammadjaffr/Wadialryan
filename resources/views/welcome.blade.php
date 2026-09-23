<x-layouts.app>
    @php
        $locale = app()->getLocale();
        $title = $homepageSettings->hero_title[$locale] ?? 'Wadi Al Rayan';
        $subtitle = $homepageSettings->hero_subtitle[$locale] ?? '';
    @endphp
    
    <!-- 01 Hero -->
    <div class="overflow-hidden relative py-32 text-white bg-brand-primary">
        @if($homepageSettings->hero_image)
            <div class="absolute inset-0 z-0">
                <img src="{{ app(\App\Services\ImageService::class)->url($homepageSettings->hero_image) }}" class="object-cover w-full h-full opacity-30">
            </div>
        @endif
        <div class="container relative z-10 px-4 mx-auto max-w-7xl text-center">
            <h1 class="mb-6 text-5xl font-extrabold md:text-6xl">{{ $title }}</h1>
            <p class="mx-auto mb-10 max-w-3xl text-xl md:text-2xl">{{ $subtitle }}</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                @if(!empty($homepageSettings->primary_cta_url))
                    <a href="{{ $homepageSettings->primary_cta_url }}" class="px-8 py-4 font-bold text-white rounded-lg transition bg-brand-secondary hover:bg-white hover:text-brand-primary">{{ $homepageSettings->primary_cta_label[$locale] ?? __('اطلب تسعيرة') }}</a>
                @endif
                @if(!empty($homepageSettings->secondary_cta_url))
                    <a href="{{ $homepageSettings->secondary_cta_url }}" class="px-8 py-4 font-bold text-white rounded-lg border-2 border-white transition hover:bg-white hover:text-brand-primary">{{ $homepageSettings->secondary_cta_label[$locale] ?? __('تواصل معنا') }}</a>
                @endif
            </div>
        </div>
    </div>

    <!-- 02 Statistics -->
    @if(!empty($homepageSettings->statistics) && is_array($homepageSettings->statistics))
    <div class="py-16 bg-white border-b border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
                @foreach($homepageSettings->statistics as $stat)
                    @if(isset($stat['active']) && $stat['active'])
                    <div>
                        <div class="mb-2 text-4xl font-extrabold text-brand-secondary">
                            {{ $stat['prefix'] ?? '' }}{{ $stat['value'] }}{{ $stat['suffix'] ?? '' }}
                        </div>
                        <div class="text-sm font-bold tracking-wider text-gray-600 uppercase">
                            {{ $locale == 'ar' ? ($stat['label_ar'] ?? '') : ($stat['label_en'] ?? '') }}
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- 03 About -->
    @if(!empty($homepageSettings->about_heading[$locale]))
    <div class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-12 items-center md:grid-cols-2">
                <div>
                    <h2 class="mb-6 text-4xl font-bold text-brand-primary">{{ $homepageSettings->about_heading[$locale] }}</h2>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600">{{ $homepageSettings->about_content[$locale] ?? '' }}</p>
                    <a href="/about" class="font-bold text-brand-secondary hover:underline">{{ __('اقرأ المزيد عنا') }} &rarr;</a>
                </div>
                <div>
                    @if($homepageSettings->about_section_image)
                        <img src="{{ app(\App\Services\ImageService::class)->url($homepageSettings->about_section_image) }}" class="w-full rounded-xl shadow-lg">
                    @else
                        <div class="flex justify-center items-center w-full h-80 text-gray-400 bg-gray-200 rounded-xl">
                            {{ __('صورة عن الشركة') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- 04 Services -->
    @if($homepageSettings->show_services && $services->count() > 0)
    <div class="py-20 bg-white">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-4xl font-bold text-brand-primary">{{ __('خدماتنا') }}</h2>
                <p class="mx-auto max-w-2xl text-gray-600">{{ __('نقدم مجموعة متكاملة من الخدمات المتميزة لتلبية احتياجاتك.') }}</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @foreach($services as $service)
                <div class="overflow-hidden bg-gray-50 rounded-xl transition-all duration-300 transform hover:shadow-xl hover:-translate-y-1">
                    @if($service->main_image)
                        <img src="{{ $service->imageUrl('main_image') }}" class="object-cover w-full h-48">
                    @endif
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold">{{ __($service->title) }}</h3>
                        <div class="mb-4 text-gray-600 line-clamp-3">
                            {!! strip_tags(__($service->short_description ?? $service->description)) !!}
                        </div>
                        <a href="{{ route('services.show', $service->slug) }}" class="font-bold text-brand-secondary hover:text-brand-primary">{{ __('التفاصيل') }} &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <a href="/services" class="inline-block px-8 py-3 font-bold rounded-lg border-2 transition border-brand-primary text-brand-primary hover:bg-brand-primary hover:text-white">{{ __('عرض جميع الخدمات') }}</a>
            </div>
        </div>
    </div>
    @endif

    <!-- 05 Industries -->
    @if($homepageSettings->show_industries && $industries->count() > 0)
    <div class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto max-w-7xl">
            <h2 class="mb-16 text-4xl font-bold text-center text-brand-primary">{{ __('القطاعات التي نخدمها') }}</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($industries as $industry)
                <a href="{{ route('industries.show', $industry->slug) }}" class="overflow-hidden relative h-64 rounded-xl group">
                    @if($industry->image)
                        <img src="{{ $industry->imageUrl('image') }}" class="object-cover absolute inset-0 w-full h-full transition-transform duration-500 group-hover:scale-110">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/80"></div>
                    <div class="absolute right-6 bottom-6 left-6 text-white">
                        <h3 class="mb-2 text-2xl font-bold">{{ __($industry->name) }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- 06 Why Choose Us -->
    @if(!empty($homepageSettings->why_choose_us_intro[$locale]))
    <div class="py-20 text-white bg-brand-primary">
        <div class="container px-4 mx-auto max-w-7xl text-center">
            <h2 class="mb-6 text-4xl font-bold">{{ __('لماذا تختار وادي الريان؟') }}</h2>
            <p class="mx-auto max-w-3xl text-xl leading-relaxed">{{ $homepageSettings->why_choose_us_intro[$locale] }}</p>
        </div>
    </div>
    @endif

    <!-- 07 Featured Projects -->
    @if($homepageSettings->show_projects && $projects->count() > 0)
    <div class="py-20 bg-white">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="mb-2 text-4xl font-bold text-brand-primary">{{ __('أبرز مشاريعنا') }}</h2>
                    <p class="text-gray-600">{{ __('سجل حافل بالنجاحات والإنجازات.') }}</p>
                </div>
                <a href="/projects" class="hidden font-bold sm:inline-block text-brand-secondary hover:underline">{{ __('عرض الكل') }}</a>
            </div>
            
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                @foreach($projects as $project)
                <a href="{{ route('projects.show', $project->slug) }}" class="block overflow-hidden rounded-xl shadow-sm transition group hover:shadow-xl">
                    <div class="relative h-72">
                        @if($project->main_image)
                            <img src="{{ $project->imageUrl('main_image') }}" class="object-cover w-full h-full transition duration-500 group-hover:scale-105">
                        @endif
                        <div class="absolute top-4 left-4 px-3 py-1 text-sm font-bold text-white rounded bg-brand-secondary">
                            {{ $project->project_status ?? __('مكتمل') }}
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50 transition-colors duration-300 group-hover:bg-brand-primary group-hover:text-white">
                        <h3 class="mb-2 text-xl font-bold">{{ __($project->title) }}</h3>
                        <p class="flex gap-2 items-center text-sm opacity-80">
                            <x-heroicon-o-map-pin class="w-4 h-4"/> {{ __($project->location ?? '') }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-8 text-center sm:hidden">
                <a href="/projects" class="inline-block font-bold text-brand-secondary hover:underline">{{ __('عرض الكل') }}</a>
            </div>
        </div>
    </div>
    @endif

    <!-- 08 Equipment & Fleet -->
    @if($homepageSettings->show_equipment && $equipment->count() > 0)
    <div class="py-20 bg-gray-50 border-gray-200 border-y">
        <div class="container px-4 mx-auto max-w-7xl text-center">
            <h2 class="mb-4 text-4xl font-bold text-brand-primary">{{ __('أسطول المعدات') }}</h2>
            <p class="mx-auto mb-12 max-w-2xl text-gray-600">{{ __('نمتلك أحدث المعدات والآليات الثقيلة لضمان تنفيذ المشاريع بكفاءة عالية.') }}</p>
            
            <div class="grid grid-cols-1 gap-6 mb-12 sm:grid-cols-2 md:grid-cols-3">
                @foreach($equipment as $item)
                <div class="p-4 text-left bg-white rounded-xl shadow">
                    @if($item->main_image)
                        <img src="{{ $item->imageUrl('main_image') }}" class="object-cover mb-4 w-full h-40 rounded-lg">
                    @endif
                    <h3 class="mb-1 text-lg font-bold">{{ __($item->name) }}</h3>
                    <p class="text-sm text-gray-500">{{ $item->manufacturer }} {{ $item->model }}</p>
                </div>
                @endforeach
            </div>
            
            <a href="/equipment" class="inline-block px-8 py-3 font-bold text-white rounded-lg transition bg-brand-primary hover:bg-brand-secondary">{{ __('استعرض أسطولنا') }}</a>
        </div>
    </div>
    @endif

    <!-- 10 HSE & Quality -->
    @if(!empty($homepageSettings->hse_intro[$locale]))
    <div class="py-20 bg-white">
        <div class="container px-4 mx-auto max-w-7xl text-center">
            <h2 class="mb-6 text-4xl font-bold text-brand-primary">{{ __('الصحة والسلامة والجودة') }}</h2>
            <p class="mx-auto mb-10 max-w-4xl text-lg leading-relaxed text-gray-600">{{ $homepageSettings->hse_intro[$locale] }}</p>
            <div class="flex gap-4 justify-center">
                <a href="/hse" class="font-bold text-brand-secondary hover:underline">{{ __('سياسة السلامة') }}</a>
                <span class="text-gray-300">|</span>
                <a href="/quality" class="font-bold text-brand-secondary hover:underline">{{ __('سياسة الجودة') }}</a>
            </div>
        </div>
    </div>
    @endif

    <!-- 11 Clients & Partners -->
    @if($homepageSettings->show_clients && $clients->count() > 0)
    <div class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl">
            <h2 class="mb-10 text-2xl font-bold tracking-wider text-center text-gray-700 uppercase">{{ __('عملائنا وشركائنا') }}</h2>
            <div class="flex flex-wrap gap-10 justify-center items-center md:gap-16">
                @foreach($clients as $client)
                    @if($client->logo)
                        <div class="flex justify-center items-center w-28 h-16 md:w-40 md:h-24">
                            <img src="{{ $client->imageUrl('logo') }}" alt="{{ $client->name }}" class="object-contain w-full h-full transition-transform duration-300 hover:scale-110 cursor-pointer">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- 12 Certifications -->
    @if($homepageSettings->show_certifications && $certifications->count() > 0)
    <div class="py-16 bg-white border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl">
            <h2 class="mb-10 text-2xl font-bold text-center text-gray-800">{{ __('الاعتمادات والشهادات') }}</h2>
            <div class="grid grid-cols-2 gap-6 text-center md:grid-cols-4">
                @foreach($certifications as $cert)
                    <div class="p-4">
                        @if($cert->image)
                            <img src="{{ $cert->imageUrl('image') }}" class="object-contain mx-auto mb-4 h-20">
                        @endif
                        <h3 class="text-sm font-bold">{{ __($cert->name) }}</h3>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 text-center">
                <a href="/certifications" class="text-sm font-bold text-brand-secondary hover:underline">{{ __('عرض كافة الشهادات') }}</a>
            </div>
        </div>
    </div>
    @endif

    <!-- 13 Final CTA -->
    @if(!empty($homepageSettings->final_cta_content[$locale]))
    <div class="py-24 text-center text-white bg-brand-primary">
        <div class="container px-4 mx-auto max-w-3xl">
            <h2 class="mb-8 text-4xl font-bold">{{ $homepageSettings->final_cta_content[$locale] }}</h2>
            <div class="flex gap-4 justify-center">
                <a href="/rfq" class="px-8 py-4 font-bold text-white rounded-lg transition bg-brand-secondary hover:bg-white hover:text-brand-primary">{{ __('اطلب تسعيرة') }}</a>
                <a href="/contact" class="px-8 py-4 font-bold text-white rounded-lg border-2 border-white transition hover:bg-white hover:text-brand-primary">{{ __('تواصل معنا') }}</a>
            </div>
        </div>
    </div>
    @endif

</x-layouts.app>