<x-layouts.app :title="($project->meta_title ?? $project->title) . ' | وادي الريان للمقاولات'" :meta-description="$project->meta_description ?? $project->short_description ?? strip_tags($project->description)">

    <!-- Project Hero Section -->
    <section class="relative h-[60vh] min-h-[500px] flex items-end pb-20 overflow-hidden bg-gray-50 mt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 bg-brand-primary">
            @if ($project->main_image)
                <img src="{{ app(\App\Services\ImageService::class)->url($project->main_image) }}" onerror="this.style.opacity='0'" alt="{{ $project->title }}" class="w-full h-full object-cover">
            @elseif (!empty($project->images) && is_array($project->images) && count($project->images) > 0)
                <img src="{{ app(\App\Services\ImageService::class)->url($project->images[0]) }}" onerror="this.style.opacity='0'" alt="{{ $project->title }}" class="w-full h-full object-cover">
            @else
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay opacity-30"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-brand-primary via-brand-primary/80 to-brand-primary/20"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-6">
            <div class="w-full">
                <!-- Breadcrumbs -->
                <nav class="flex text-sm text-white/60 mb-8 backdrop-blur-sm bg-black/20 px-4 py-2 rounded-full w-max border border-white/10" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse font-medium">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center hover:text-brand-secondary transition-colors">{{ __('الرئيسية') }}</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <x-heroicon-o-chevron-left class="w-4 h-4 mx-1 rtl:rotate-180"/>
                                <a href="/projects" class="hover:text-brand-secondary transition-colors">{{ __('مشاريعنا') }}</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <x-heroicon-o-chevron-left class="w-4 h-4 mx-1 rtl:rotate-180"/>
                                <span class="text-white">{{ $project->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-white mb-10 leading-tight">{{ $project->title }}</h1>

                <!-- Meta Project Info Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 text-brand-primary font-medium bg-white/95 backdrop-blur-xl p-8 rounded-3xl border border-white/50 shadow-2xl">
                    @if ($project->category)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('التصنيف') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-tag class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $project->category }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->client_id && $project->client)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('العميل') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-user-group class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $project->client->name }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->industry_id && $project->industry)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('القطاع') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-building-office-2 class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $project->industry->name }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->location)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('الموقع') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-map-pin class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $project->location }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->project_status)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('الحالة') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-check-badge class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $project->project_status }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->start_date)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('تاريخ البدء') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-calendar-days class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ \Carbon\Carbon::parse($project->start_date)->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($project->completion_date)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('تاريخ الإنجاز') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-calendar class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ \Carbon\Carbon::parse($project->completion_date)->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl -mr-48 -mt-48 pointer-events-none"></div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="flex flex-col gap-12 lg:gap-16 w-full">
                <!-- Main Description -->
                <div class="w-full min-w-0">
                    <div class="bg-white p-8 md:p-14 rounded-[2.5rem] border border-gray-100 shadow-xl">
                        <h2 class="text-3xl font-bold text-brand-primary mb-8 border-r-4 border-brand-secondary pr-6" style="border-right-color: #C69A72;">
                            {{ __('عن المشروع') }}
                        </h2>
                        <div class="prose prose-brand max-w-none prose-p:text-gray-600 prose-p:leading-relaxed prose-p:text-lg prose-headings:text-brand-primary prose-a:text-brand-secondary">
                            {!! $project->full_description ?? $project->description !!}
                        </div>
                        
                        @if($project->scope_of_work)
                            <h3 class="text-2xl font-bold text-brand-primary mt-12 mb-6 flex items-center gap-3">
                                <x-heroicon-o-wrench-screwdriver class="w-8 h-8 text-brand-secondary"/>
                                {{ __('نطاق العمل') }}
                            </h3>
                            <div class="prose prose-brand max-w-none prose-p:text-gray-600 prose-p:leading-relaxed prose-p:text-lg bg-gray-50 p-8 rounded-3xl border border-gray-100">
                                {!! $project->scope_of_work !!}
                            </div>
                        @endif
                        
                        @if($project->challenges || $project->solutions)
                            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                                @if($project->challenges)
                                <div class="bg-red-50/50 p-8 rounded-3xl border border-red-100">
                                    <h3 class="text-xl font-bold text-red-700 mb-4 flex items-center gap-2">
                                        <x-heroicon-o-exclamation-triangle class="w-6 h-6"/>
                                        {{ __('التحديات') }}
                                    </h3>
                                    <div class="prose prose-red max-w-none prose-p:text-red-900/80">
                                        {!! $project->challenges !!}
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->solutions)
                                <div class="bg-green-50/50 p-8 rounded-3xl border border-green-100">
                                    <h3 class="text-xl font-bold text-green-700 mb-4 flex items-center gap-2">
                                        <x-heroicon-o-light-bulb class="w-6 h-6"/>
                                        {{ __('الحلول المبتكرة') }}
                                    </h3>
                                    <div class="prose prose-green max-w-none prose-p:text-green-900/80">
                                        {!! $project->solutions !!}
                                    </div>
                                </div>
                                @endif
                            </div>
                        @endif

                        @if($project->results)
                            <h3 class="text-2xl font-bold text-brand-primary mt-12 mb-6 flex items-center gap-3">
                                <x-heroicon-o-chart-bar class="w-8 h-8 text-brand-secondary"/>
                                {{ __('النتائج والأثر') }}
                            </h3>
                            <div class="prose prose-brand max-w-none prose-p:text-brand-primary/80 prose-p:leading-relaxed prose-p:text-lg bg-brand-primary/5 p-8 rounded-3xl border border-brand-primary/10">
                                {!! $project->results !!}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar / Gallery -->
                <div class="w-full min-w-0 space-y-8">
                    @php
                        $hasBeforeGallery = !empty($project->before_gallery) && is_array($project->before_gallery) && count($project->before_gallery) > 0;
                        $hasAfterGallery = !empty($project->after_gallery) && is_array($project->after_gallery) && count($project->after_gallery) > 0;
                        $hasGallery = !empty($project->gallery) && is_array($project->gallery) && count($project->gallery) > 0;
                        $hasLegacyImages = !empty($project->images) && is_array($project->images) && count($project->images) > 0;
                        $hasAnyImages = $hasBeforeGallery || $hasAfterGallery || $hasGallery || $hasLegacyImages;
                    @endphp

                    @if($hasAnyImages)
                        <div class="bg-white p-8 md:p-14 rounded-3xl border border-gray-100 shadow-xl overflow-hidden max-w-full">
                            
                            @if($hasBeforeGallery || $hasAfterGallery)
                                <div class="mb-10">
                                    <h3 class="text-xl font-bold text-brand-primary mb-6 border-b border-gray-100 pb-4 flex items-center gap-2">
                                        <x-heroicon-o-camera class="w-6 h-6 text-brand-secondary"/>
                                        {{ __('مراحل المشروع') }}
                                    </h3>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        @if($hasBeforeGallery)
                                        <div>
                                            <h4 class="text-sm font-bold text-gray-500 mb-3 text-center">{{ __('قبل التنفيذ') }}</h4>
                                            <div class="flex flex-col gap-3">
                                                @foreach ($project->before_gallery as $index => $image)
                                                    <a href="{{ app(\App\Services\ImageService::class)->url($image) }}" data-fslightbox="before_after_gallery"
                                                        class="block rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group relative overflow-hidden w-full h-fit">
                                                        <img src="{{ app(\App\Services\ImageService::class)->url($image) }}" onerror="this.style.opacity='0'"
                                                            alt="{{ $project->title }} - قبل"
                                                            class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        
                                        @if($hasAfterGallery)
                                        <div>
                                            <h4 class="text-sm font-bold text-gray-500 mb-3 text-center">{{ __('بعد التنفيذ') }}</h4>
                                            <div class="flex flex-col gap-3">
                                                @foreach ($project->after_gallery as $index => $image)
                                                    <a href="{{ app(\App\Services\ImageService::class)->url($image) }}" data-fslightbox="before_after_gallery"
                                                        class="block rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group relative overflow-hidden w-full h-fit">
                                                        <img src="{{ app(\App\Services\ImageService::class)->url($image) }}" onerror="this.style.opacity='0'"
                                                            alt="{{ $project->title }} - بعد"
                                                            class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if($hasGallery || $hasLegacyImages)
                                <div>
                                    <h3 class="text-xl font-bold text-brand-primary mb-6 border-b border-gray-100 pb-4 flex items-center gap-2">
                                        <x-heroicon-o-photo class="w-6 h-6 text-brand-secondary"/>
                                        {{ __('معرض الصور') }}
                                    </h3>
                                    
                                    @php
                                        $allGalleryImages = array_merge(
                                            $hasGallery ? $project->gallery : [],
                                            $hasLegacyImages ? $project->images : []
                                        );
                                    @endphp
                                    
                                    <div class="space-y-6 w-full max-w-full" x-data="{ 
                                        mainImage: '{{ count($allGalleryImages) > 0 ? app(\App\Services\ImageService::class)->url($allGalleryImages[0]) : '' }}',
                                        images: [
                                            @foreach($allGalleryImages as $image)
                                                '{{ app(\App\Services\ImageService::class)->url($image) }}',
                                            @endforeach
                                        ]
                                    }">
                                        <!-- Main Image Viewer -->
                                        <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm w-full relative group bg-gray-50 flex items-center justify-center min-h-[400px]">
                                            <template x-if="mainImage">
                                                <a :href="mainImage" data-fslightbox="main_gallery" class="block w-full h-full flex items-center justify-center">
                                                    <img :src="mainImage" alt="{{ $project->title }}" class="w-full h-auto max-h-[600px] object-contain transition-all duration-300" x-transition>
                                                </a>
                                            </template>
                                        </div>

                                        <!-- Thumbnails Row -->
                                        <template x-if="images.length > 1">
                                            <div class="flex gap-4 overflow-x-auto pb-2 custom-scrollbar w-full max-w-full">
                                                <template x-for="(img, index) in images" :key="index">
                                                    <button @click="mainImage = img" 
                                                            class="shrink-0 w-32 h-24 rounded-xl overflow-hidden border-2 shadow-sm bg-white transition-all duration-300 flex items-center justify-center"
                                                            :class="mainImage === img ? 'border-brand-primary ring-2 ring-brand-primary/20 opacity-100' : 'border-gray-100 hover:border-brand-secondary opacity-70 hover:opacity-100'">
                                                        <img :src="img" alt="Thumbnail" class="w-full h-full object-cover">
                                                    </button>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                                <a href="/rfq"
                                    class="inline-flex w-full justify-center items-center gap-2 px-6 py-4 bg-brand-secondary text-white font-bold rounded-xl hover:bg-brand-primary transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                                    {{ __('استفسر عن مشروع مماثل') }}
                                    <x-heroicon-o-arrow-right class="w-5 h-5 rtl:rotate-180"/>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-white p-8 md:p-14 rounded-3xl border border-gray-100 shadow-xl">
                            <div class="py-12 flex flex-col items-center justify-center text-center">
                                <div class="w-16 h-16 rounded-full bg-brand-primary/5 flex items-center justify-center text-brand-primary/50 mb-4">
                                    <x-heroicon-o-photo class="w-8 h-8"/>
                                </div>
                                <p class="text-gray-500 font-medium">{{ __('لا توجد صور إضافية للمشروع.') }}</p>
                            </div>
                            <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                                <a href="/rfq"
                                    class="inline-flex w-auto justify-center items-center gap-2 px-8 py-4 bg-brand-secondary text-white font-bold rounded-xl hover:bg-brand-primary transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                                    {{ __('استفسر عن مشروع مماثل') }}
                                    <x-heroicon-o-arrow-right class="w-5 h-5 rtl:rotate-180"/>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-24 bg-brand-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 drop-shadow-sm">{{ __('هل لديك مشروع قادم؟') }}
            </h2>
            <p class="text-white/90 text-xl max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
                {{ __('نحن مستعدون لتحويل أفكارك إلى واقع ملموس بمعايير الجودة التي تعودت عليها من وادي الريان.') }}
            </p>
            <a href="/rfq"
                class="inline-flex items-center justify-center px-12 py-5 bg-brand-secondary text-white rounded-full font-bold text-lg hover:bg-white hover:text-brand-primary transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                {{ __('اتصل بنا الآن') }}
            </a>
        </div>
    </section>

    <!-- Include Fslightbox for image gallery -->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (typeof gsap !== 'undefined') {
                    gsap.from('.gallery-grid a', {
                        scrollTrigger: {
                            trigger: '.gallery-grid',
                            start: 'top 80%',
                        },
                        y: 50,
                        opacity: 0,
                        duration: 0.8,
                        stagger: 0.1,
                        ease: 'power3.out'
                    });
                }
            });
        </script>
    @endpush
</x-layouts.app>
